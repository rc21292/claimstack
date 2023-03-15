<?php

namespace App\Http\Controllers\SuperAdmin\Claims;

use App\Http\Controllers\Controller;
use App\Models\Claimant;
use App\Models\ClaimProcessing;
use App\Models\Insurer;
use Illuminate\Http\Request;
use App\Models\IcdCode;
use App\Models\PcsCode;

class ClaimProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $claimant                       = Claimant::with('claim')->find($id);
        $patient                        = $claimant->patient;
        $claim                          = $claimant->claim;
        $hospital                       = $claimant->hospital;
        $claim_processing_exists        = ClaimProcessing::where('patient_id', $claimant->patient_id)->exists();
        $claim_processing               = $claim_processing_exists ? ClaimProcessing::where('claimant_id', $claimant->id)->first() : null;
        $insurers                       = Insurer::get();
        $icd_codes_level1               = IcdCode::distinct('level1_code')->get(['level1','level1_code']);
        $icd_codes_level2               = IcdCode::distinct('level2_code')->get(['level2','level2_code']);
        $icd_codes_level3               = IcdCode::distinct('level3_code')->get(['level3','level3_code']);
        $icd_codes_level4               = IcdCode::distinct('level4_code')->get(['level4','level4_code']);
        $pcs_group_name                 = PcsCode::distinct('pcs_group_code')->get(['pcs_group_name','pcs_group_code']);
        $pcs_sub_group_name             = PcsCode::distinct('pcs_sub_group_code')->get(['pcs_sub_group_name','pcs_sub_group_code']);
        $pcs_short_name                 = PcsCode::distinct('pcs_code')->get(['pcs_short_name', 'pcs_long_name', 'pcs_code']);
        $pcs_codes                      = PcsCode::get();

        return view('super-admin.claims.claimants.edit.claim-processing', compact('claimant', 'claim_processing', 'insurers', 'icd_codes_level1', 'icd_codes_level2', 'icd_codes_level3', 'icd_codes_level4', 'pcs_group_name', 'pcs_sub_group_name', 'pcs_short_name' , 'pcs_codes', 'patient', 'hospital', 'claim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $claimant  = Claimant::with('claim')->find($id);
        
        $rules = [
            'primary_diagnosis_icd_leveli_disease' => 'required',
            'primary_diagnosis_icd_leveli_code' => 'required',
            'primary_diagnosis_icd_levelii_disease' => 'required',
            'primary_diagnosis_icd_levelii_code' => 'required',
            'primary_diagnosis_icd_leveliii_disease' => 'required',
            'primary_diagnosis_icd_leveliii_code' => 'required',
            'primary_diagnosis_icd_leveliv_disease' => 'required',
            'primary_diagnosis_icd_leveliv_code' => 'required',
            'final_assessment_status' => 'required',
            'processing_query' => ($request->final_assessment_status == 'Query Raised by BHC Team') ? 'required' : [],
            'final_assessment_amount' => ($request->final_assessment_status == 'Query Raised by BHC Team') ? 'required' : [],
        ];

        $messages = [
            'primary_diagnosis_icd_leveli_disease.required' => 'Please enter Primary Diagnosis Icd Level I Disease',
            'primary_diagnosis_icd_leveli_code.required' => 'Please enter Primary Diagnosis Icd Level I Code',
            'primary_diagnosis_icd_levelii_disease.required' => 'Please enter Primary Diagnosis Icd Level II Disease',
            'primary_diagnosis_icd_levelii_code.required' => 'Please enter Primary Diagnosis Icd Level II Code',
            'primary_diagnosis_icd_leveliii_disease.required' => 'Please enter Primary Diagnosis Icd Level II Disease',
            'primary_diagnosis_icd_leveliii_code.required' => 'Please enter Primary Diagnosis Icd Level III Code',
            'primary_diagnosis_icd_leveliv_disease.required' => 'Please enter Primary Diagnosis Icd Level IV Disease',
            'primary_diagnosis_icd_leveliv_code.required' => 'Please enter Primary Diagnosis Icd Level IV Code',
            'final_assessment_status.required' => 'Please enter Final Assessment Status',
            'query.required' => 'Please enter query',
            'final_assessment_amount.required' => 'Please enter Final Assessment Amount',
        ];

        $this->validateWithBag('claim-processing-form', $request, $rules, $messages);

        $details = ClaimProcessing::updateOrCreate([
            'patient_id' => $claimant->patient_id,
        ],[
            'claimant_id' => $id,
            'patient_title' => $request->patient_title,
            'patient_lastname' => $request->patient_lastname,
            'patient_firstname' => $request->patient_firstname,
            'patient_middlename' => $request->patient_middlename,
            'patient_age' => $request->patient_age,
            'patient_gender' => $request->patient_gender,
            'patient_current_residential_address' => $request->patient_current_residential_address,
            'patient_current_city' => $request->patient_current_city,
            'patient_current_state' => $request->patient_current_state,
            'patient_current_pincode' => $request->patient_current_pincode,
            'hospital_id' => $request->hospital_id,
            'hospital_name' => $request->hospital_name,
            'hospital_address' => $request->hospital_address,
            'hospital_city' => $request->hospital_city,
            'hospital_state' => $request->hospital_state,
            'hospital_pincode' => $request->hospital_pincode,
            'insurance_company' => $request->insurance_company,
            'policy_type' => $request->policy_type,
            'policy_name' => $request->policy_name,
            'policy_start_date' => $request->policy_start_date,
            'policy_expiry_date' => $request->policy_expiry_date,
            'policy_commencement_date_without_break' => $request->policy_commencement_date_without_break,
            'date_of_admission' => $request->date_of_admission,
            'time_of_admission' => $request->time_of_admission,
            'expected_date_of_discharge' => $request->expected_date_of_discharge,
            'expected_no_of_days_in_hospital' => $request->expected_no_of_days_in_hospital,
            'hospitalization_due_to' => $request->hospitalization_due_to,
            'date_of_delivery' => $request->date_of_delivery,
            'date_of_first_consultation' => $request->date_of_first_consultation,
            'system_of_medicine' => $request->system_of_medicine,
            'treatment_type' => $request->treatment_type,
            'admission_type_1' => $request->admission_type_1,
            'admission_type_2' => $request->admission_type_2,
            'admission_type_3' => $request->admission_type_3,
            'claim_category' => $request->claim_category,
            'treatment_category' => $request->treatment_category,
            'disease_category' => $request->disease_category,
            'disease_name' => $request->disease_name,
            'disease_type' => $request->disease_type,
            'nature_of_illness_disease_with_presenting_complaints' => $request->nature_of_illness_disease_with_presenting_complaints,
            'relevant_clinical_findings' => $request->relevant_clinical_findings,
            'past_history_of_any_chronic_illness' => $request->past_history_of_any_chronic_illness,
            'any_other_aliment_details' => $request->any_other_aliment_details,
            'primary_diagnosis_icd_leveli_disease' => $request->primary_diagnosis_icd_leveli_disease,
            'primary_diagnosis_icd_leveli_code' => $request->primary_diagnosis_icd_leveli_code,
            'primary_diagnosis_icd_levelii_disease' => $request->primary_diagnosis_icd_levelii_disease,
            'primary_diagnosis_icd_levelii_code' => $request->primary_diagnosis_icd_levelii_code,
            'primary_diagnosis_icd_leveliii_disease' => $request->primary_diagnosis_icd_leveliii_disease,
            'primary_diagnosis_icd_leveliii_code' => $request->primary_diagnosis_icd_leveliii_code,
            'primary_diagnosis_icd_leveliv_disease' => $request->primary_diagnosis_icd_leveliv_disease,
            'primary_diagnosis_icd_leveliv_code' => $request->primary_diagnosis_icd_leveliv_code,
            'additional_diagnosis_icd_leveli_disease' => $request->additional_diagnosis_icd_leveli_disease,
            'additional_diagnosis_icd_leveli_code' => $request->additional_diagnosis_icd_leveli_code,
            'additional_diagnosis_icd_levelii_disease' => $request->additional_diagnosis_icd_levelii_disease,
            'additional_diagnosis_icd_levelii_code' => $request->additional_diagnosis_icd_levelii_code,
            'additional_diagnosis_icd_leveliii_disease' => $request->additional_diagnosis_icd_leveliii_disease,
            'additional_diagnosis_icd_leveliii_code' => $request->additional_diagnosis_icd_leveliii_code,
            'additional_diagnosis_icd_leveliv_disease' => $request->additional_diagnosis_icd_leveliv_disease,
            'additional_diagnosis_icd_leveliv_code' => $request->additional_diagnosis_icd_leveliv_code,
            'co_morbidities_icd_leveli_disease' => $request->co_morbidities_icd_leveli_disease,
            'co_morbidities_icd_leveli_code' => $request->co_morbidities_icd_leveli_code,
            'co_morbidities_icd_levelii_disease' => $request->co_morbidities_icd_levelii_disease,
            'co_morbidities_icd_levelii_code' => $request->co_morbidities_icd_levelii_code,
            'co_morbidities_icd_leveliii_disease' => $request->co_morbidities_icd_leveliii_disease,
            'co_morbidities_icd_leveliii_code' => $request->co_morbidities_icd_leveliii_code,
            'co_morbidities_icd_leveliv_disease' => $request->co_morbidities_icd_leveliv_disease,
            'co_morbidities_icd_leveliv_code' => $request->co_morbidities_icd_leveliv_code,
            'co_morbidities_comments' => $request->co_morbidities_comments,
            'procedure_name' => $request->procedure_name,
            'procedure_i_pcs_group_name' => $request->procedure_i_pcs_group_name,
            'procedure_i_pcs_group_code' => $request->procedure_i_pcs_group_code,
            'procedure_i_pcs_sub_group_name' => $request->procedure_i_pcs_sub_group_name,
            'procedure_i_pcs_sub_group_code' => $request->procedure_i_pcs_sub_group_code,
            'procedure_i_pcs_short_name' => $request->procedure_i_pcs_short_name,
            'procedure_i_pcs_code' => $request->procedure_i_pcs_code,
            'procedure_i_pcs_long_name' => $request->procedure_i_pcs_long_name,
            'procedure_ii_pcs_group_name' => $request->procedure_ii_pcs_group_name,
            'procedure_ii_pcs_group_code' => $request->procedure_ii_pcs_group_code,
            'procedure_ii_pcs_sub_group_name' => $request->procedure_ii_pcs_sub_group_name,
            'procedure_ii_pcs_sub_group_code' => $request->procedure_ii_pcs_sub_group_code,
            'procedure_ii_pcs_short_name' => $request->procedure_ii_pcs_short_name,
            'procedure_ii_pcs_code' => $request->procedure_ii_pcs_code,
            'procedure_ii_pcs_long_name' => $request->procedure_ii_pcs_long_name,
            'procedure_iii_pcs_group_name' => $request->procedure_iii_pcs_group_name,
            'procedure_iii_pcs_group_code' => $request->procedure_iii_pcs_group_code,
            'procedure_iii_pcs_sub_group_name' => $request->procedure_iii_pcs_sub_group_name,
            'procedure_iii_pcs_sub_group_code' => $request->procedure_iii_pcs_sub_group_code,
            'procedure_iii_pcs_short_name' => $request->procedure_iii_pcs_short_name,
            'procedure_iii_pcs_code' => $request->procedure_iii_pcs_code,
            'procedure_iii_pcs_long_name' => $request->procedure_iii_pcs_long_name,
            'final_assessment_status' => $request->final_assessment_status,
            'processing_query' => $request->processing_query,
            'final_assessment_amount' => $request->final_assessment_amount,
            'final_assessment_comments' => $request->final_assessment_comments,
        ]);

        return redirect()->back()->with('success', 'Claim Processing created/updated successfully');

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
