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
            $claim_array[$key]['Patient Name'] = $claim->uid;
            $claim_array[$key]['Claimant Name'] = $claim->uid;
            $claim_array[$key]['Borrower Name'] = $claim->uid;
            $claim_array[$key]['Hospital Name'] = $claim->uid;
            $claim_array[$key]['Pre-Assessment Status'] = $claim->uid;
            $claim_array[$key]['Claim Processing Status'] = $claim->uid;
            $claim_array[$key]['Final Assessment / Authorization Status'] = $claim->uid;
            $claim_array[$key]['IC Claim Status'] = $claim->uid;
            $claim_array[$key]['Estimated Amount'] = $claim->uid;
            $claim_array[$key]['Claimed Ampunt'] = $claim->uid;
            $claim_array[$key]['Loan Amount'] = $claim->uid;
            $claim_array[$key]['Settled Amount'] = $claim->name;
            $claim_array[$key]['Date of Disbursement (By IC)'] = Carbon::parse($claim->created_at)->format('d-m-Y');
            $claim_array[$key]['DOA'] = $claim->onboarding;
            $claim_array[$key]['DOD'] = $claim->address;
            $claim_array[$key]['Policy No.'] = $claim->city;
            $claim_array[$key]['Insurance Co.'] = $claim->state;
            $claim_array[$key]['TPA Name'] = $claim->pincode;
            $claim_array[$key]['Policy Type'] = $claim->claim_by;
            $claim_array[$key]['Disease Category'] = (@$claim->associate->status == 'Main') ? @$claim->associate->name  : '' ;
            $claim_array[$key]['Disease Name'] = (@$claim->associate->status == 'Sub AP') ? @$claim->associate->name  : '';
            $claim_array[$key]['Disease Type'] = (@$claim->associate->status == 'Agency') ? @$claim->associate->name  : '';
            $claim_array[$key]['Claimant ID'] =  '' ;
            $claim_array[$key]['Borrower ID'] = @$claim->tieup->auto_adjudication;
            $claim_array[$key]['Hospital ID'] = @$claim->tieup->claims_reimbursement_insured_services;
            $claim_array[$key]['Hospital Address'] = @$claim->tieup->cashless_claims_management_services;
            $claim_array[$key]['Hospital City'] = @$claim->tieup->lending_finance_company_agreement;
            $claim_array[$key]['Hospital State'] = '--';
            $claim_array[$key]['Hospital PIN'] = @$claim->tieup->medical_lending_for_patients;
            $claim_array[$key]['Key Points '] = @$claim->tieup->medical_lending_for_bill_invoice_discounting;
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
            'Key Points ',
        ];
    }
}
