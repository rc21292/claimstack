<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use App\Models\Hospital;
use App\Models\HospitalTieUp;
use App\Models\User;
use App\Notifications\Hospital\CredentialsGeneratedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $hospitals = Hospital::query();
        if($filter_search){
            $hospitals->where('name', 'like','%' . $filter_search . '%');
        }
        $hospitals = $hospitals->orderBy('id', 'desc')->paginate(20);
        return view('admin.hospitals.manage',  compact('hospitals', 'filter_search'));
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

        return view('admin.hospitals.create.create',  compact('associates', 'users'));
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
            'name'                     => 'required',
            'firstname'                => 'required',
            'onboarding'               => 'required',
            'by'                       => 'required',
            'pan'                      => 'required|alpha_num',
            'panfile'                  => 'required',
            'rohini'                   => 'required',
            'rohinifile'               => 'required',
            'landline'                 => 'required|numeric|digits:10',
            'email'                    => 'required|unique:hospitals',
            'address'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'pincode'                  => 'required|numeric',
            'phone'                    => 'required|numeric|digits:10',
            'associate_partner_id'     => 'required',
            'associate_partner_name'   => 'required',
            'assigned_employee'        => 'required',
            'assigned_employee_id'     => 'required',
            'linked_employee'          => 'required',
            'linked_employee_id'       => 'required',
        ];

        $messages = [
            'name.required'                   => 'Please enter hospital name',
            'firstname.required'              => 'Please enter owner firstname',
            'onboarding.required'             => 'Please select hospital onboarding.',
            'by.required'                     => 'Please select hospital by.',
            'pan.required'                    => 'Please enter PAN number.',
            'panfile.required'                => 'Please upload PAN Card.',
            'rohini.required'                 => 'Please enter Rohini code.',
            'rohinifile.required'             => 'Please upload Rohini file.',
            'landline.required'               => "Please enter hospital landline",
            'email.required'                  => 'Please enter official email ID.',
            'address.required'                => 'Please enter address.',
            'city.required'                   => 'Please enter city.',
            'state.required'                  => 'Please enter state.',
            'pincode.required'                => 'Please enter pincode.',
            'phone.required'                  => 'Please enter hospital mobile number.',
            'associate_partner_id.required'   => 'Please enter associate partner ID.',
            'associate_partner_name.required' => 'Please enter associate partner name.',
            'assigned_employee.required'      => 'Please select assigned employee.',
            'assigned_employee_id.required'   => 'Please enter assigned employee ID.',
            'linked_employee.required'        => 'Please select linked employee.',
            'linked_employee_id.required'     => 'Please enter linked employee ID.',
        ];

        $this->validate($request, $rules, $messages);

        $hospital                      =  Hospital::create([
            'name'                     => $request->name,
            'onboarding'               => $request->onboarding,
            'by'                       => $request->by,
            'address'                  => $request->address,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'pincode'                  => $request->pincode,
            'password'                 => Hash::make('12345678'),
            'firstname'                => $request->firstname,
            'lastname'                 => $request->lastname,
            'pan'                      => $request->pan,
            'email'                    => $request->email,
            'landline'                 => $request->landline,
            'phone'                    => $request->phone,
            'rohini'                   => $request->rohini,
            'linked_associate_partner' => $request->associate_partner_name,
            'linked_associate_partner_id' => $request->associate_partner_id,
            'assigned_employee'        => $request->assigned_employee,
            'assigned_employee_id'     => $request->assigned_employee_id,
            'linked_employee'          => $request->linked_employee,
            'linked_employee_id'       => $request->linked_employee_id,
            'comments'                 => $request->comments
        ]);

        $password = '12345678';
        $hospital->notify(new CredentialsGeneratedNotification($hospital->email, $password, $hospital));

        Hospital::where('id', $hospital->id)->update([
            'uid'      => 'HSP'.$hospital->id
        ]);

        if ($request->hasfile('panfile')) {
            $panfile                    = $request->file('panfile');
            $name                       = $panfile->getClientOriginalName();
            $panfile->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'panfile'               =>  $name
            ]);
        }

        if ($request->hasfile('rohinifile')) {
            $rohinifile                    = $request->file('rohinifile');
            $rhnname                       = $rohinifile->getClientOriginalName();
            $rohinifile->storeAs('uploads/hospital/' . $hospital->id . '/', $rhnname, 'public');
            Hospital::where('id', $hospital->id)->update([
                'rohinifile'               =>  $rhnname
            ]);
        }

        return redirect()->route('admin.hospitals.index')->with('success', 'Hospital created successfully');
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

        $hospital          = Hospital::find($id);
        $hospital_tie_ups          = HospitalTieUp::where('hospital_id', $id)->first();
        $hospitals         = Hospital::get();
        $users              = User::get();
        return view('admin.hospitals.edit.edit',  compact('hospital', 'hospitals', 'hospital_tie_ups', 'users'));
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
        $hospital             = Hospital::find($id);


        $rules = [
            'name'                     => 'required',
            'firstname'                => 'required',
            'onboarding'               => 'required',
            'by'                       => 'required',
            'pan'                      => 'required|alpha_num',
            'rohini'                   => 'required',
            'landline'                 => 'required|numeric|digits:10',
            'email'                    => 'required|unique:hospitals,email,'.$id,
            'address'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'pincode'                  => 'required|numeric',
            'phone'                    => 'required|numeric|digits:10',
            'associate_partner_id'     => 'required',
            'tan' => 'required',
            'gst' => 'required',
            'owner_email' => 'required',
            'owner_phone' => 'required',
            'contact_person_name' => 'required',
            'contact_person_email' => 'required',
            'contact_person_phone' => 'required|numeric|digits:10',
            'registration_no' => 'required',
            'medical_superintendent_name' => 'required',
            'medical_superintendent_email' => 'required',
            'medical_superintendent_mobile' => 'required|numeric|digits:10',
            'medical_superintendent_registration_no' => 'required',
            'medical_superintendent_qualification' => 'required',
            'pollution_clearance_certificate' => 'required',
            'fire_safety_clearance_certificate' => 'required',
            'certificate_of_incorporation' => 'required',
            'bank_name' => 'required',
            'bank_address' => 'required',
            'cancel_cheque' => 'required',
            'bank_account_no' => 'required',
            'bank_ifs_code' => 'required',
            'tariff_list_soc' => 'required',
            'nabh_registration_no' => 'required',
            'nabl_registration_no' => 'required',
            'signed_mous' => 'required',
            'other_documents' => 'required',
            'hrms_software' => 'required',
            'iso_status' => 'required'
        ];

        $messages = [
            'name.required'                   => 'Please enter hospital name',
            'firstname.required'              => 'Please enter owner firstname',
            'onboarding.required'             => 'Please select hospital onboarding.',
            'by.required'                     => 'Please select hospital by.',
            'pan.required'                    => 'Please enter PAN number.',
            'rohini.required'                 => 'Please enter Rohini code.',
            'landline.required'               => "Please enter hospital landline",
            'email.required'                  => 'Please enter official email ID.',
            'address.required'                => 'Please enter address.',
            'city.required'                   => 'Please enter city.',
            'state.required'                  => 'Please enter state.',
            'pincode.required'                => 'Please enter pincode.',
            'phone.required'                  => 'Please enter hospital mobile number.',
            'associate_partner_id.required'   => 'Please enter associate partner ID.',
            'associate_partner_name.required' => 'Please enter associate partner name.',
            'tan.required' => 'Please Enter Tan',
            'gst.required' => 'Please Enter Gst',
            'owner_email.required' => 'Please Enter Owner Email',
            'owner_phone.required' => 'Please Enter Owner Phone',
            'contact_person_name.required' => 'Please Enter Contact Person Name',
            'contact_person_email.required' => 'Please Enter Contact Person Email',
            'contact_person_phone.required' => 'Please Enter Contact Person Phone',
            'registration_no.required' => 'Please Enter Registration No',
            'medical_superintendent_name.required' => 'Please Enter Medical Superintendent Name',
            'medical_superintendent_email.required' => 'Please Enter Medical Superintendent Email',
            'medical_superintendent_mobile.required' => 'Please Enter Medical Superintendent Mobile',
            'medical_superintendent_registration_no.required' => 'Please Enter Medical Superintendent Registration No',
            'medical_superintendent_qualification.required' => 'Please Enter Medical Superintendent Qualification',
            'pollution_clearance_certificate.required' => 'Please Enter Pollution Clearance Certificate',
            'fire_safety_clearance_certificate.required' => 'Please Enter Fire Safety Clearance Certificate',
            'certificate_of_incorporation.required' => 'Please Enter Certificate Of Incorporation',
            'bank_name.required' => 'Please Enter Bank Name',
            'bank_address.required' => 'Please Enter Bank Address',
            'cancel_cheque.required' => 'Please Enter Cancel Cheque',
            'bank_account_no.required' => 'Please Enter Bank Account No',
            'bank_ifs_code.required' => 'Please Enter Bank Ifs Code',
            'tariff_list_soc.required' => 'Please Enter Tariff List Soc',
            'nabh_registration_no.required' => 'Please Enter Nabh Registration No',
            'nabl_registration_no.required' => 'Please Enter Nabl Registration No',
            'signed_mous.required' => 'Please Enter Signed Mous',
            'other_documents.required' => 'Please Enter Other Documents',
            'hrms_software.required' => 'Please Enter Hrms Software',
            'iso_status.required' => 'Please Enter Iso Status',
        ];

        $this->validate($request, $rules, $messages);

        Hospital::where('id', $id)->update([
            'name'                     => $request->name,
            'onboarding'               => $request->onboarding,
            'by'                       => $request->by,
            'address'                  => $request->address,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'pincode'                  => $request->pincode,
            'password'                 => Hash::make('12345678'),
            'firstname'                => $request->firstname,
            'lastname'                 => $request->lastname,
            'pan'                      => $request->pan,
            'email'                    => $request->email,
            'landline'                 => $request->landline,
            'phone'                    => $request->phone,
            'rohini'                   => $request->rohini,
            'linked_associate_partner' => $request->associate_partner_name,
            'linked_associate_partner_id' => $request->associate_partner_id,
            'tan' => $request->tan,
            'gst' => $request->gst,
            'owner_email' => $request->owner_email,
            'owner_phone' => $request->owner_phone,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_email' => $request->contact_person_email,
            'contact_person_phone' => $request->contact_person_phone,
            'registration_no' => $request->registration_no,
            'medical_superintendent_name' => $request->medical_superintendent_name,
            'medical_superintendent_email' => $request->medical_superintendent_email,
            'medical_superintendent_mobile' => $request->medical_superintendent_mobile,
            'medical_superintendent_registration_no' => $request->medical_superintendent_registration_no,
            'medical_superintendent_qualification' => $request->medical_superintendent_qualification,
            'pollution_clearance_certificate' => $request->pollution_clearance_certificate,
            'fire_safety_clearance_certificate' => $request->fire_safety_clearance_certificate,
            'certificate_of_incorporation' => $request->certificate_of_incorporation,
            'bank_name' => $request->bank_name,
            'bank_address' => $request->bank_address,
            'cancel_cheque' => $request->cancel_cheque,
            'bank_account_no' => $request->bank_account_no,
            'bank_ifs_code' => $request->bank_ifs_code,
            'tariff_list_soc' => $request->tariff_list_soc,
            'nabh_registration_no' => $request->nabh_registration_no,
            'nabl_registration_no' => $request->nabl_registration_no,
            'signed_mous' => $request->signed_mous,
            'other_documents' => $request->other_documents,
            'hrms_software' => $request->hrms_software,
            'iso_status' => $request->iso_status,
            'comments'                 => $request->comments
        ]);

        Hospital::where('id', $hospital->id)->update([
            'uid'      => 'HSP'.$hospital->id
        ]);

        if ($request->hasfile('panfile')) {
            $panfile                    = $request->file('panfile');
            $name                       = $panfile->getClientOriginalName();
            $panfile->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'panfile'               =>  $name
            ]);
        }

        if ($request->hasfile('tanfile')) {
            $tanfile                    = $request->file('tanfile');
            $name                       = $tanfile->getClientOriginalName();
            $tanfile->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'tanfile'               =>  $name
            ]);
        }


        if ($request->hasfile('gstfile')) {
            $gstfile                    = $request->file('gstfile');
            $name                       = $gstfile->getClientOriginalName();
            $gstfile->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'gstfile'               =>  $name
            ]);
        }



        if ($request->hasfile('cancel_cheque_file')) {
            $cancel_cheque_file                    = $request->file('cancel_cheque_file');
            $name                       = $cancel_cheque_file->getClientOriginalName();
            $cancel_cheque_file->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'cancel_cheque_file'               =>  $name
            ]);
        }




        if ($request->hasfile('tariff_list_soc_file')) {
            $tariff_list_soc_file                    = $request->file('tariff_list_soc_file');
            $name                       = $tariff_list_soc_file->getClientOriginalName();
            $tariff_list_soc_file->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'tariff_list_soc_file'               =>  $name
            ]);
        }



        if ($request->hasfile('nabh_registration_file')) {
            $nabh_registration_file                    = $request->file('nabh_registration_file');
            $name                       = $nabh_registration_file->getClientOriginalName();
            $nabh_registration_file->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'nabh_registration_file'               =>  $name
            ]);
        }

        if ($request->hasfile('nabl_registration_file')) {
            $nabl_registration_file                    = $request->file('nabl_registration_file');
            $name                       = $nabl_registration_file->getClientOriginalName();
            $nabl_registration_file->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'nabl_registration_file'               =>  $name
            ]);
        }

        if ($request->hasfile('signed_mous_file')) {
            $signed_mous_file                    = $request->file('signed_mous_file');
            $name                       = $signed_mous_file->getClientOriginalName();
            $signed_mous_file->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'signed_mous_file'               =>  $name
            ]);
        }



        if ($request->hasfile('other_documents_file')) {
            $other_documents_file                    = $request->file('other_documents_file');
            $name                       = $other_documents_file->getClientOriginalName();
            $other_documents_file->storeAs('uploads/hospital/' . $hospital->id . '/', $name, 'public');
            Hospital::where('id', $hospital->id)->update([
                'other_documents_file'               =>  $name
            ]);
        }


        if ($request->hasfile('rohinifile')) {
            $rohinifile                    = $request->file('rohinifile');
            $rhnname                       = $rohinifile->getClientOriginalName();
            $rohinifile->storeAs('uploads/hospital/' . $hospital->id . '/', $rhnname, 'public');
            Hospital::where('id', $hospital->id)->update([
                'rohinifile'               =>  $rhnname
            ]);
        }

        return redirect()->back()->with('success', 'Hospital updated successfully');
    }


    public function updateHospitalTieUps(Request $request, $id)
    {
        $hospital             = Hospital::find($id);

        $rules = [
            'mou_inception_date'                     => 'required',
            'bhc_packages_for_surgical_procedures_accepted'                => 'required',
            'discount_on_medical_management_cases'               => 'required',
            'discount_on_final_bill'                       => 'required',
            'discount_on_room_rent'                      => 'required|alpha_num',
            'discount_on_medicines'                   => 'required',
            'discount_on_consumables'                 => 'required',
            'referral_commission_offered'                    => 'required',
            'referral'                  => 'required',
            'claimstag_usage_services'                     => 'required',
            'claimstag_installation_charges'                    => 'required',
            'claimstag_usage_charges'                  => 'required|numeric',
            'claims_reimbursement_insured_services'                    => 'required',
            'claims_reimbursement_insured_service_charges'     => 'required',
            'cashless_claims_management_services' => 'required',
            'cashless_claims_management_services_charges' => 'required',
            'medical_lending_for_patients' => 'required',
            'medical_lending_service_type' => 'required',
            'subvention' => 'required',
            'medical_lending_for_bill_invoice_discounting' => 'required',
            'comments_on_invoice_discounting' => 'required',
            'lending_finance_company_agreement' => 'required',
            'lending_finance_company_agreement_date' => 'required',
            'hms_services' => 'required',
            'hms_charges' => 'required',
            'hospital_management_system_installation' => 'required',
            'comments' => 'required',
        ];

        $messages = [
            'mou_inception_date.required'                   => 'Please Enter Mou Inception Date',
            'bhc_packages_for_surgical_procedures_accepted.required'              => 'Please Enter Bhc Packages For Surgical Procedures Accepted',
            'discount_on_medical_management_cases.required'             => 'Please Enter Discount On Medical Management Cases',
            'discount_on_final_bill.required'                     => 'Please Enter Discount On Final Bill',
            'discount_on_room_rent.required'                    => 'Please Enter Discount On Room Rent',
            'discount_on_medicines.required'                 => 'Please Enter Discount On Medicines',
            'discount_on_consumables.required'               => 'Please Enter Discount On Consumables',
            'referral_commission_offered.required'                  => 'Please Enter Referral Commission Offered',
            'referral.required'                => 'Please Enter referral',
            'claimstag_usage_services.required'                   => 'Please Enter Claimstag Usage Services',
            'claimstag_installation_charges.required'                  => 'Please Enter Claimstag Installation Charges',
            'claimstag_usage_charges.required'                => 'Please Enter Claimstag Usage Charges',
            'claims_reimbursement_insured_services.required'                  => 'Please Enter Claims Reimbursement Insured Services',
            'claims_reimbursement_insured_service_charges.required'   => 'Please Enter Claims Reimbursement Insured Service Charges',
            'cashless_claims_management_services.required' => 'Please Enter Cashless Claims Management Services',
            'cashless_claims_management_services_charges.required' => 'Please Enter Cashless Claims Management Services Charges',
            'medical_lending_for_patients.required' => 'Please Enter Medical Lending For Patients',
            'medical_lending_service_type.required' => 'Please Enter Medical Lending Service Type',
            'subvention.required' => 'Please Enter subvention',
            'medical_lending_for_bill_invoice_discounting.required' => 'Please Enter Medical Lending For Bill Invoice Discounting',
            'comments_on_invoice_discounting.required' => 'Please Enter Comments On Invoice Discounting',
            'lending_finance_company_agreement.required' => 'Please Enter Lending Finance Company Agreement',
            'lending_finance_company_agreement_date.required' => 'Please Enter Lending Finance Company Agreement Date',
            'hms_services.required' => 'Please Enter Hms Services',
            'hospital_management_system_installation.required' => 'Please Enter hospital Management System Installation',
            'hms_charges.required' => 'Please Enter Hms Charges',
            'comments.required' => 'Please Enter comments',
        ];

        $this->validate($request, $rules, $messages);

          $hospitalT =  HospitalTieUp::updateOrCreate([
                'hospital_id' => $id],
                [
                'mou_inception_date'                     => $request->mou_inception_date,
                'bhc_packages_for_surgical_procedures_accepted'               => $request->bhc_packages_for_surgical_procedures_accepted,
                'discount_on_medical_management_cases'                       => $request->discount_on_medical_management_cases,
                'discount_on_final_bill'                  => $request->discount_on_final_bill,
                'discount_on_room_rent'                     => $request->discount_on_room_rent,
                'discount_on_medicines'                    => $request->discount_on_medicines,
                'discount_on_consumables'                  => $request->discount_on_consumables,
                'referral_commission_offered'                 => $request->referral_commission_offered,
                'referral'                => $request->referral,
                'claimstag_usage_services'                 => $request->claimstag_usage_services,
                'claimstag_installation_charges'                      => $request->claimstag_installation_charges,
                'claimstag_usage_charges'                    => $request->claimstag_usage_charges,
                'claims_reimbursement_insured_services'                 => $request->claims_reimbursement_insured_services,
                'claims_reimbursement_insured_service_charges'                    => $request->claims_reimbursement_insured_service_charges,
                'cashless_claims_management_services'                   => $request->cashless_claims_management_services,
                'cashless_claims_management_services_charges' => $request->cashless_claims_management_services_charges,
                'medical_lending_for_patients' => $request->medical_lending_for_patients,
                'medical_lending_service_type' => $request->medical_lending_service_type,
                'subvention' => $request->subvention,
                'medical_lending_for_bill_invoice_discounting' => $request->medical_lending_for_bill_invoice_discounting,
                'comments_on_invoice_discounting' => $request->comments_on_invoice_discounting,
                'lending_finance_company_agreement' => $request->lending_finance_company_agreement,
                'lending_finance_company_agreement_date' => $request->lending_finance_company_agreement_date,
                'hms_services' => $request->hms_services,
                'hospital_management_system_installation' => $request->hospital_management_system_installation,
                'hms_charges' => $request->hms_charges,
                'comments' => $request->comments
            ]);
        
        HospitalTieUp::where('hospital_id', $id)->update([
            'uid'      => 'HSPTUP'.$hospital->id
        ]);

        return redirect()->back()->with('success', 'Hospital updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hospital::find($id)->delete();
        return redirect()->route('admin.hospitals.index')->with('success', 'Hospital deleted successfully');
    }
}
