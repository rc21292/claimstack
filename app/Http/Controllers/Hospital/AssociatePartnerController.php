<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use App\Models\SalesServiceType;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportAssociatePartner;
use App\Exports\ExportAssociatePartner;
use App\Models\VendorServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Notifications\Hospital\CredentialsGeneratedNotification;

class AssociatePartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:hospital');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $associates = AssociatePartner::query();
        if($filter_search){
            $associates->where(DB::raw("concat(firstname, ' ', lastname)"), 'like','%' . $filter_search . '%');
        }
        $associates = $associates->orderBy('id', 'desc')->paginate(20);
        return view('hospital.associate-partners.manage',  compact('associates', 'filter_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $associates = AssociatePartner::get();
        $users      = User::get();

        return view('hospital.associate-partners.create.create',  compact('associates', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'firstname'                => 'required',
            'type'                     => 'required',
            'pan'                      => 'required|alpha_num',
            'panfile'                  => 'required',
            'owner'                    => 'required',
            'email'                    => 'required|unique:associate_partners',
            'address'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'pincode'                  => 'required|numeric',
            'phone'                    => 'required|numeric|digits:10',
            'status'                   => 'required',
            'reference'                => 'required',
            'assigned_employee'        => 'required',
            'assigned_employee_id'     => 'required',
            'linked_employee'          => 'required',
            'linked_employee_id'       => 'required',
        ];

        $messages = [
            'firstname.required'             => 'Please enter firstname',
            'type.required'                  => 'Please select associate partner type.',
            'pan.required'                   => 'Please enter PAN number.',
            'panfile.required'               => 'Please upload PAN Card.',
            'owner.required'                 => "Please enter associate partner's owner name",
            'email.required'                 => 'Please enter official email ID.',
            'address.required'               => 'Please enter address.',
            'city.required'                  => 'Please enter city.',
            'state.required'                 => 'Please enter state.',
            'pincode.required'               => 'Please enter pincode.',
            'phone.required'                 => 'Please enter associate partner mobile number.',
            'status.required'                => 'Please select associate partner status.',
            'reference.required'             => 'Please enter reference',
            'assigned_employee.required'     => 'Please select assigned employee.',
            'assigned_employee_id.required'  => 'Please enter assigned employee ID.',
            'linked_employee.required'       => 'Please select linked employee.',
            'linked_employee_id.required'    => 'Please enter linked employee ID.',
        ];

        $this->validate($request, $rules, $messages);

        $associate_partner             =  AssociatePartner::create([
            'firstname'                => $request->firstname,
            'lastname'                 => $request->lastname,
            'type'                     => $request->type,
            'pan'                      => $request->pan,
            'owner'                    => $request->owner,
            'email'                    => $request->email,
            'password'                 => Hash::make('12345678'),
            'address'                  => $request->address,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'pincode'                  => $request->pincode,
            'phone'                    => $request->phone,
            'status'                   => $request->status,
            'reference'                => $request->reference,
            'linked_associate_partner'          => $request->linked_associate_partner ? $request->linked_associate_partner : null,
            'linked_associate_partner_id'          => $request->linked_associate_partner_id ? $request->linked_associate_partner_id : null,
            'assigned_employee'        => $request->assigned_employee,
            'assigned_employee_id'     => $request->assigned_employee_id,
            'assigned_employee_department'        => $request->assigned_employee_department,
            'linked_employee_department'        => $request->linked_employee_department,
            'linked_employee'          => $request->linked_employee,
            'linked_employee_id'       => $request->linked_employee_id
        ]);

        $password = '12345678';
        $associate_partner->notify(new CredentialsGeneratedNotification($associate_partner->email, $password, $associate_partner));

        AssociatePartner::where('id', $associate_partner->id)->update([
            'associate_partner_id'      => 'AP' . substr($associate_partner->pan, 0, 2) . substr($associate_partner->pan, -3)
        ]);

        if ($request->hasfile('panfile')) {
            $panfile                    = $request->file('panfile');
            $name                       = $panfile->getClientOriginalName();
            $panfile->storeAs('uploads/associate-partners/' . $associate_partner->id . '/', $name, 'public');
            AssociatePartner::where('id', $associate_partner->id)->update([
                'panfile'               =>  $name
            ]);
        }

        return redirect()->route('hospital.associate-partners.index')->with('success', 'Associate partner created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $associate          = AssociatePartner::find($id);
        $associate->sub_associate_partners = AssociatePartner::where('status', 'Sub AP')->where('linked_associate_partner', $id)->get();
        $associate->service = $associate->type == 'vendor' ? VendorServiceType::where('associate_partner_id', $id)->first() :  SalesServiceType::where('associate_partner_id', $id)->first();
        $associates         = AssociatePartner::get();
        $users              = User::get();
        return view('hospital.associate-partners.edit.edit',  compact('associate', 'associates', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $associate_partner             = AssociatePartner::find($id);

        $rules = [
            'firstname'                => 'required',
            'type'                     => 'required',
            'pan'                      => 'required|alpha_num',
            'panfile'                  =>  isset($associate_partner->panfile) ? '' : 'required',
            'owner'                    => 'required',
            'email'                    => 'required|unique:associate_partners,email,'.$id,
            'address'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'pincode'                  => 'required|numeric',
            'phone'                    => 'required|numeric|digits:10',
            'status'                   => 'required',
            'reference'                => 'required',
            'assigned_employee'        => 'required',
            'assigned_employee_id'     => 'required',
            'assigned_employee_department'        => 'required',
            'linked_employee_department'        => 'required',
            'linked_employee'          => 'required',
            'linked_employee_id'       => 'required',
            'mou'                      => 'required',
            'moufile'                  => $request->mou == 'yes' ? 'required' : '',
            'agreement_start_date'     => 'required',
            'agreement_end_date'       => 'required|after:agreement_start_date',
            'contact_person'           => 'required',
            'contact_person_phone'     => 'required',
            'contact_person_email'     => 'required',
            'bank_name'                => 'required',
            'bank_address'             => 'required',
            'cancel_cheque'            => 'required',
            'bank_account_no'          => 'required',
            'bank_ifs_code'            => 'required',
        ];

        $messages = [
            'firstname.required'             => 'Please enter firstname',
            'type.required'                  => 'Please select associate partner type.',
            'pan.required'                   => 'Please enter PAN number.',
            'panfile.required'               => 'Please upload PAN Card.',
            'owner.required'                 => "Please enter associate partner's owner name",
            'email.required'                 => 'Please enter official email ID.',
            'address.required'               => 'Please enter address.',
            'city.required'                  => 'Please enter city.',
            'state.required'                 => 'Please enter state.',
            'pincode.required'               => 'Please enter pincode.',
            'phone.required'                 => 'Please enter associate partner mobile number.',
            'status.required'                => 'Please select associate partner status.',
            'reference.required'             => 'Please enter reference',
            'assigned_employee.required'     => 'Please select assigned employee.',
            'assigned_employee_id.required'  => 'Please enter assigned employee ID.',
            'assigned_employee_department.required'  => 'Please select assigned to employee department.',
            'linked_employee_department.required'  => 'Please select linked with employee department.',
            'linked_employee.required'       => 'Please select linked employee.',
            'linked_employee_id.required'    => 'Please enter linked employee ID.',
            'mou.required'                   => 'Please select MOU',
            'moufile.required'               => 'Please upload MOU File',
            'agreement_start_date.required'  => 'Please select agreement start date',
            'agreement_end_date.required'    => 'Please select agreement end date',
            'contact_person.required'        => 'Please enter contact person name.',
            'contact_person_phone.required'  => 'Please enter contact person phone.',
            'contact_person_email.required'  => 'Please enter contact person email.',
            'bank_name.required'             => 'Please Enter Bank Name',
            'bank_address.required'          => 'Please Enter Bank Address',
            'cancel_cheque.required'         => 'Please Enter Cancel Cheque',
            'bank_account_no.required'       => 'Please Enter Bank Account No',
            'bank_ifs_code.required'         => 'Please Enter Bank Ifs Code',
        ];

        $this->validate($request, $rules, $messages);

        AssociatePartner::where('id', $id)->update([
            'firstname'                => $request->firstname,
            'lastname'                 => $request->lastname,
            'type'                     => $request->type,
            'pan'                      => $request->pan,
            'owner'                    => $request->owner,
            'email'                    => $request->email,
            'address'                  => $request->address,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'pincode'                  => $request->pincode,
            'phone'                    => $request->phone,
            'status'                   => $request->status,
            'reference'                => $request->reference,
            'linked_associate_partner'          => $request->linked_associate_partner ? $request->linked_associate_partner : null,
            'linked_associate_partner_id'          => $request->linked_associate_partner_id ? $request->linked_associate_partner_id : null,
            'assigned_employee'        => $request->assigned_employee,
            'assigned_employee_id'     => $request->assigned_employee_id,
            'assigned_employee_department'        => $request->assigned_employee_department,
            'linked_employee_department'        => $request->linked_employee_department,
            'linked_employee'          => $request->linked_employee,
            'linked_employee_id'       => $request->linked_employee_id,
            'mou'                      => $request->mou,
            'agreement_start_date'     => $request->agreement_start_date,
            'agreement_end_date'       => $request->agreement_end_date,
            'contact_person'           => $request->contact_person,
            'contact_person_phone'     => $request->contact_person_phone,
            'contact_person_email'     => $request->contact_person_email,
            'bank_name'                => $request->bank_name,
            'bank_address'             => $request->bank_address,
            'cancel_cheque'            => $request->cancel_cheque,
            'bank_account_no'          => $request->bank_account_no,
            'bank_ifs_code'            => $request->bank_ifs_code,
            'comments'                 => $request->comments,
        ]);



        AssociatePartner::where('id', $id)->update([
            'associate_partner_id'      => 'AP' . substr($associate_partner->pan, 0, 2) . substr($associate_partner->pan, -3)
        ]);

        if ($request->hasfile('panfile')) {
            $panfile                    = $request->file('panfile');
            $name                       = $panfile->getClientOriginalName();
            $panfile->storeAs('uploads/associate-partners/' . $id . '/', $name, 'public');
            AssociatePartner::where('id', $id)->update([
                'panfile'               =>  $name
            ]);
        }

        if ($request->hasfile('moufile')) {
            $moufile                    = $request->file('moufile');
            $name                       = $moufile->getClientOriginalName();
            $moufile->storeAs('uploads/associate-partners/' . $id . '/', $name, 'public');
            AssociatePartner::where('id', $id)->update([
                'moufile'               =>  $name
            ]);
        }

        if ($request->hasfile('agreementfile')) {
            $agreementfile                    = $request->file('agreementfile');
            $name                       = $agreementfile->getClientOriginalName();
            $agreementfile->storeAs('uploads/associate-partners/' . $id . '/', $name, 'public');
            AssociatePartner::where('id', $id)->update([
                'agreementfile'               =>  $name
            ]);
        }

        if ($request->hasfile('cancel_cheque_file')) {
            $cancel_cheque_file                    = $request->file('cancel_cheque_file');
            $name                       = $cancel_cheque_file->getClientOriginalName();
            $cancel_cheque_file->storeAs('uploads/associate-partners/' . $id . '/', $name, 'public');
            AssociatePartner::where('id', $id)->update([
                'cancel_cheque_file'               =>  $name
            ]);
        }

        return redirect()->back()->with('success', 'Associate partner updated successfully');
    }

    public function updateVendorServices(Request $request, $id)
    {
        $rules = [
            'cashless_claims_management'                => 'required',
            'cashless_claims_management_charge'         => 'required',
            'cashless_helpdesk'                         => 'required',
            'cashless_helpdesk_charge'                  => 'required',
            'claims_assessment'                         => 'required',
            'claims_assessment_charge'                  => 'required',
            'claims_bill_entry'                         => 'required',
            'claims_bill_entry_charge'                  => 'required',
            'claims_reimbursement'                      => 'required',
            'claims_reimbursement_charge'               => 'required',
            'doctor_claim_process'                      => 'required',
            'doctor_claim_process_charge'               => 'required',
            'doctor_honorary_panel'                     => 'required',
            'doctor_honorary_panel_charge'              => 'required',
            'doctor_tele_consultation'                  => 'required',
            'doctor_tele_consultation_charge'           => 'required',
            'insurance_tpa_coordination'                => 'required',
            'insurance_tpa_coordination_charge'         => 'required',
            'medical_lending_bill'                      => 'required',
            'medical_lending_bill_charge'               => 'required',
            'medical_lending_patient'                   => 'required',
            'medical_lending_patient_charge'            => 'required',
            'others'                                    => 'required',
            'others_charge'                             => 'required',
        ];

        $messages = [

        ];

        $this->validate($request, $rules, $messages);

        VendorServiceType::updateOrCreate(
            ['associate_partner_id' => $id],
            [
                'cashless_claims_management'                => $request->cashless_claims_management,
                'cashless_claims_management_charge'         => $request->cashless_claims_management_charge,
                'cashless_helpdesk'                         => $request->cashless_helpdesk,
                'cashless_helpdesk_charge'                  => $request->cashless_helpdesk_charge,
                'claims_assessment'                         => $request->claims_assessment,
                'claims_assessment_charge'                  => $request->claims_assessment_charge,
                'claims_bill_entry'                         => $request->claims_bill_entry,
                'claims_bill_entry_charge'                  => $request->claims_bill_entry_charge,
                'claims_reimbursement'                      => $request->claims_reimbursement,
                'claims_reimbursement_charge'               => $request->claims_reimbursement_charge,
                'doctor_claim_process'                      => $request->doctor_claim_process,
                'doctor_claim_process_charge'               => $request->doctor_claim_process_charge,
                'doctor_honorary_panel'                     => $request->doctor_honorary_panel,
                'doctor_honorary_panel_charge'              => $request->doctor_honorary_panel_charge,
                'doctor_tele_consultation'                  => $request->doctor_tele_consultation,
                'doctor_tele_consultation_charge'           => $request->doctor_tele_consultation_charge,
                'insurance_tpa_coordination'                => $request->insurance_tpa_coordination,
                'insurance_tpa_coordination_charge'         => $request->insurance_tpa_coordination_charge,
                'medical_lending_bill'                      => $request->medical_lending_bill,
                'medical_lending_bill_charge'               => $request->medical_lending_bill_charge,
                'medical_lending_patient'                   => $request->medical_lending_patient,
                'medical_lending_patient_charge'            => $request->medical_lending_patient_charge,
                'others'                                    => $request->others,
                'others_charge'                             => $request->others_charge,
                'vendor_partner_comments'                   => $request->vendor_partner_comments
            ]

            );

            return redirect()->back()->with('success', 'Vendor Partner Service types updated successfully');
    }

    public function updateSalesServices(Request $request, $id)
    {
        $rules = [
            'consulting'                        => 'required',
            'consulting_charge'                 => 'required',
            'dealer_distributor'                => 'required',
            'dealer_distributor_charge'         => 'required',
            'hospital_empanelment_agent'        => 'required',
            'hospital_empanelment_agent_charge' => 'required',
            'software_sales'                    => 'required',
            'software_sales_charge'             => 'required',
            'others'                            => 'required',
            'others_charge'                     => 'required',
        ];

        $messages = [

        ];

        $this->validate($request, $rules, $messages);

        SalesServiceType::updateOrCreate(
            ['associate_partner_id' => $id],
            [
                'consulting'                            => $request->consulting,
                'consulting_charge'                     => $request->consulting_charge,
                'dealer_distributor'                    => $request->dealer_distributor,
                'dealer_distributor_charge'             => $request->dealer_distributor_charge,
                'hospital_empanelment_agent'            => $request->hospital_empanelment_agent,
                'hospital_empanelment_agent_charge'     => $request->hospital_empanelment_agent_charge,
                'software_sales'                        => $request->software_sales,
                'software_sales_charge'                 => $request->software_sales_charge,
                'others'                                => $request->others,
                'others_charge'                         => $request->others_charge,
                'sales_partner_comments'                => $request->sales_partner_comments
            ]

            );

            return redirect()->back()->with('success', 'Sales Partner Service types updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssociatePartner::find($id)->delete();
        return redirect()->route('hospital.associate-partners.index')->with('success', 'Associate partner deleted successfully');
    }

    public function importExport(Request $request){
        return view('admin.associate-partners.import-export');
    }

    public function import(Request $request){
        Excel::import(new ImportAssociatePartner, $request->file('file')->store('files'));
        return redirect()->back()->with('success', 'Your file successfully imported!!');;
    }

    public function export(Request $request){
        return Excel::download(new ExportAssociatePartner, 'associate-partners.xlsx');
    }
}
