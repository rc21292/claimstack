<?php

namespace App\Exports;

use App\Models\Hospital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use  Illuminate\Support\Carbon;

class AdminHospitalOnboardingExport implements FromCollection, WithHeadings, ShouldAutoSize
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

        $filter_state = $this->data->state;
        $filter_ap_id = $this->data->ap_name;
        $filter_date_from_to = $this->data->date_from_to;

        $user_id = auth()->user()->id;


        /*$hospitals = Hospital::where(function ($q) use($user_id) {
            return $q->where('linked_employee', $user_id)->orWhere('assigned_employee', $user_id);
        })
        ->when($filter_state != null, function ($q) use($filter_state) {
                return $q->where('state', 'like',"%$filter_state%");
        })
        ->when($filter_date_from_to != null, function ($q) use($filter_date_from_to) {
                $d = explode('-',$filter_date_from_to);
                $date_from = Carbon::parse($d[0])->format('Y-m-d');
                $date_to = Carbon::parse($d[1])->format('Y-m-d');
                return $q->whereDate('created_at', '>=', $date_from)->whereDate('created_at','<=', $date_to);
        })
        ->when($filter_ap_id != null, function ($q) use($filter_ap_id) {
                return $q->where('linked_associate_partner_id', $filter_ap_id);
        })
        ->with(['assignedEmployeeData' => function ($q) use ($user_id) {
            return $q->where('linked_employee', $user_id);
        }])
        ->with(['linkedEmployeeData' =>  function ($q) use ($user_id) {
            return $q->where('linked_employee', $user_id);
        }])
        ->orderBy('name', 'asc')->paginate(20);*/
        
        // $hospitals = Hospital::query();
       

        /*$hospitals = Hospital::query();
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

        $user_id = auth()->user()->id;
        $hospitals =  $hospitals->
        where(function ($query) {
            $query->where('linked_employee', auth()->user()->id)->orWhere('assigned_employee', auth()->user()->id);
        })->orWhereHas('assignedEmployeeData',  function ($q) use ($user_id) {
            $q->where('linked_employee', $user_id);
        })->orWhereHas('linkedEmployeeData',  function ($q) use ($user_id) {
            $q->where('linked_employee', $user_id);
        })->orderBy('name', 'asc')->get();*/


/*
        $hospitals = Hospital::query();

        $user_id = auth()->user()->id; 

        if($filter_state){
            $hospitals->where('state', 'like','%' . $filter_state . '%');
        }else if($filter_date_from_to){
            $d = explode('-',$filter_date_from_to);
            $hospitals->whereDate('created_at', '>=', Carbon::parse($d[0])->format('Y-m-d') );
            $hospitals->whereDate('created_at','<=', Carbon::parse($d[1])->format('Y-m-d') );
        }else if($filter_ap_id){
            $hospitals->where('linked_associate_partner_id', $filter_ap_id);
        }else{             

            $hospitals =  $hospitals->
            where(function ($query) {
                $query->where('linked_employee', auth()->user()->id)->orWhere('assigned_employee', auth()->user()->id);
            })->orWhereHas('assignedEmployeeData',  function ($q) use ($user_id) {
                $q->where('linked_employee', $user_id);
            })->orWhereHas('linkedEmployeeData',  function ($q) use ($user_id) {
                $q->where('linked_employee', $user_id);
            });
        }

        $hospitals = $hospitals->orderBy('name', 'asc')->paginate(20);*/

        $hospitals = Hospital::where(function (Builder $q) use($user_id, $filter_state, $filter_date_from_to, $filter_ap_id) {
            return $q->when($filter_state != null, function ($q) use($filter_state) {
                return $q->where('state', 'like',"%$filter_state%");
            })
            ->when($filter_date_from_to != null, function ($q) use($filter_date_from_to) {
                $d = explode('-',$filter_date_from_to);
                $date_from = Carbon::parse($d[0])->format('Y-m-d');
                $date_to = Carbon::parse($d[1])->format('Y-m-d');
                return $q->whereDate('created_at', '>=', $date_from)->whereDate('created_at','<=', $date_to);
            })
            ->when($filter_ap_id != null, function ($q) use($filter_ap_id) {
                return $q->where('linked_associate_partner_id', $filter_ap_id);
            });
        })
        ->with('assignedEmployeeData')
        ->with('linkedEmployeeData')
        ->where(function(Builder $q1) use($user_id){
            return $q1->where('linked_employee', $user_id)->orWhere('assigned_employee', $user_id)
            ->orWhereHas('assignedEmployeeData', function (Builder $q2) use ($user_id) {
                return $q2->where('linked_employee', $user_id);
            })
            ->orWhereHas('linkedEmployeeData', function (Builder $q3) use ($user_id) {
                return $q3->where('linked_employee', $user_id);
            });
        })
        ->orderBy('name', 'asc')->paginate(20); 
        
    
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
                $agreed_for = 'No';
            }

            if(isset($hospital->associate) && $hospital->associate->status == 'Main'){
                $main_ap = $hospital->associate->name;
                $sub_ap = '';
                $agency = '';
            }else if(isset($hospital->associate) && $hospital->associate->status == 'Sub AP'){
                $main_ap = $hospital->associate->associate->name;
                $sub_ap = $hospital->associate->name;
                $agency = '';
            }else if( isset($hospital->associate) && $hospital->associate->status == 'Agency'){

                if($hospital->associate->associate->status == 'Main'){
                    $main_ap = $hospital->associate->associate->name;
                    $sub_ap = '';
                    $agency = $hospital->associate->name;
                }else if($hospital->associate->associate->status == 'Sub AP'){
                    $main_ap = isset($hospital->associate->associate->associate) ? $hospital->associate->associate->associate->name : '';
                    $sub_ap = $hospital->associate->associate->name;
                    $agency = $hospital->associate->name;
                }else{
                    $main_ap = isset($hospital->associate->associate->associate) ? $hospital->associate->associate->associate->name : '';
                    $sub_ap = $hospital->associate->associate->name;
                    $agency = $hospital->associate->name;
                }
            }else{
                $main_ap = '';
                $sub_ap = '';
                $agency = '';
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
            $hospital_array[$key]['AP Name'] = @$main_ap;
            $hospital_array[$key]['Sub AP Name'] = @$sub_ap;
            $hospital_array[$key]['Agency Name'] = @$agency;
            $hospital_array[$key]['Claim Stack 2.0 Installed'] = @$agreed_for;
            $hospital_array[$key]['Auto Adjudication Installed'] = @$hospital->tieup->auto_adjudication ?? 'No';
            $hospital_array[$key]['Claims Reimbursement - Insured Services'] = @$hospital->tieup->claims_reimbursement_insured_services ?? 'No';
            $hospital_array[$key]['Cashless Claims Management Services'] = @$hospital->tieup->cashless_claims_management_services ?? 'No';
            $hospital_array[$key]['Finance Company Agreement'] = @$hospital->tieup->lending_finance_company_agreement ?? 'No';
            $hospital_array[$key]['Name of the Finance Company'] = @$nbfc;
            $hospital_array[$key]['Medical Lending for Patients'] = @$hospital->tieup->medical_lending_for_patients ?? 'No';
            $hospital_array[$key]['Medical Lending for Bill/ Invoice Discounting'] = @$hospital->tieup->medical_lending_for_bill_invoice_discounting ?? 'No';
            $hospital_array[$key]['Hospital Linked Employee'] = @$hospital->linkedEmployeeData->firstname.' '.@$hospital->linkedEmployeeData->lastname;
            $hospital_array[$key]['Hospital Assigned Employee'] = @$hospital->assignedEmployeeData->firstname.' '.@$hospital->assignedEmployeeData->lastname;
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
            'Hospital Linked Employee',
            'Hospital Assigned Employee'
        ];
    }
}

