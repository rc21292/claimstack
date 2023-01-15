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
        return Admin::all();
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
