<?php

namespace App\Exports;

use App\Models\Claim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class AdminClaimReportExport implements FromCollection, WithHeadings, ShouldAutoSize
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
        $filter_hospital = $this->data->filter_hospital;
        $filter_date_from_to = $this->data->date_from_to;

        if($filter_hospital){
            $claims->where('hospital_id', 'like','%' . $filter_hospital . '%');
        }

        if($filter_state){

            $claims->whereHas('hospital',  function ($q) use ($filter_state) {
                $q->where('state', 'like','%' . $filter_state . '%');
            });
        }

        if($filter_date_from_to){
            $d = explode('-',$filter_date_from_to);
            $claims->whereDate('created_at', '>=', Carbon::parse($d[0])->format('Y-m-d') );
            $claims->whereDate('created_at','<=', Carbon::parse($d[1])->format('Y-m-d') );
        }
        
        $user_id = auth('admin')->user()->id;

        $claims = $claims->whereHas('hospital', function ($q) use ($user_id) {
            $q->where('linked_employee', auth('admin')->user()->id)->orWhere('assigned_employee', auth('admin')->user()->id);
            $q->orWhereHas('assignedEmployeeData', function ($q) use ($user_id) {
                $q->where('linked_employee', $user_id);
            })->orWhereHas('linkedEmployeeData', function ($q) use ($user_id) {
                $q->where('linked_employee', $user_id);
            });
        })->orderBy('id', 'desc')->paginate(20);

        foreach ($claims as $key => $claim) {
            $claim_array[$key]['Patient ID'] = $claim->patient->uid;
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
            $claim_array[$key]['Loan Amount'] = @$claim->lendingStatusData->loan_disbursed_amount;
            $claim_array[$key]['Settled Amount'] = @$claim->icClaimStatus->settled_amount;
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

        return collect($claim_array);
    }

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
            'Key Points ',
        ];
    }
}
