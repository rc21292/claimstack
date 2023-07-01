<?php

namespace App\Exports;

use App\Models\Hospital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

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
        $filter_search = $this->data->search;
        $hospitals = Hospital::query();
        if($filter_search){
            $hospitals->where('name', 'like','%' . $filter_search . '%');
        }
        $hospitals = $hospitals->orderBy('name', 'asc')->get();

        foreach ($hospitals as $key => $hospital) {
            $hospital_array[$key]['hospital_uid'] = $hospital->uid;
            $hospital_array[$key]['hospital_name'] = $hospital->name;
            $hospital_array[$key]['Date of Onboarding'] = $hospital->onboarding;
            $hospital_array[$key]['Onboarding Status'] = $hospital->status;
            $hospital_array[$key]['Hospital Address'] = $hospital->address;
            $hospital_array[$key]['Hospital City'] = $hospital->city;
            $hospital_array[$key]['Hospital State'] = $hospital->state;
            $hospital_array[$key]['Hospital PIN'] = $hospital->pincode;
            $hospital_array[$key]['Hospital By'] = $hospital->hospital_by;
            $hospital_array[$key]['AP Name'] = (@$hospital->associate->status == 'Main') ? @$hospital->associate->name  : '' ;
            $hospital_array[$key]['Sub AP Name'] = (@$hospital->associate->status == 'Sub AP') ? @$hospital->associate->name  : '';
            $hospital_array[$key]['Agency Name'] = (@$hospital->associate->status == 'Agency') ? @$hospital->associate->name  : '';
            $hospital_array[$key]['Claim Stack 2.0 Installed'] = '--';
            $hospital_array[$key]['Auto Adjudication Installed'] = '--';
            $hospital_array[$key]['Claims Reimbursement - Insured Services'] = $hospital->tieup->claims_reimbursement_insured_services;
            $hospital_array[$key]['Cashless Claims Management Services'] = $hospital->tieup->cashless_claims_management_services;
            $hospital_array[$key]['Finance Company Agreement'] = $hospital->tieup->lending_finance_company_agreement;
            $hospital_array[$key]['Name of the Finance Company'] = '--';
            $hospital_array[$key]['Medical Lending for Patients'] = $hospital->tieup->medical_lending_for_patients;
            $hospital_array[$key]['Medical Lending for Bill/ Invoice Discounting'] = $hospital->tieup->medical_lending_for_bill_invoice_discounting;
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

