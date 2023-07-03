<?php

namespace App\Exports;

use App\Models\Claim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class SuperAdminClaimReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;

    function __construct($data) {
        $this->data = $data;
    }

    public function collection()
    {
        $claim_array = array();
        $claims = Claim::query();

        $filter_state = $this->data->state;
        $filter_ap_id = $this->data->ap_id;
        $filter_date_from_to = $this->data->date_from_to;

        $claims = Claim::query();

        if($filter_ap_id){
            $claims->where('linked_associate_partner_id', 'like','%' . $filter_ap_id . '%');
        }

        if($filter_state){
            $claims->where('state', 'like','%' . $filter_state . '%');
        }

        if($filter_date_from_to){
            $d = explode('-',$filter_date_from_to);
            $claims->whereDate('created_at', '>=', Carbon::parse($d[0])->format('Y-m-d') );
            $claims->whereDate('created_at','<=', Carbon::parse($d[1])->format('Y-m-d') );
        }

        $claims = $claims->orderBy('id', 'asc')->get();

        foreach ($claims as $key => $claim) {
            $claim_array[$key]['Patient ID'] = $claim->uid;
            $claim_array[$key]['Claim ID'] = $claim->uid;
            $claim_array[$key]['Patient Name'] = $claim->patient->title. ' ' .$claim->patient->firstname. ' ' .$claim->patient->middlename. ' ' .$claim->patient->lastname;
            $claim_array[$key]['Claimant Name'] = @$claim->claimant->title. ' ' .@$claim->claimant->firstname. ' '.@$claim->claimant->middlename.' '.@$claim->claimant->lastname;
            $claim_array[$key]['Borrower Name'] = @$claim->borrower->borrower_title. ' ' .@$claim->borrower->borrower_firstname. ' '.@$claim->borrower->borrower_middlename . ' '.@$claim->borrower->borrower_lastname;
            $claim_array[$key]['Hospital Name'] = $claim->hospital->name;
            $claim_array[$key]['Pre-Assessment Status'] = @$claim->assessmentStatus->pre_assessment_status;
            $claim_array[$key]['Claim Processing Status'] = @$claim->claimProcessing->final_assessment_status ;
            $claim_array[$key]['Final Assessment / Authorization Status'] = @$claim->assessmentStatus->final_assessment_status;
            $claim_array[$key]['IC Claim Status'] = @$claim->icClaimStatus->ic_claim_status;
            $claim_array[$key]['Estimated Amount'] = $claim->estimated_amount;
            $claim_array[$key]['Claimed Ampunt'] = $claim->claimant->estimated_amount;
            $claim_array[$key]['Loan Amount'] = @$claim->lendingStatus->loan_disbursed_amount;
            $claim_array[$key]['Settled Amount'] = $claim->icClaimStatus->settled_amount;
            $claim_array[$key]['Date of Disbursement (By IC)'] = @$claim->icClaimStatus->date_disbursement;
            $claim_array[$key]['DOA'] = $claim->admission_date;
            $claim_array[$key]['DOD'] = $claim->discharge_date;
            $claim_array[$key]['Policy No.'] = @$claim->policy->policy_no;
            $claim_array[$key]['Insurance Co.'] = @$claim->policy->insurer->name;
            $claim_array[$key]['TPA Name'] = @$claim->policy->tpa_name;
            $claim_array[$key]['Policy Type'] = @$claim->policy->policy_type;
            $claim_array[$key]['Disease Category'] = $claim->disease_category;
            $claim_array[$key]['Disease Name'] = $claim->disease_name;
            $claim_array[$key]['Disease Type'] = $claim->disease_type;
            $claim_array[$key]['Claimant ID'] =  @$claim->claimant->uid;
            $claim_array[$key]['Borrower ID'] = @$claim->borrower->uid;
            $claim_array[$key]['Hospital ID'] = @$claim->hospital->uid;
            $claim_array[$key]['Hospital Address'] = @$claim->hospital->address;
            $claim_array[$key]['Hospital City'] = @$claim->hospital->city;
            $claim_array[$key]['Hospital State'] = @$claim->hospital->state;
            $claim_array[$key]['Hospital PIN'] = @$claim->hospital->pincode;
        }

        return collect($claim_array);}

    public function headings(): array
    {
        return [
            'Patient ID',
            'Claim ID',
            'Patient Name',
            'Claimant Name',
            'Borrower Name',
            'Hospital Name',
            'Pre-Assessment Status',
            'Claim Processing Status',
            'Final Assessment / Authorization Status',
            'IC Claim Status',
            'Estimated Amount',
            'Claimed Ampunt',
            'Loan Amount',
            'Settled Amount',
            'Date of Disbursement (By IC)',
            'DOA',
            'DOD',
            'Policy No.',
            'Insurance Co.',
            'TPA Name',
            'Policy Type',
            'Disease Category',
            'Disease Name',
            'Disease Type',
            'Claimant ID',
            'Borrower ID',
            'Hospital ID',
            'Hospital Address',
            'Hospital City',
            'Hospital State',
            'Hospital PIN',
        ];
    }
}
