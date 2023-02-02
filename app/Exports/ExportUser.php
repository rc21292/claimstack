<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::latest('id')->get(['id', 'firstname', 'lastname', 'email', 'uid', 'employee_code', 'designation', 'department', 'phone', 'linked_employee', 'linked_employee_id', 'kra', 'created_at']);
    }

    public function headings(): array
    {     

        return [
            'Id',
            'Firstname',
            'Lastname',
            'Email',
            'U Id',
            'Employee Code',
            'Designation',
            'Department',
            'Phone',
            'Linked Employee',
            'Linked Employee Id',
            'Kra',
            'Created At'
        ];
    }
}
