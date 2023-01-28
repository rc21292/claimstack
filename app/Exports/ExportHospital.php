<?php

namespace App\Exports;

use App\Models\Hospital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportHospital implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Hospital::get([
            'id',
            'uid',
            'name',
            'onboarding',
            'by',
            'address',
            'city',
            'state',
            'pincode',
            'firstname',
            'lastname',
            'pan',
            'email',
            'landline',
            'phone',
            'rohini',
            'linked_associate_partner',
            'linked_associate_partner_id',
            'assigned_employee',
            'assigned_employee_id',
            'linked_employee',
            'linked_employee_id',
            'comments',
            'created_at',
        ]);
    }

    public function headings(): array
    {
        return [
            'Id',
            'Uid',
            'Name',
            'Onboarding',
            'By',
            'Address',
            'City',
            'State',
            'Pincode',
            'Firstname',
            'Lastname',
            'Pan',
            'Email',
            'Landline',
            'Phone',
            'Rohini',
            'Linked Associate Partner',
            'Linked Associate Partner Id',
            'Assigned Employee',
            'Assigned Employee Id',
            'Linked Employee',
            'Linked Employee Id',
            'Comments',
            'Created At',
        ];
    }
}
