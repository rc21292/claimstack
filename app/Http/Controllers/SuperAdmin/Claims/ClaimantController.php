<?php

namespace App\Http\Controllers\Superadmin\Claims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssociatePartner;
use App\Models\Claimant;
use App\Models\Borrower;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Claim;

class ClaimantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:super-admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $claimants = Claimant::query();

        if($filter_search){
            $claimants->where('patient_id', 'like','%' . $filter_search . '%');
        }

        $claimants = $claimants->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.claims.claimants.manage',  compact('claimants', 'filter_search'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient_id     = $request->patient_id;
        $claim_id     = $request->claim_id;
        $associates     = AssociatePartner::get();
        $hospitals      = Hospital::get();
        $patient        = isset($patient_id) ? Patient::find($request->patient_id) : null;
        $claim        = isset($claim_id) ? Claim::find($request->claim_id) : null;
        $hospital_id  = isset($patient_id) ? $patient->hospital->id : null;
        $associate_partner_id  = isset($patient_id) ? $patient->associate_partner_id : null;
        $patients       = Patient::get();
        $patient_title   =  isset($patient) ? $patient->title : null;
        $patient_firstname   =  isset($patient) ? $patient->firstname : null;
        $patient_lastname   =  isset($patient) ? $patient->lastname : null;
        $patient_middlename   =  isset($patient) ? $patient->middlename : null;
        $claims       = Claim::get();

        return view('super-admin.claims.claimants.create',  compact('patient_id', 'associates', 'hospitals', 'patient', 'patients', 'claims', 'claim', 'claim_id', 'associate_partner_id', 'hospital_id', 'patient_title', 'patient_firstname', 'patient_lastname', 'patient_middlename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // echo "<pre>";print_r($request->all());"</pre>";exit;
        $rules = [
            'patient_id' => 'required',
            'claim_id' => 'required',
            'associate_partner_id' => 'required',
            'hospital_id' => 'required',
            'patient_title' => 'required|max:25',
            'patient_firstname' => 'required|max:25',
            'patient_middlename' => 'required|max:25',
            'patient_lastname' => 'required|max:25',
            'patient_id_proof' => 'required',
            'are_patient_and_claimant_same' => 'required',
            'title' => 'required',
            'firstname' => 'required|max:25',
            'middlename' => 'required||max:25',
            'lastname' => 'required',
            'pan_no' => 'required|digits:10',
            'aadhar_no' => 'required|digits:12',
            'patients_relation_with_claimant' => 'required',
            'specify' => 'required',
            'address' => 'required|max:100',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'personal_email_id' => 'required|email|max:45',
            'official_email_id' => 'required|email|max:45',
            'mobile_no' => 'required|digits:10',
            'estimated_amount' => 'required',
            'cancel_cheque' => 'required',
            'bank_name' => 'required|max:45',
            'bank_address' => 'required|max:80',
            'ac_no' => 'required|max:20',
            'ifs_code' => 'required|max:11',
            'comments' => 'required|max:250',
        ];

        $messages =  [
            'patient_id.required'                => 'Please Enter Patient Id',
            'claim_id.required'             => 'Please Enter Claim Id',
            'associate_partner_id.required'               => 'Please Enter Associate Partner Id',
            'hospital_id.required'          => 'Please Enter Hospital Id',
            'patient_title.required'             => 'Please Enter Patient Title',
            'patient_firstname.required'            => 'Please Enter Patient Firstname',
            'patient_middlename.required'          => 'Please Enter Patient Middlename',
            'patient_lastname.required'      => 'Please Enter Patient Lastname',
            'patient_id_proof.required'           => 'Please Enter Patient Id Proof',
            'are_patient_and_claimant_same.required'                     => 'Please Enter Are Patient And Claimant Same',
            'title.required'                 => 'Please Enter Title',
            'firstname.required'                       => 'Please Enter Firstname',
            'middlename.required'                    => 'Please Enter Middlename',
            'lastname.required'            => 'Please Enter Lastname',
            'pan_no.required'            => 'Please Enter Pan No',
            'aadhar_no.required'                   => 'Please Enter Aadhar No',
            'patients_relation_with_claimant.required'        => 'Please Enter Patients Relation With Claimant',
            'specify.required'                 => 'Please Enter Specify',
            'address.required'    => 'Please Enter Address',
            'city.required'          => 'Please Enter City',
            'state.required'    => 'Please Enter State',
            'pincode.required'          => 'Please Enter Pincode',
            'personal_email_id.required'        => 'Please Enter Personal Email Id',
            'official_email_id.required'            => 'Please Enter Official Email Id',
            'mobile_no.required'          => 'Please Enter Mobile No',
            'estimated_amount.required'          => 'Please Enter Estimated Amount',
            'cancel_cheque.required'          => 'Please Enter Cancel Cheque',
            'bank_name.required'            => 'Please Enter Bank Name',
            'bank_address.required'        => 'Please Enter Bank Address',
            'ac_no.required'          => 'Please Enter Bank Account No',
            'ifs_code.required'              => 'Please Enter Bank Ifs Code',
            'comments.required'              => 'Please Enter Comments',
        ];

        $this->validate($request, $rules, $messages);

        $claimant =  Claimant::Create([
           'patient_id' => $request->patient_id,
           'claim_id' => $request->claim_id,
           'associate_partner_id' => $request->associate_partner_id,
           'hospital_id' => $request->hospital_id,
           'patient_title' => $request->patient_title,
           'patient_firstname' => $request->patient_firstname,
           'patient_middlename' => $request->patient_middlename,
           'patient_lastname' => $request->patient_lastname,
           'patient_id_proof' => $request->patient_id_proof,
           'are_patient_and_claimant_same' => $request->are_patient_and_claimant_same,
           'title' => $request->title,
           'firstname' => $request->firstname,
           'middlename' => $request->middlename,
           'lastname' => $request->lastname,
           'pan_no' => $request->pan_no,
           'aadhar_no' => $request->aadhar_no,
           'patients_relation_with_claimant' => $request->patients_relation_with_claimant,
           'specify' => $request->specify,
           'address' => $request->address,
           'city' => $request->city,
           'state' => $request->state,
           'pincode' => $request->pincode,
           'personal_email_id' => $request->personal_email_id,
           'official_email_id' => $request->official_email_id,
           'mobile_no' => $request->mobile_no,
           'estimated_amount' => $request->estimated_amount,
           'cancel_cheque' => $request->cancel_cheque,
           'bank_name' => $request->bank_name,
           'bank_address' => $request->bank_address,
           'ac_no' => $request->ac_no,
           'ifs_code' => $request->ifs_code,
           'comments' => $request->comments,
       ]);        

        if ($request->hasfile('patient_id_proof')) {
            $patient_id_proof                    = $request->file('patient_id_proof');
            $name                       = $patient_id_proof->getClientOriginalName();
            $patient_id_proof->storeAs('uploads/claimant/' . $claimant->id . '/', $name, 'public');
            Claimant::where('id', $claimant->id)->update([
                'patient_id_proof'               =>  $name
            ]);
        }

        if ($request->hasfile('pan_no_file')) {
            $pan_no_file                    = $request->file('pan_no_file');
            $rhnname                       = $pan_no_file->getClientOriginalName();
            $pan_no_file->storeAs('uploads/claimant/' . $claimant->id . '/', $rhnname, 'public');
            Claimant::where('id', $claimant->id)->update([
                'pan_no_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('aadhar_no_file')) {
            $aadhar_no_file                    = $request->file('aadhar_no_file');
            $name                       = $aadhar_no_file->getClientOriginalName();
            $aadhar_no_file->storeAs('uploads/claimant/' . $claimant->id . '/', $name, 'public');
            Claimant::where('id', $claimant->id)->update([
                'aadhar_no_file'               =>  $name
            ]);
        }

        if ($request->hasfile('cancel_cheque_file')) {
            $cancel_cheque_file                    = $request->file('cancel_cheque_file');
            $rhnname                       = $cancel_cheque_file->getClientOriginalName();
            $cancel_cheque_file->storeAs('uploads/claimant/' . $claimant->id . '/', $rhnname, 'public');
            Claimant::where('id', $claimant->id)->update([
                'cancel_cheque_file'               =>  $rhnname
            ]);
        }

        return redirect()->route('super-admin.claimants.edit',$claimant->id)->with('success', 'Claimant created successfully');

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
        $claimant     = Claimant::find($id);
        $exists     = Borrower::where('claimant_id', $id)->exists();
        if ($exists) {
            $borrower     = Borrower::where('claimant_id', $id)->first();
        }else{
            $borrower = Borrower::create(['claimant_id' => $id]);
        }
        $associates     = AssociatePartner::get();
        $hospitals      = Hospital::get();
        $patient        = Patient::find($claimant->patient_id);
        $patient_id   = $claimant->patient_id;

        return view('super-admin.claims.claimants.edit.edit',  compact('patient_id', 'associates', 'hospitals', 'patient', 'claimant', 'borrower', 'id'));
    
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
        if ($request->hasfile('patient_id_proof')) {
            $patient_id_proof                    = $request->file('patient_id_proof');
            $name                       = $patient_id_proof->getClientOriginalName();
            $patient_id_proof->storeAs('uploads/claimant/' . $claimant->id . '/', $name, 'public');
            Claimant::where('id', $claimant->id)->update([
                'patient_id_proof'               =>  $name
            ]);
        }

        if ($request->hasfile('pan_no_file')) {
            $pan_no_file                    = $request->file('pan_no_file');
            $rhnname                       = $pan_no_file->getClientOriginalName();
            $pan_no_file->storeAs('uploads/claimant/' . $claimant->id . '/', $rhnname, 'public');
            Claimant::where('id', $claimant->id)->update([
                'pan_no_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('aadhar_no_file')) {
            $aadhar_no_file                    = $request->file('aadhar_no_file');
            $name                       = $aadhar_no_file->getClientOriginalName();
            $aadhar_no_file->storeAs('uploads/claimant/' . $claimant->id . '/', $name, 'public');
            Claimant::where('id', $claimant->id)->update([
                'aadhar_no_file'               =>  $name
            ]);
        }

        if ($request->hasfile('cancel_cheque_file')) {
            $cancel_cheque_file                    = $request->file('cancel_cheque_file');
            $rhnname                       = $cancel_cheque_file->getClientOriginalName();
            $cancel_cheque_file->storeAs('uploads/claimant/' . $claimant->id . '/', $rhnname, 'public');
            Claimant::where('id', $claimant->id)->update([
                'cancel_cheque_file'               =>  $rhnname
            ]);
        }

        $rules = [
            'patient_id' => 'required',
            'claim_id' => 'required',
            'associate_partner_id' => 'required',
            'hospital_id' => 'required',
            'patient_title' => 'required',
            'patient_firstname' => 'required',
            'patient_middlename' => 'required',
            'patient_lastname' => 'required',
            'patient_id_proof' => 'required',
            'are_patient_and_claimant_same' => 'required',
            'title' => 'required',
            'firstname' => 'required',
            'middlename' => 'required|',
            'lastname' => 'required',
            'pan_no' => 'required',
            'aadhar_no' => 'required',
            'patients_relation_with_claimant' => 'required',
            'specify' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'personal_email_id' => 'required|email|max:45',
            'official_email_id' => 'required|email|max:45',
            'mobile_no' => 'required|digits:10',
            'cancel_cheque' => 'required',
            'bank_name' => 'required',
            'bank_address' => 'required',
            'ac_no' => 'required',
            'ifs_code' => 'required',
            'comments' => 'required',
        ];

        $messages =  [
            'patient_id.required'                => 'Please Enter Patient Id',
            'claim_id.required'             => 'Please Enter Claim Id',
            'associate_partner_id.required'               => 'Please Enter Associate Partner Id',
            'hospital_id.required'          => 'Please Enter Hospital Id',
            'patient_title.required'             => 'Please Enter Patient Title',
            'patient_firstname.required'            => 'Please Enter Patient Firstname',
            'patient_middlename.required'          => 'Please Enter Patient Middlename',
            'patient_lastname.required'      => 'Please Enter Patient Lastname',
            'patient_id_proof.required'           => 'Please Enter Patient Id Proof',
            'are_patient_and_claimant_same.required'                     => 'Please Enter Are Patient And Claimant Same',
            'title.required'                 => 'Please Enter Title',
            'firstname.required'                       => 'Please Enter Firstname',
            'middlename.required'                    => 'Please Enter Middlename',
            'lastname.required'            => 'Please Enter Lastname',
            'pan_no.required'            => 'Please Enter Pan No',
            'aadhar_no.required'                   => 'Please Enter Aadhar No',
            'patients_relation_with_claimant.required'        => 'Please Enter Patients Relation With Claimant',
            'specify.required'                 => 'Please Enter Specify',
            'address.required'    => 'Please Enter Address',
            'city.required'          => 'Please Enter City',
            'state.required'    => 'Please Enter State',
            'pincode.required'          => 'Please Enter Pincode',
            'personal_email_id.required'        => 'Please Enter Personal Email Id',
            'official_email_id.required'            => 'Please Enter Official Email Id',
            'mobile_no.required'          => 'Please Enter Mobile No',
            'estimated_amount.required'          => 'Please Enter Estimated Amount',
            'cancel_cheque.required'          => 'Please Enter Cancel Cheque',
            'bank_name.required'            => 'Please Enter Bank Name',
            'bank_address.required'        => 'Please Enter Bank Address',
            'ac_no.required'          => 'Please Enter Bank Account No',
            'ifs_code.required'              => 'Please Enter Bank Ifs Code',
            'comments.required'              => 'Please Enter Comments',
        ];

        $this->validate($request, $rules, $messages);

        $hospitalT =  Claimant::updateOrCreate(
            [
                'id' => $id
            ],
            [
             'patient_id' => $request->patient_id,
             'claim_id' => $request->claim_id,
             'associate_partner_id' => $request->associate_partner_id,
             'hospital_id' => $request->hospital_id,
             'patient_title' => $request->patient_title,
             'patient_firstname' => $request->patient_firstname,
             'patient_middlename' => $request->patient_middlename,
             'patient_lastname' => $request->patient_lastname,
             'patient_id_proof' => $request->patient_id_proof,
             'are_patient_and_claimant_same' => $request->are_patient_and_claimant_same,
             'title' => $request->title,
             'firstname' => $request->firstname,
             'middlename' => $request->middlename,
             'lastname' => $request->lastname,
             'pan_no' => $request->pan_no,
             'aadhar_no' => $request->aadhar_no,
             'patients_relation_with_claimant' => $request->patients_relation_with_claimant,
             'specify' => $request->specify,
             'address' => $request->address,
             'city' => $request->city,
             'state' => $request->state,
             'pincode' => $request->pincode,
             'personal_email_id' => $request->personal_email_id,
             'official_email_id' => $request->official_email_id,
             'mobile_no' => $request->mobile_no,
             'estimated_amount' => $request->estimated_amount,
             'cancel_cheque' => $request->cancel_cheque,
             'bank_name' => $request->bank_name,
             'bank_address' => $request->bank_address,
             'ac_no' => $request->ac_no,
             'ifs_code' => $request->ifs_code,
             'comments' => $request->comments,
         ]);        

        return redirect()->route('super-admin.claimants.edit',$id)->with('success', 'Claimant updated successfully');
    }

    public function borrowerDetails(Request $request, $id)
    {
        echo "<pre>";print_r($request->all());"</pre>";exit;
        $rules = [
            'patient_id' => 'required',
            'claim_id' => 'required',
            'claimant_id' => 'required',
            'hospital_id' => 'required',
            'hospital_name' => 'required|numeric|digits_between:1,2',
            'hospital_address' => 'required|numeric|digits_between:1,2',
            'hospital_city' => 'required|numeric|digits_between:1,2',
            'hospital_state' => 'required|numeric|digits_between:1,2',
            'hospital_pincode' => 'required',
            'patient_title' => 'required|numeric|digits_between:1,2',
            'patient_firstname' => 'required',
            'patient_middlename' => 'required|numeric|digits_between:1,6',
            'patient_lastname' => 'required||numeric|digits_between:1,6',
            'is_patient_and_borrower_same' => 'required',
            'is_claimant_and_borrower_same' => 'required|numeric|digits_between:1,6',
            'title' => 'required',
            'firstname' => 'required|numeric|digits_between:1,6',
            'middlename' => 'required',
            'lastname' => 'required',
            'borrowers_relation_with_patient' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required|max:2',
            'city' => 'required',
            'state' => 'required|max:40',
            'pincode' => 'required',
            'id_proof' => 'required',
            'mobile_no' => 'required|max:6',
            'email_id' => 'required|max:6',
            'official_email_id' => 'required|max:6',
            'pan_no' => 'required|max:6',
            'aadhar_no' => 'required|max:6',
            'bank_statement' => 'required|max:6',
            'itr' => 'required|max:6',
            'cancel_cheque' => 'required|max:6',
            'personal_email_id' => 'required|max:6',
            'bank_name' => 'required',
            'bank_address' => 'required',
            'ac_no' => 'required',
            'ifs_code' => 'required',
            'co_borrower_nominee_name' => 'required',
            'co_borrower_nominee_dob' => 'required',
            'co_borrower_nominee_gender' => 'required',
            'co_borrower_nominee_relation' => 'required',
            'co_borrower_other_documents' => 'required',
            'estimated_amount' => 'required',
            'co_borrower_comments' => 'required',
        ];

        $messages =  [
            'patient_id.required'                => 'Please Enter Patient Id',
            'claim_id.required'             => 'Please Enter Claim Id',
            'claimant_id.required'               => 'Please Enter Claimant Id',
            'hospital_id.required'          => 'Please Enter Hospital Id',
            'hospital_name.required'             => 'Please Enter Hospital Name',
            'hospital_address.required'            => 'Please Enter Hospital Address',
            'hospital_city.required'          => 'Please Enter Hospital City',
            'hospital_state.required'      => 'Please Enter Hospital State',
            'hospital_pincode.required'           => 'Please Enter Hospital Pincode',
            'patient_title.required'                     => 'Please Enter Patient Title',
            'patient_firstname.required'                 => 'Please Enter Patient Firstname',
            'patient_middlename.required'                       => 'Please Enter Patient Middlename',
            'patient_lastname.required'                    => 'Please Enter Patient Lastname',
            'is_patient_and_borrower_same.required'            => 'Please Enter Is Patient And Borrower Same',
            'is_claimant_and_borrower_same.required'            => 'Please Enter Is Claimant And Borrower Same',
            'title.required'                   => 'Please Enter Title',
            'firstname.required'        => 'Please Enter Firstname',
            'middlename.required'                 => 'Please Enter Middlename',
            'lastname.required'    => 'Please Enter Lastname',
            'borrowers_relation_with_patient.required'          => 'Please Enter Borrowers Relation With Patient',
            'gender.required'    => 'Please Enter Gender',
            'dob.required'          => 'Please Enter Dob',
            'address.required'        => 'Please Enter Address',
            'city.required'            => 'Please Enter City',
            'state.required'          => 'Please Enter State',
            'pincode.required'          => 'Please Enter Pincode',
            'id_proof.required'          => 'Please Enter Id Proof',
            'mobile_no.required'            => 'Please Enter Mobile No',
            'email_id.required'        => 'Please Enter Email Id',
            'official_email_id.required'          => 'Please Enter Official Email Id',
            'pan_no.required'              => 'Please Enter Pan No',
            'aadhar_no.required'              => 'Please Enter Aadhar No',
            'bank_statement.required'          => 'Please Enter Bank Statement',
            'itr.required'          => 'Please Enter Itr',
            'cancel_cheque.required'          => 'Please Enter Cancel Cheque',
            'personal_email_id.required'          => 'Please Enter Personal Email Id',
            'bank_name.required'          => 'Please Enter Bank Name',
            'bank_address.required'          => 'Please Enter Bank Address',
            'ac_no.required'          => 'Please Enter Bank Account No',
            'ifs_code.required'          => 'Please Enter Bank Ifs Code',
            'co_borrower_nominee_name.required'          => 'Please Enter Co Borrower Nominee Name',
            'co_borrower_nominee_dob.required'          => 'Please Enter Co Borrower Nominee Dob',
            'co_borrower_nominee_gender.required'          => 'Please Enter Co Borrower Nominee Gender',
            'co_borrower_nominee_relation.required'          => 'Please Enter Co Borrower Nominee Relation',
            'co_borrower_other_documents.required'          => 'Please Enter Co Borrower Other Documents',
            'estimated_amount.required'          => 'Please Enter Estimated Amount',
            'co_borrower_comments.required'          => 'Please Enter Co Borrower Comments',
        ];

        $this->validate($request, $rules, $messages);

        $borrower =  Borrower::updateOrCreate(
            [
                'patient_id' => $id
            ],
            [
                'patient_id' => $request->patient_id,
                'claim_id' => $request->claim_id,
                'claimant_id' => $request->claimant_id,
                'hospital_id' => $request->hospital_id,
                'hospital_name' => $request->hospital_name,
                'hospital_address' => $request->hospital_address,
                'hospital_city' => $request->hospital_city,
                'hospital_state' => $request->hospital_state,
                'hospital_pincode' => $request->hospital_pincode,
                'patient_title' => $request->patient_title,
                'patient_firstname' => $request->patient_firstname,
                'patient_middlename' => $request->patient_middlename,
                'patient_lastname' => $request->patient_lastname,
                'is_patient_and_borrower_same' => $request->is_patient_and_borrower_same,
                'is_claimant_and_borrower_same' => $request->is_claimant_and_borrower_same,
                'title' => $request->title,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'borrowers_relation_with_patient' => $request->borrowers_relation_with_patient,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'id_proof' => $request->id_proof,
                'mobile_no' => $request->mobile_no,
                'email_id' => $request->email_id,
                'official_email_id' => $request->official_email_id,
                'pan_no' => $request->pan_no,
                'aadhar_no' => $request->aadhar_no,
                'bank_statement' => $request->bank_statement,
                'itr' => $request->itr,
                'cancel_cheque' => $request->cancel_cheque,
                'personal_email_id' => $request->personal_email_id,
                'bank_name' => $request->bank_name,
                'bank_address' => $request->bank_address,
                'ac_no' => $request->ac_no,
                'ifs_code' => $request->ifs_code,
                'co_borrower_nominee_name' => $request->co_borrower_nominee_name,
                'co_borrower_nominee_dob' => $request->co_borrower_nominee_dob,
                'co_borrower_nominee_gender' => $request->co_borrower_nominee_gender,
                'co_borrower_nominee_relation' => $request->co_borrower_nominee_relation,
                'co_borrower_other_documents' => $request->co_borrower_other_documents,
                'estimated_amount' => $request->estimated_amount,
                'co_borrower_comments' => $request->co_borrower_comments,
            ]);        

        if ($request->hasfile('id_proof')) {
            $id_proof                    = $request->file('id_proof');
            $name                       = $id_proof->getClientOriginalName();
            $id_proof->storeAs('uploads/borrower/' . $borrower->id . '/', $name, 'public');
            Borrower::where('id', $borrower->id)->update([
                'id_proof'               =>  $name
            ]);
        }

        if ($request->hasfile('pan_no_file')) {
            $pan_no_file                    = $request->file('pan_no_file');
            $rhnname                       = $pan_no_file->getClientOriginalName();
            $pan_no_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'pan_no_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('aadhar_no_file')) {
            $aadhar_no_file                    = $request->file('aadhar_no_file');
            $name                       = $aadhar_no_file->getClientOriginalName();
            $aadhar_no_file->storeAs('uploads/borrower/' . $borrower->id . '/', $name, 'public');
            Borrower::where('id', $borrower->id)->update([
                'aadhar_no_file'               =>  $name
            ]);
        }

         if ($request->hasfile('bank_statement')) {
            $bank_statement                    = $request->file('bank_statement');
            $rhnname                       = $bank_statement->getClientOriginalName();
            $bank_statement->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'bank_statement'               =>  $rhnname
            ]);
        }

         if ($request->hasfile('itr_file')) {
            $itr_file                    = $request->file('itr_file');
            $rhnname                       = $itr_file->getClientOriginalName();
            $itr_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'itr_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('cancel_cheque_file')) {
            $cancel_cheque_file                    = $request->file('cancel_cheque_file');
            $rhnname                       = $cancel_cheque_file->getClientOriginalName();
            $cancel_cheque_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'cancel_cheque_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('co_borrower_nominee_dob_file')) {
            $co_borrower_nominee_dob_file                    = $request->file('co_borrower_nominee_dob_file');
            $rhnname                       = $co_borrower_nominee_dob_file->getClientOriginalName();
            $co_borrower_nominee_dob_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'co_borrower_nominee_dob_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('co_borrower_nominee_gender_file')) {
            $co_borrower_nominee_gender_file                    = $request->file('co_borrower_nominee_gender_file');
            $rhnname                       = $co_borrower_nominee_gender_file->getClientOriginalName();
            $co_borrower_nominee_gender_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'co_borrower_nominee_gender_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('co_borrower_other_documents_file')) {
            $co_borrower_other_documents_file                    = $request->file('co_borrower_other_documents_file');
            $rhnname                       = $co_borrower_other_documents_file->getClientOriginalName();
            $co_borrower_other_documents_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'co_borrower_other_documents_file'               =>  $rhnname
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
