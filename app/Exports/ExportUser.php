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
        return User::all();
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
            'Password',
            'Linked Employee',
            'Linked Employee Id',
            'Kra',
            'Created At',
            'Updated At'
        ];
    }
}
