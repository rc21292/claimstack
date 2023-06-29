<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExportAdmin implements FromCollection, WithHeadings
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
        if ($this->type == 'admin') {

            $user_id = auth()->user()->id;
            $admins =  Admin::where(function ($query) {
                $query->where('linked_employee', auth()->user()->id);
            })->select('id', 'firstname', 'lastname', 'email', 'employee_code', 'designation', 'department', 'phone', 'linked_employee', 'linked_employee_id', 'kra', DB::raw("DATE_FORMAT(admins.created_at, '%d-%m-%Y %H:%i:%s')"))->get();


        }else{
            $admins =  Admin::latest('id')->select('id', 'firstname', 'lastname', 'email', 'employee_code', 'designation', 'department', 'phone', 'linked_employee', 'linked_employee_id', 'kra', DB::raw("DATE_FORMAT(admins.created_at, '%d-%m-%Y %H:%i:%s')"))->get();
        }

        foreach ($admins as $key => $admin) {
            $admins[$key]->linked_employee = Admin::where('id', $admin->linked_employee)->value('firstname').' '.Admin::where('id', $admin->linked_employee)->value('lastname');
        }

        return $admins;

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
