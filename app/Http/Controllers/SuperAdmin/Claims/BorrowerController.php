<?php

namespace App\Http\Controllers\SuperAdmin\Claims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssociatePartner;
use App\Models\Claimant;
use App\Models\IcdCode;
use App\Models\PcsCode;
use App\Models\Borrower;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Claim;
use App\Models\LendingStatus;
use App\Models\DischargeStatus;
use App\Models\Insurer;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $borrowers = Borrower::query();

        if($filter_search){
            $borrowers->where('patient_id', 'like','%' . $filter_search . '%');
        }

        $borrowers = $borrowers->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.claims.borrowers.manage',  compact('borrowers', 'filter_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $claimants = Claimant::with('claim')->whereHas('claim', function ($query){
            $query->where('lending_required', 'Yes');
        })->get();


        return view('super-admin.claims.borrowers.create.create', compact('claimants'));
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
            'patient_id' => 'required',
            'claim_id' => 'required',
            'claimant_id' => 'required',
            'hospital_id' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'hospital_city' => 'required',
            'hospital_state' => 'required',
            'hospital_pincode' => 'required',
            'patient_title' => 'required',
            'patient_firstname' => 'required',
            'patient_middlename' => 'required',
            // 'patient_lastname' => 'required',
            'is_patient_and_borrower_same' => 'required',
            'is_claimant_and_borrower_same' => ($request->is_patient_and_borrower_same == 'No') ? 'required' : [],
            'borrower_title' => 'required|max:25',
            'borrower_firstname' => 'required|max:25',
            // 'borrower_middlename' => 'required|max:25',
            // 'borrower_lastname' => 'required|max:25',
            'borrowers_relation_with_patient' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'borrower_address' => 'required|max:100',
            'borrower_city' => 'required',
            'borrower_state' => 'required|max:40',
            'borrower_pincode' => 'required',
            'borrower_id_proof' => 'required',
            'borrower_id_proof_file' => (($request->is_patient_and_borrower_same == '' || $request->is_patient_and_borrower_same == 'No') && empty($borrower->borrower_id_proof_file) ) ? 'required' : [],
            'borrower_mobile_no' => 'required|digits:10',
            'borrower_estimated_amount' => 'required|digits_between:1,8',
            // 'borrower_email_id' => 'required|email|max:45',
            'borrower_pan_no' => 'required|alpha_num|unique:borrowers|size:10|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/u',
            'borrower_pan_no_file' => (($request->is_claimant_and_borrower_same == '' || $request->is_claimant_and_borrower_same == 'No') && empty($borrower->borrower_pan_no_file) ) ? 'required' : [],
            'borrower_aadhar_no' => 'required|numeric|digits:12',
            'borrower_aadhar_no_file' => (($request->is_claimant_and_borrower_same == '' || $request->is_claimant_and_borrower_same == 'No') && empty($borrower->borrower_aadhar_no_file) ) ? 'required' : [],
            'borrower_cancel_cheque' => 'required',
            'borrower_cancel_cheque_file' => ($request->borrower_cancel_cheque != 'No' && empty($borrower->borrower_cancel_cheque_file)) ? 'required' : [],
            'borrower_personal_email_id' => 'required',
            'borrower_bank_name' => 'required|max:45',
            'borrower_bank_address' => 'required|max:80',
            'borrower_ac_no' => 'required|max:20',
            'borrower_ifs_code' => 'required|max:11',
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
            'borrower_title.required'                   => 'Please Enter Title',
            'borrower_firstname.required'        => 'Please Enter Firstname',
            'borrower_middlename.required'                 => 'Please Enter Middlename',
            'borrower_lastname.required'    => 'Please Enter Lastname',
            'borrowers_relation_with_patient.required'          => 'Please Enter Borrowers Relation With Patient',
            'gender.required'    => 'Please Enter Gender',
            'dob.required'          => 'Please Enter Dob',
            'borrower_address.required'        => 'Please Enter Address',
            'borrower_city.required'            => 'Please Enter City',
            'borrower_state.required'          => 'Please Enter State',
            'borrower_pincode.required'          => 'Please Enter Pincode',
            'borrower_id_proof.required'          => 'Please Enter Id Proof',
            'borrower_mobile_no.required'            => 'Please Enter Mobile No',
            // 'borrower_email_id.required'        => 'Please Enter Email Id',
            'borrower_official_email_id.required'          => 'Please Enter Official Email Id',
            'borrower_pan_no.required'              => 'Please Enter Pan No',
            'borrower_aadhar_no.required'              => 'Please Enter Aadhar No',
            'bank_statement.required'          => 'Please Enter Bank Statement',
            'itr.required'          => 'Please Enter Itr',
            'borrower_cancel_cheque.required'          => 'Please Enter Cancel Cheque',
            'borrower_personal_email_id.required'          => 'Please Enter Personal Email Id',
            'borrower_bank_name.required'          => 'Please Enter Bank Name',
            'borrower_bank_address.required'          => 'Please Enter Bank Address',
            'borrower_ac_no.required'          => 'Please Enter Bank Account No',
            'borrower_ifs_code.required'          => 'Please Enter Bank Ifs Code',
            'co_borrower_nominee_name.required'          => 'Please Enter Co Borrower Nominee Name',
            'co_borrower_nominee_dob.required'          => 'Please Enter Co Borrower Nominee Dob',
            'co_borrower_nominee_gender.required'          => 'Please Enter Co Borrower Nominee Gender',
            'co_borrower_nominee_relation.required'          => 'Please Enter Co Borrower Nominee Relation',
            'co_borrower_other_documents.required'          => 'Please Enter Co Borrower Other Documents',
            'borrower_estimated_amount.required'          => 'Please Enter Estimated Amount',
            'co_borrower_comments.required'          => 'Please Enter Co Borrower Comments',
        ];

        $this->validate($request, $rules, $messages);

        $borrower =  Borrower::Create(
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
                'borrower_title' => $request->borrower_title,
                'borrower_firstname' => $request->borrower_firstname,
                'borrower_middlename' => $request->borrower_middlename,
                'borrower_lastname' => $request->borrower_lastname,
                'borrowers_relation_with_patient' => $request->borrowers_relation_with_patient,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'borrower_address' => $request->borrower_address,
                'borrower_city' => $request->borrower_city,
                'borrower_state' => $request->borrower_state,
                'borrower_pincode' => $request->borrower_pincode,
                'borrower_id_proof' => $request->borrower_id_proof,
                'borrower_mobile_no' => $request->borrower_mobile_no,
                // 'borrower_email_id' => $request->borrower_email_id,
                'borrower_official_email_id' => $request->borrower_official_email_id,
                'borrower_pan_no' => $request->borrower_pan_no,
                'borrower_aadhar_no' => $request->borrower_aadhar_no,
                'bank_statement' => $request->bank_statement,
                'itr' => $request->itr,
                'borrower_cancel_cheque' => $request->borrower_cancel_cheque,
                'borrower_personal_email_id' => $request->borrower_personal_email_id,
                'borrower_bank_name' => $request->borrower_bank_name,
                'borrower_bank_address' => $request->borrower_bank_address,
                'borrower_ac_no' => $request->borrower_ac_no,
                'borrower_ifs_code' => $request->borrower_ifs_code,
                'co_borrower_nominee_name' => $request->co_borrower_nominee_name,
                'co_borrower_nominee_dob' => $request->co_borrower_nominee_dob,
                'co_borrower_nominee_gender' => $request->co_borrower_nominee_gender,
                'co_borrower_nominee_relation' => $request->co_borrower_nominee_relation,
                'co_borrower_other_documents' => $request->co_borrower_other_documents,
                'borrower_estimated_amount' => $request->borrower_estimated_amount,
                'co_borrower_comments' => $request->co_borrower_comments,
            ]);


        if ($request->hasfile('borrower_id_proof_file')) {
            $borrower_id_proof_file                    = $request->file('borrower_id_proof_file');
            $name                       = $borrower_id_proof_file->getClientOriginalName();
            $borrower_id_proof_file->storeAs('uploads/borrower/' . $borrower->id . '/', $name, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_id_proof_file'               =>  $name
            ]);
        }

        if ($request->hasfile('borrower_pan_no_file')) {
            $borrower_pan_no_file                    = $request->file('borrower_pan_no_file');
            $rhnname                       = $borrower_pan_no_file->getClientOriginalName();
            $borrower_pan_no_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_pan_no_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('borrower_aadhar_no_file')) {
            $borrower_aadhar_no_file                    = $request->file('borrower_aadhar_no_file');
            $name                       = $borrower_aadhar_no_file->getClientOriginalName();
            $borrower_aadhar_no_file->storeAs('uploads/borrower/' . $borrower->id . '/', $name, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_aadhar_no_file'               =>  $name
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

        if ($request->hasfile('borrower_cancel_cheque_file')) {
            $borrower_cancel_cheque_file                    = $request->file('borrower_cancel_cheque_file');
            $rhnname                       = $borrower_cancel_cheque_file->getClientOriginalName();
            $borrower_cancel_cheque_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_cancel_cheque_file'               =>  $rhnname
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

        $claimant = $borrower->claimant;

        Borrower::where('id', $borrower->id)->update([
            'uid'      => 'BRO' . substr($claimant->pan_no, 0, 2) . substr($borrower->pan_no, -3)
        ]);

        return redirect()->route('super-admin.borrowers.index')->with('success', 'Borrower created successfully');

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
        $borrower       = Borrower::find($id);
        $claimant       = $borrower->claimant;
        $hospital       = Hospital::where('id',$borrower->hospital_id)->first();
        $hospitals      = Hospital::get();

        $icd_codes_level1      = IcdCode::where('level1', '!=', '#N/A')->where('level1', '!=', 'Level-1')->distinct('level1_code')->get(['level1','level1_code']);
        $icd_codes_level2      = IcdCode::where('level2', '!=', '#N/A')->where('level2', '!=', 'Level-2')->distinct('level2_code')->get(['level2','level2_code']);
        $icd_codes_level3      = IcdCode::where('level3', '!=', '#N/A')->where('level3', '!=', 'Level-3')->distinct('level3_code')->get(['level3','level3_code']);
        $icd_codes_level4      = IcdCode::where('level4', '!=', '#N/A')->where('level4', '!=', 'Level-4')->distinct('level4_code')->get(['level4','level4_code']);

        $pcs_group_name  = PcsCode::distinct('pcs_group_code')->get(['pcs_group_name','pcs_group_code']);

        $pcs_sub_group_name  = PcsCode::distinct('pcs_sub_group_code')->get(['pcs_sub_group_name','pcs_sub_group_code']);

        $pcs_short_name = PcsCode::distinct('pcs_code')->get(['pcs_short_name', 'pcs_long_name', 'pcs_code']);

        $pcs_codes      = PcsCode::get();
        $patient        = Patient::where('id', $borrower->patient_id)->first();
        $insurers       = Insurer::get();
        $associates  = AssociatePartner::get();
        $patient_id   = $borrower->patient_id;
        $hospital_id   = $borrower->hospital_id;
        $claimantId   = $borrower->claimant_id;

        $claim = $claimant->claim;
        $policy_no = $claim->policy_no;

        $claim_id = $claimant->claim_id;
        $claimant_id = $claimant->uid;

        $hospital_name = $hospital->name;
        $hospital_address = $hospital->address;
        $hospital_city = $hospital->city;
        $hospital_state = $hospital->state;
        $hospital_pincode = $hospital->pincode;
        $patient_title = $patient->title;
        $patient_firstname = $patient->firstname;
        $patient_middlename = $patient->middlename;
        $patient_lastname = $patient->lastname;

        return view('super-admin.claims.borrowers.edit.edit',  compact('patient_id', 'claim_id', 'claimant_id', 'hospital_id', 'associates', 'hospitals', 'patient', 'claimant', 'borrower', 'hospital_name', 'claimantId', 'policy_no', 'hospital_address', 'hospital_city', 'hospital_state', 'hospital_pincode', 'patient_title', 'patient_firstname', 'patient_middlename', 'patient_lastname', 'id', 'claim', 'insurers', 'icd_codes_level1', 'pcs_codes', 'icd_codes_level2', 'icd_codes_level3' , 'icd_codes_level4', 'pcs_group_name', 'pcs_sub_group_name', 'pcs_short_name'));

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
        $borrower = Borrower::where('id',$id)->first();


        if ($request->hasfile('borrower_id_proof_file')) {
            $borrower_id_proof_file                    = $request->file('borrower_id_proof_file');
            $name                       = $borrower_id_proof_file->getClientOriginalName();
            $borrower_id_proof_file->storeAs('uploads/borrower/' . $borrower->id . '/', $name, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_id_proof_file'               =>  $name
            ]);
        }

        if ($request->hasfile('borrower_pan_no_file')) {
            $borrower_pan_no_file                    = $request->file('borrower_pan_no_file');
            $rhnname                       = $borrower_pan_no_file->getClientOriginalName();
            $borrower_pan_no_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_pan_no_file'               =>  $rhnname
            ]);
        }

        if ($request->hasfile('borrower_aadhar_no_file')) {
            $borrower_aadhar_no_file                    = $request->file('borrower_aadhar_no_file');
            $name                       = $borrower_aadhar_no_file->getClientOriginalName();
            $borrower_aadhar_no_file->storeAs('uploads/borrower/' . $borrower->id . '/', $name, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_aadhar_no_file'               =>  $name
            ]);
        }

         if ($request->hasfile('bank_statement_file')) {
            $bank_statement_file                    = $request->file('bank_statement_file');
            $rhnname                       = $bank_statement_file->getClientOriginalName();
            $bank_statement_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'bank_statement_file'               =>  $rhnname
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

        if ($request->hasfile('borrower_cancel_cheque_file')) {
            $borrower_cancel_cheque_file                    = $request->file('borrower_cancel_cheque_file');
            $rhnname                       = $borrower_cancel_cheque_file->getClientOriginalName();
            $borrower_cancel_cheque_file->storeAs('uploads/borrower/' . $borrower->id . '/', $rhnname, 'public');
            Borrower::where('id', $borrower->id)->update([
                'borrower_cancel_cheque_file'               =>  $rhnname
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

        $rules = [
            'patient_id' => 'required',
            'claim_id' => 'required',
            'claimant_id' => 'required',
            'hospital_id' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'hospital_city' => 'required',
            'hospital_state' => 'required',
            'hospital_pincode' => 'required',
            'patient_title' => 'required',
            'patient_firstname' => 'required',
            'patient_middlename' => 'required',
            // 'patient_lastname' => 'required',
            'is_patient_and_borrower_same' => 'required',
            'is_claimant_and_borrower_same' => ($request->is_patient_and_borrower_same == 'No') ? 'required' : [],
            'borrower_title' => 'required|max:25',
            'borrower_firstname' => 'required|max:25',
            // 'borrower_middlename' => 'required|max:25',
            // 'borrower_lastname' => 'required|max:25',
            'borrowers_relation_with_patient' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'borrower_address' => 'required|max:100',
            'borrower_city' => 'required',
            'borrower_state' => 'required|max:40',
            'borrower_pincode' => 'required',
            'borrower_id_proof' => 'required',
            'borrower_id_proof_file' => (($request->is_patient_and_borrower_same == '' || $request->is_patient_and_borrower_same == 'No') && empty($borrower->borrower_id_proof_file) ) ? 'required' : [],
            'borrower_mobile_no' => 'required|digits:10',
            'borrower_estimated_amount' => 'required|digits_between:1,8',
            // 'borrower_email_id' => 'required|email|max:45',
            'borrower_pan_no' => 'required|alpha_num|size:10|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/u',
            'borrower_pan_no_file' => (($request->is_claimant_and_borrower_same == '' || $request->is_claimant_and_borrower_same == 'No') && empty($borrower->borrower_pan_no_file) ) ? 'required' : [],
            'borrower_aadhar_no' => 'required|numeric|digits:12',
            'borrower_aadhar_no_file' => (($request->is_claimant_and_borrower_same == '' || $request->is_claimant_and_borrower_same == 'No') && empty($borrower->borrower_aadhar_no_file) ) ? 'required' : [],
            'borrower_cancel_cheque' => 'required',
            'borrower_cancel_cheque_file' => ($request->borrower_cancel_cheque != 'No' && empty($borrower->borrower_cancel_cheque_file)) ? 'required' : [],
            'borrower_personal_email_id' => 'required',
            'borrower_bank_name' => 'required|max:45',
            'borrower_bank_address' => 'required|max:80',
            'borrower_ac_no' => 'required|max:20',
            'borrower_ifs_code' => 'required|max:11',
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
            'borrower_title.required'                   => 'Please Enter Title',
            'borrower_firstname.required'        => 'Please Enter Firstname',
            'borrower_middlename.required'                 => 'Please Enter Middlename',
            'borrower_lastname.required'    => 'Please Enter Lastname',
            'borrowers_relation_with_patient.required'          => 'Please Enter Borrowers Relation With Patient',
            'gender.required'    => 'Please Enter Gender',
            'dob.required'          => 'Please Enter Dob',
            'borrower_address.required'        => 'Please Enter Address',
            'borrower_city.required'            => 'Please Enter City',
            'borrower_state.required'          => 'Please Enter State',
            'borrower_pincode.required'          => 'Please Enter Pincode',
            'borrower_id_proof.required'          => 'Please Enter Id Proof',
            'borrower_mobile_no.required'            => 'Please Enter Mobile No',
            // 'borrower_email_id.required'        => 'Please Enter Email Id',
            'borrower_official_email_id.required'          => 'Please Enter Official Email Id',
            'borrower_pan_no.required'              => 'Please Enter Pan No',
            'borrower_aadhar_no.required'              => 'Please Enter Aadhar No',
            'bank_statement.required'          => 'Please Enter Bank Statement',
            'itr.required'          => 'Please Enter Itr',
            'borrower_cancel_cheque.required'          => 'Please Enter Cancel Cheque',
            'borrower_personal_email_id.required'          => 'Please Enter Personal Email Id',
            'borrower_bank_name.required'          => 'Please Enter Bank Name',
            'borrower_bank_address.required'          => 'Please Enter Bank Address',
            'borrower_ac_no.required'          => 'Please Enter Bank Account No',
            'borrower_ifs_code.required'          => 'Please Enter Bank Ifs Code',
            'co_borrower_nominee_name.required'          => 'Please Enter Co Borrower Nominee Name',
            'co_borrower_nominee_dob.required'          => 'Please Enter Co Borrower Nominee Dob',
            'co_borrower_nominee_gender.required'          => 'Please Enter Co Borrower Nominee Gender',
            'co_borrower_nominee_relation.required'          => 'Please Enter Co Borrower Nominee Relation',
            'co_borrower_other_documents.required'          => 'Please Enter Co Borrower Other Documents',
            'borrower_estimated_amount.required'          => 'Please Enter Estimated Amount',
            'co_borrower_comments.required'          => 'Please Enter Co Borrower Comments',
        ];

        // $this->validate($request, $rules, $messages);

        $this->validateWithBag('borrower-details-form', $request, $rules, $messages);

        $borrower =  Borrower::where('id',$id)->update(
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
                'borrower_title' => $request->borrower_title,
                'borrower_firstname' => $request->borrower_firstname,
                'borrower_middlename' => $request->borrower_middlename,
                'borrower_lastname' => $request->borrower_lastname,
                'borrowers_relation_with_patient' => $request->borrowers_relation_with_patient,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'borrower_address' => $request->borrower_address,
                'borrower_city' => $request->borrower_city,
                'borrower_state' => $request->borrower_state,
                'borrower_pincode' => $request->borrower_pincode,
                'borrower_id_proof' => $request->borrower_id_proof,
                'borrower_mobile_no' => $request->borrower_mobile_no,
                // 'borrower_email_id' => $request->borrower_email_id,
                'borrower_official_email_id' => $request->borrower_official_email_id,
                'borrower_pan_no' => $request->borrower_pan_no,
                'borrower_aadhar_no' => $request->borrower_aadhar_no,
                'bank_statement' => $request->bank_statement,
                'itr' => $request->itr,
                'borrower_cancel_cheque' => $request->borrower_cancel_cheque,
                'borrower_personal_email_id' => $request->borrower_personal_email_id,
                'borrower_bank_name' => $request->borrower_bank_name,
                'borrower_bank_address' => $request->borrower_bank_address,
                'borrower_ac_no' => $request->borrower_ac_no,
                'borrower_ifs_code' => $request->borrower_ifs_code,
                'co_borrower_nominee_name' => $request->co_borrower_nominee_name,
                'co_borrower_nominee_dob' => $request->co_borrower_nominee_dob,
                'co_borrower_nominee_gender' => $request->co_borrower_nominee_gender,
                'co_borrower_nominee_relation' => $request->co_borrower_nominee_relation,
                'co_borrower_other_documents' => $request->co_borrower_other_documents,
                'borrower_estimated_amount' => $request->borrower_estimated_amount,
                'co_borrower_comments' => $request->co_borrower_comments,
            ]);

        $borrower = Borrower::find($id);

        $claimant = $borrower->claimant;

        Borrower::where('id', $id)->update([
            'uid'      => 'BRO' . substr($claimant->pan_no, 0, 2) . substr($borrower->borrower_pan_no, -3)
        ]);

        return redirect()->route('super-admin.borrowers.index')->with('success', 'Borrower created successfully');

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
