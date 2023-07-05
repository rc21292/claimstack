<?php

namespace App\Exports;

use App\Models\Hospital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class SuperAdminHospitalOnboardingExport implements FromCollection, WithHeadings, ShouldAutoSize
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

        $hospital_array = array();
        $hospitals = Hospital::query();

        $filter_state = $this->data->state;
        $filter_ap_id = $this->data->ap_name;
        $filter_date_from_to = $this->data->date_from_to;

        $hospitals = Hospital::query();

        if($filter_ap_id){
            $hospitals->where('linked_associate_partner_id', 'like','%' . $filter_ap_id . '%');
        }

        if($filter_state){
            $hospitals->where('state', 'like','%' . $filter_state . '%');
        }

        if($filter_date_from_to){
            $d = explode('-',$filter_date_from_to);
            $hospitals->whereDate('created_at', '>=', Carbon::parse($d[0])->format('Y-m-d') );
            $hospitals->whereDate('created_at','<=', Carbon::parse($d[1])->format('Y-m-d') );
        }

        $hospitals = $hospitals->orderBy('name', 'asc')->get();

        foreach ($hospitals as $key => $hospital) {

            $nbfc = @$hospital->tieup->nbfc1->name;

            if (isset($hospital->tieup->nbfc_2)) {
               $nbfc .= ', '.@$hospital->tieup->nbfc2->name;
            }

            if (isset($hospital->tieup->nbfc_3)) {
               $nbfc .= ', '.@$hospital->tieup->nbfc3->name;
            }

            if ((isset($hospital->tieup->agreed_for)) && ($hospital->tieup->agreed_for == 'ClaimStack2.O' || $hospital->tieup->agreed_for == 'Both')) {
                $agreed_for = 'Yes';
            }else if((isset($hospital->tieup->agreed_for)) && ($hospital->tieup->agreed_for == 'Claims Servicing')){
                $agreed_for = 'No';
            }else{
                $agreed_for = '';
            }

            $hospital_array[$key]['hospital_uid'] = $hospital->uid;
            $hospital_array[$key]['hospital_name'] = $hospital->name;
            $hospital_array[$key]['Date of Onboarding'] = Carbon::parse($hospital->created_at)->format('m-d-Y');
            $hospital_array[$key]['Onboarding Status'] = $hospital->onboarding;
            $hospital_array[$key]['Hospital Address'] = $hospital->address;
            $hospital_array[$key]['Hospital City'] = $hospital->city;
            $hospital_array[$key]['Hospital State'] = $hospital->state;
            $hospital_array[$key]['Hospital PIN'] = $hospital->pincode;
            $hospital_array[$key]['Hospital By'] = $hospital->by;
            $hospital_array[$key]['AP Name'] = (@$hospital->associate->status == 'Main') ? @$hospital->associate->name  : '' ;
            $hospital_array[$key]['Sub AP Name'] = (@$hospital->associate->status == 'Sub AP') ? @$hospital->associate->name  : '';
            $hospital_array[$key]['Agency Name'] = (@$hospital->associate->status == 'Agency') ? @$hospital->associate->name  : '';
            $hospital_array[$key]['Claim Stack 2.0 Installed'] =  @$agreed_for;
            $hospital_array[$key]['Auto Adjudication Installed'] = @$hospital->tieup->auto_adjudication;
            $hospital_array[$key]['Claims Reimbursement - Insured Services'] = @$hospital->tieup->claims_reimbursement_insured_services;
            $hospital_array[$key]['Cashless Claims Management Services'] = @$hospital->tieup->cashless_claims_management_services;
            $hospital_array[$key]['Finance Company Agreement'] = @$hospital->tieup->lending_finance_company_agreement;
            $hospital_array[$key]['Name of the Finance Company'] = @$nbfc;
            $hospital_array[$key]['Medical Lending for Patients'] = @$hospital->tieup->medical_lending_for_patients;
            $hospital_array[$key]['Medical Lending for Bill/ Invoice Discounting'] = @$hospital->tieup->medical_lending_for_bill_invoice_discounting;
        }

        return collect($hospital_array);
    }   

    public function headings(): array
    {
        return [
            'Hospital UID',
            'Hospital Name',
            'Date of Onboarding ',
            'Onboarding Status',
            'Hospital Address',
            'Hospital City',
            'Hospital State',
            'Hospital PIN',
            'Hospital By',
            'AP Name',
            'Sub AP Name',
            'Agency Name',
            'Claim Stack 2.0 Installed',
            'Auto Adjudication Installed',
            'Claims Reimbursement - Insured Services',
            'Cashless Claims Management Services',
            'Finance Company Agreement',
            'Name of the Finance Company',
            'Medical Lending for Patients',
            'Medical Lending for Bill/ Invoice Discounting',
        ];
    }
}

