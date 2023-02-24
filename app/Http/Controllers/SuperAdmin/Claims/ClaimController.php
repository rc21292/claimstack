<?php

namespace App\Http\Controllers\Superadmin\Claims;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\InsurancePolicy;
use Illuminate\Http\Request;

class ClaimController extends Controller
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
        $patients = Patient::query();
        if ($filter_search) {
            $patients->where('name', 'like', '%' . $filter_search . '%');
        }
        $patients = $patients->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.claims.claims.manage',  compact('patients', 'filter_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient_id     = $request->patient_id;
        $associates     = AssociatePartner::get();
        $hospitals      = Hospital::get();
        // $patient        = Patient::find($request->patient_id);

        return view('super-admin.claims.claims.create.create',  compact('associates', 'hospitals', 'patient_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function updateInsurancePolicy(Request $request, $id)
    {
        $rules = [
            'patient_id' => 'required',
            'claim_id' => 'required',
            'policy_no' => 'required',
            'insurance_company' => 'required',
            'policy_name' => 'required|numeric|digits_between:1,2',
            'si_no_or_certificate_no' => 'required|numeric|digits_between:1,2',
            'company_or_tpa_id_card_no' => 'required|numeric|digits_between:1,2',
            'tpa_name' => 'required|numeric|digits_between:1,2',
            'policy_type' => 'required',
            'group_name' => 'required|numeric|digits_between:1,2',
            'policy_start_date' => 'required',
            'policy_expiry_date' => 'required|numeric|digits_between:1,6',
            'policy_commencement_date_without_break' => 'required||numeric|digits_between:1,6',
            'proposer_or_primary_insured_sur_name' => 'required',
            'proposer_or_primary_insured_first_name' => 'required|numeric|digits_between:1,6',
            'proposer_or_primary_insured_middle_name' => 'required',
            'proposer_or_primary_insured_last_name' => 'required|numeric|digits_between:1,6',
            'is_primary_insured_and_patient_same' => 'required',
            'primary_insured_address' => 'required',
            'primary_insured_city' => 'required',
            'primary_insured_state' => 'required',
            'primary_insured_pincode' => 'required',
            'no_of_insured_person' => 'required|max:2',
            'basic_sum_insured' => 'required',
            'cumulative_bonus_cv' => 'required|max:40',
            'agent_broker_code' => 'required',
            'agent_broker_name' => 'required',
            'are_you_covered_under_any_top_up_or_additional_policy' => 'required|max:6',
            'currently_covered_by_any_other_mediclaim_or_health_insurance' => 'required|max:6',
            'other_policy_commencement_date_without_break' => 'required|max:6',
            'other_policy_insurance_company_name' => 'required|max:6',
            'other_policy_no' => 'required|max:6',
            'other_policy_sum_insured' => 'required|max:6',
            'patient_hospitalized_last_4y_since_inception' => 'required|max:6',
            'date_of_admission_past' => 'required|max:6',
            'diagnosis_previous' => 'required|max:6',
            'policy_details_comments' => 'required|max:6',
        ];

        $this->validate($request, $rules);

        $hospitalT =  InsurancePolicy::updateOrCreate([
            'patient_id' => $id],
            [
                'claim_id' => $request->claim_id,
                'policy_no' => $request->policy_no,
                'insurance_company' => $request->insurance_company,
                'policy_name' => $request->policy_name,
                'si_no_or_certificate_no' => $request->si_no_or_certificate_no,
                'company_or_tpa_id_card_no' => $request->company_or_tpa_id_card_no,
                'tpa_name' => $request->tpa_name,
                'policy_type' => $request->policy_type,
                'group_name' => $request->group_name,
                'policy_start_date' => $request->policy_start_date,
                'policy_expiry_date' => $request->policy_expiry_date,
                'policy_commencement_date_without_break' => $request->policy_commencement_date_without_break,
                'proposer_or_primary_insured_sur_name' => $request->proposer_or_primary_insured_sur_name,
                'proposer_or_primary_insured_first_name' => $request->proposer_or_primary_insured_first_name,
                'proposer_or_primary_insured_middle_name' => $request->proposer_or_primary_insured_middle_name,
                'proposer_or_primary_insured_last_name' => $request->proposer_or_primary_insured_last_name,
                'is_primary_insured_and_patient_same' => $request->is_primary_insured_and_patient_same,
                'primary_insured_address' => $request->primary_insured_address,
                'primary_insured_city' => $request->primary_insured_city,
                'primary_insured_state' => $request->primary_insured_state,
                'primary_insured_pincode' => $request->primary_insured_pincode,
                'no_of_insured_person' => $request->no_of_insured_person,
                'basic_sum_insured' => $request->basic_sum_insured,
                'cumulative_bonus_cv' => $request->cumulative_bonus_cv,
                'agent_broker_code' => $request->agent_broker_code,
                'agent_broker_name' => $request->agent_broker_name,
                'are_you_covered_under_any_top_up_or_additional_policy' => $request->are_you_covered_under_any_top_up_or_additional_policy,
                'currently_covered_by_any_other_mediclaim_or_health_insurance' => $request->currently_covered_by_any_other_mediclaim_or_health_insurance,
                'other_policy_commencement_date_without_break' => $request->other_policy_commencement_date_without_break,
                'other_policy_insurance_company_name' => $request->other_policy_insurance_company_name,
                'other_policy_no' => $request->other_policy_no,
                'other_policy_sum_insured' => $request->other_policy_sum_insured,
                'patient_hospitalized_last_4y_since_inception' => $request->patient_hospitalized_last_4y_since_inception,
                'date_of_admission_past' => $request->date_of_admission_past,
                'diagnosis_previous' => $request->diagnosis_previous,
                'policy_details_comments' => $request->policy_details_comments
            ]);

        return redirect()->back()->with('success', 'Insurance Policy updated successfully');

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
        //
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
