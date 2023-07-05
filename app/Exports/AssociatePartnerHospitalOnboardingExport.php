<?php

namespace App\Exports;

use App\Models\Hospital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class AssociatePartnerHospitalOnboardingExport implements FromCollection, WithHeadings, ShouldAutoSize
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
        $filter_search = $this->data->search;
        $hospitals = Hospital::query();
        if($filter_search){
            $hospitals->where('name', 'like','%' . $filter_search . '%');
        }

        $user_id = auth()->user()->associate_partner_id;

        $hospitals = $hospitals
        ->where('linked_associate_partner_id', auth()->user()->associate_partner_id)
        ->orWhereHas('associate', function($q) use ($user_id)
        {
            $q->where('linked_associate_partner_id', $user_id)
            ->orWhereHas('associate', function($q) use ($user_id)
            {
                $q->where('linked_associate_partner_id', $user_id)
                ->orWhereHas('associate', function($q) use ($user_id)
                {
                        $q->where('linked_associate_partner_id', $user_id);
                });
            });
        })->orderBy('name', 'asc')->paginate(20);

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
            $hospital_array[$key]['Claim Stack 2.0 Installed'] =  @$hospital->tieup->agreed_for == 'ClaimStack2.O' || @$hospital->tieup->agreed_for == 'Both' ? 'Yes' :  @$hospital->tieup->agreed_for;
            $hospital_array[$key]['Auto Adjudication Installed'] = $hospital->tieup->auto_adjudication;
            $hospital_array[$key]['Claims Reimbursement - Insured Services'] = $hospital->tieup->claims_reimbursement_insured_services;
            $hospital_array[$key]['Cashless Claims Management Services'] = $hospital->tieup->cashless_claims_management_services;
            $hospital_array[$key]['Finance Company Agreement'] = $hospital->tieup->lending_finance_company_agreement;
            $hospital_array[$key]['Name of the Finance Company'] = @$nbfc;
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

