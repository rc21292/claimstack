<?php

namespace App\Exports;
use DB;
use App\Models\Hospital;
use App\Models\AssociatePartner;
use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportHospital implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */


    protected $type;

    function __construct($type = '') {
        $this->type = $type;
    }


    public function collection()
    {
        if ($this->type == 'associate') {

            $user_id = auth()->user()->associate_partner_id;
            $admins = Hospital::where('linked_associate_partner_id', auth()->user()->associate_partner_id)
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
            })->orderBy('id', 'desc')->select('id','uid', 'name', 'onboarding', 'by', 'hospital_by', 'hms_hospital_id', 'address', 'city', 'state', 'pincode', 'firstname', 'lastname', 'pan', 'email',  'code', 'landline', 'phone', 'rohini', 'linked_employee_department', 'linked_associate_partner', 'linked_associate_partner_id', 'assigned_employee_department', 'assigned_employee', 'assigned_employee_id', 'linked_employee', 'linked_employee_id', 'tan', 'gst', 'owner_email', 'owner_phone', 'owner_pan', 'owner_aadhar', 'contact_person_firstname', 'contact_person_lastname', 'contact_person_email', 'contact_person_phone', 'registration_no', 'medical_superintendent_firstname', 'medical_superintendent_lastname', 'medical_superintendent_email', 'medical_superintendent_registration_no', 'medical_superintendent_qualification', 'medical_superintendent_mobile', 'pollution_clearance_certificate', 'fire_safety_clearance_certificate', 'certificate_of_incorporation', 'bank_name', 'bank_account_no', 'bank_ifs_code', 'cancel_cheque', 'tariff_list_soc', 'nabh_registration_no', 'nabl_registration_no', 'signed_mous', 'other_documents', 'hrms_software', 'iso_status', 'comments' ,DB::raw("DATE_FORMAT(hospitals.created_at, '%d-%m-%Y %H:%i:%s')"))->get();
        }else{
            $admins = Hospital::latest('id')->select('id','uid', 'name', 'onboarding', 'by', 'hospital_by', 'hms_hospital_id', 'address', 'city', 'state', 'pincode', 'firstname', 'lastname', 'pan', 'email',  'code', 'landline', 'phone', 'rohini', 'linked_employee_department', 'linked_associate_partner', 'linked_associate_partner_id', 'assigned_employee_department', 'assigned_employee', 'assigned_employee_id', 'linked_employee', 'linked_employee_id', 'tan', 'gst', 'owner_email', 'owner_phone', 'owner_pan', 'owner_aadhar', 'contact_person_firstname', 'contact_person_lastname', 'contact_person_email', 'contact_person_phone', 'registration_no', 'medical_superintendent_firstname', 'medical_superintendent_lastname', 'medical_superintendent_email', 'medical_superintendent_registration_no', 'medical_superintendent_qualification', 'medical_superintendent_mobile', 'pollution_clearance_certificate', 'fire_safety_clearance_certificate', 'certificate_of_incorporation', 'bank_name', 'bank_account_no', 'bank_ifs_code', 'cancel_cheque', 'tariff_list_soc', 'nabh_registration_no', 'nabl_registration_no', 'signed_mous', 'other_documents', 'hrms_software', 'iso_status', 'comments' ,DB::raw("DATE_FORMAT(hospitals.created_at, '%d-%m-%Y %H:%i:%s')"))->get();
        }

        foreach ($admins as $key => $admin) {
            if($admin->assigned_employee){
                $admins[$key]->assigned_employee = Admin::where('id', $admin->assigned_employee)->value('firstname').' '.Admin::where('id', $admin->assigned_employee)->value('lastname');
            }
            if($admin->linked_associate_partner){
                      
                $admins[$key]->linked_associate_partner = AssociatePartner::where('associate_partner_id', $admin->linked_associate_partner_id)->value('name');
            }
            if($admin->linked_employee){
                $admins[$key]->linked_employee = Admin::where('id', $admin->linked_employee)->value('firstname').' '.Admin::where('id', $admin->linked_employee)->value('lastname');
            }
        }              
                    
        return $admins;
    }

    public function headings(): array
    {
        return [
           'Id',
           'Uid',
           'Name',
           'Onboarding',
           'By',
           'Hospital By',
           'Hms Hospital Id',
           'Address',
           'City',
           'State',
           'Pincode',
           'Firstname',
           'Lastname',
           'Pan',
           'Email',
           'Code',
           'Landline',
           'Phone',
           'Rohini',
           'Linked Employee Department',
           'Linked Associate Partner',
           'Linked Associate Partner Id',
           'Assigned Employee Department',
           'Assigned Employee',
           'Assigned Employee Id',
           'Linked Employee',
           'Linked Employee Id',
           'Tan',
           'Gst',
           'Owner Email',
           'Owner Phone',
           'Owner Pan',
           'Owner Aadhar',
           'Contact Person Firstname',
           'Contact Person Lastname',
           'Contact Person Email',
           'Contact Person Phone',
           'Registration No',
           'Medical Superintendent Firstname',
           'Medical Superintendent Lastname',
           'Medical Superintendent Email',
           'Medical Superintendent Registration No',
           'Medical Superintendent Qualification',
           'Medical Superintendent Mobile',
           'Pollution Clearance Certificate',
           'Fire Safety Clearance Certificate',
           'Certificate Of Incorporation',
           'Bank Name',
           'Bank Account No',
           'Bank Ifs Code',
           'Cancel Cheque',
           'Tariff List Soc',
           'Nabh Registration No',
           'Nabl Registration No',
           'Signed Mous',
           'Other Documents',
           'Hrms Software',
           'Iso Status',
           'Comments',
           'Created At'
       ];
    }
}
