<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportAdmin implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::get(['id', 'firstname', 'lastname', 'email', 'employee_code', 'designation', 'department', 'phone', 'linked_employee', 'linked_employee_id', 'kra', 'created_at']);
    }

    public function headings(): array
    {
        return [
            'Id',
            'Firstname',
            'Lastname',
            'Email',
            'Employee Code',
            'Designation',
            'Department',
            'Phone',
            'Linked Employee',
            'Linked Employee Id',
            'Kra',
            'Created At',
        ];
    }
}
