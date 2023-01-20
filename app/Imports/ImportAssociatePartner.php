<?php

namespace App\Imports;

use App\Models\AssociatePartner;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ImportAssociatePartner implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ($row[0] == 'Name') {
            return;
        }


        return new AssociatePartner([
            'name' => $row[0],
            'type' => $row[1],
            'pan' => $row[2],
            'associate_partner_id' => 'AP' . substr($row[2], 0, 2) . substr($row[2], -3),
            'owner' => $row[3],
            'email' => $row[4],
            'address' => $row[5],
            'city' => $row[6],
            'state' => $row[7],
            'pincode' => $row[8],
            'password' => Hash::make('12345678'),
            'phone' => $row[9],
            'reference' => $row[10],
            'status' => $row[11],
            'linked_associate_partner' => $row[12],
            'linked_associate_partner_id' => $row[13],
            'assigned_employee_department' => $row[14],
            'assigned_employee' => $row[15],
            'assigned_employee_id' => $row[16],
            'linked_employee_department' => $row[17],
            'linked_employee' => $row[18],
            'linked_employee_id' => $row[19],
            'mou' => $row[20],
            'agreement_start_date' => $row[21],
            'agreement_end_date' => $row[22],
            'contact_person' => $row[23],
            'contact_person_phone' => $row[24],
            'contact_person_email' => $row[25],
            'bank_name' => $row[26],
            'bank_address' => $row[27],
            'bank_account_no' => $row[28],
            'bank_ifs_code' => $row[29],
            'cancel_cheque' => $row[30],
            'comments' => $row[31],
        ]);
    }
}
