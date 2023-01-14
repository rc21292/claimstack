<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] == 'Firstname') {
            return;
        }
        return new User([
            'firstname' => $row[0],
            'lastname' => $row[1],
            'email' => $row[2],
            'employee_code' => $row[3],
            'designation' => $row[4],
            'department' => $row[5],
            'phone' => $row[6],
            'password' => $row[7],
            'linked_employee' => $row[8],
            'linked_employee_id' => $row[9],
            'kra' => $row[10]
        ]);
    }
}
