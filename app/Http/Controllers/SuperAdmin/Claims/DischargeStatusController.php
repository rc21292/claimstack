<?php

namespace App\Http\Controllers\Superadmin\Claims;

use App\Http\Controllers\Controller;
use App\Models\Claimant;
use App\Models\DischargeStatus;
use App\Models\Insurer;
use Illuminate\Http\Request;

class DischargeStatusController extends Controller
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
        $claimant           = Claimant::with('claim')->find($id);
        $discharge_exists   = DischargeStatus::where('claimant_id', $id)->exists();
        $discharge_status   = $discharge_exists ? DischargeStatus::where('claimant_id', $id)->first() : null;
        $insurers           = Insurer::get();

        return view('super-admin.claims.claimants.edit.discharge-status', compact('claimant', 'discharge_status', 'insurers'));
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
        $rules = [
            'hospital_id'            => 'required|max:40',
            'hospital_name'          => 'required|max:255',
            'patient_id'             => 'required|max:40',
            'claim_id'               => 'required|max:40',
            'insurance_coverage'     => 'required',
            'lending_required'       => 'required',
            'date_of_admission'      => 'required',
            'time_of_admission'      => 'required',
            'hospitalization_due_to' => 'required',
            'date_of_delivery'       => 'required',
            'injury_reason'          => ($request->hospitalization_due_to == 'Injury') ? 'required': [],
            'injury_due_to_substance_abuse_alcohol_consumption' => ($request->injury_reason) ? 'required':[],
            'reported_to_police'                 => ($request->injury_due_to_substance_abuse_alcohol_consumption =='Yes') ? 'required' :[],
            'mlc_report_and_police_fir_attached' => ($request->reported_to_police =='Yes') ? 'required' :[],
            'fir_or_mlc_no'                      => ($request->mlc_report_and_police_fir_attached =='Yes') ? 'required|max:27':[],
            'not_reported_to_police_reason'      => ($request->injury_due_to_substance_abuse_alcohol_consumption =='Yes' && $request->reported_to_police =='No') ?'required|max:100' :[],
            'maternity_date_of_delivery'         => ($request->hospitalization_due_to == 'Maternity') ? 'required' : [],
            'maternity_gravida_status_g'         => ($request->hospitalization_due_to == 'Maternity') ? 'required|numeric|max:2' : [],
            'maternity_gravida_status_p'         => ($request->hospitalization_due_to == 'Maternity') ? 'required|numeric|max:2' : [],
            'maternity_gravida_status_l'         => ($request->hospitalization_due_to == 'Maternity') ? 'required|numeric|max:2' : [],
            'maternity_gravida_status_a'         => ($request->hospitalization_due_to == 'Maternity') ? 'required|numeric|max:2' : [],
            'premature_baby'                     => ($request->hospitalization_due_to == 'Maternity') ? 'required' : [],
            'date_of_discharge'                  => 'required',
            'time_of_discharge'                  => 'required',
            'discharge_status'                   => 'required',
            'death_summary'                      => ($request->discharge_status == 'Deceased') ? 'required|alpha_num|max:100':[],
            'discharge_status_comments'          => 'max:250',
            'injury_due_to_substance_abuse_alcohol_consumption_file'=> ($request->injury_due_to_substance_abuse_alcohol_consumption) ? 'required':[],
            'mlc_report_and_police_fir_attached_file'=>($request->mlc_report_and_police_fir_attached) ?'required' :[],
            'death_summary_file'=> ($request->death_summary) ? 'required' :[]
            
        ];

        $messages = [
            'hospital_id.required'            => 'Please enter hospital id',
            'hospital_name.required'          => 'Please enter hospital name',
            'patient_id.required'             => 'Please enter patient id',
            'claim_id.required'               => 'Please enter claim id',
            'insurance_coverage.required'     => 'Please enter insurance coverage',
            'lending_required.required'       => 'Please enter lending required',
            'date_of_admission.required'      => 'Please enter date of admission',
            'time_of_admission.required'      => 'Please enter time of admission',
            'hospitalization_due_to.required' => 'Please enter hospitalization due to',
            'date_of_delivery.required'       => 'Please enter date of delivery',
            'injury_reason.required'          => 'Please enter injury reason',
            'injury_due_to_substance_abuse_alcohol_consumption.required' => 'Please enter al injury due to alcohol',
            'reported_to_police.required'                 => 'Please enter police reported or not',
            'mlc_report_and_police_fir_attached.required' => 'Please enter mlc report ',
            'fir_or_mlc_no.required'                      => 'Please enter mlc number',
            'not_reported_to_police_reason.required'      => 'Please enter police reported',
            'maternity_date_of_delivery.required'         => 'Please enter maternity date of delivery',
            'maternity_gravida_status_g.required'         => 'Please enter maternity gravida status g',
            'maternity_gravida_status_p.required'         => 'Please enter maternity gravida status p',
            'maternity_gravida_status_l.required'         => 'Please enter maternity gravida status l',
            'maternity_gravida_status_a.required'         => 'Please enter maternity gravida status a',
            'premature_baby.required'                     => 'Please enter premature baby',
            'date_of_discharge.required'                  => 'Please enter date of discharge',
            'time_of_discharge.required'                  => 'Please enter time of discharge',
            'discharge_status.required'                   => 'Please enter discharge status',
            'death_summary.required'                      => 'Please enter death summary',
            'injury_due_to_substance_abuse_alcohol_consumption_file.required'=>'Please upload file',
            'death_summary_file.required'=>'Please upload death summary file'
            
        ];

         $this->validate($request, $rules, $messages);
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
