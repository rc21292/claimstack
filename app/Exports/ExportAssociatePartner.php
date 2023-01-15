<?php

namespace App\Exports;

use App\Models\AssociatePartner;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportAssociatePartner implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AssociatePartner::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'firstname',
            'lastname',
            'associate_partner_id',
            'type',
            'pan',
            'panfile',
            'owner',
            'email',
            'address',
            'city',
            'state',
            'pincode',
            'password',
            'phone',
            'reference',
            'status',
            'linked_associate_partner',
            'linked_associate_partner_id',
            'assigned_employee',
            'assigned_employee_id',
            'linked_employee',
            'linked_employee_id',
            'mou',
            'moufile',
            'agreement_start_date',
            'agreementfile',
            'agreement_end_date',
            'contact_person',
            'contact_person_phone',
            'contact_person_email',
            'comments',
            'Created At',
            'Updated At'
        ];
    }
}
