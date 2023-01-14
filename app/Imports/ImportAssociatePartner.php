<?php

namespace App\Imports;

use App\Models\AssociatePartner;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAssociatePartner implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AssociatePartner([
            'firstname' => $row[0],
            'lastname' => $row[1],
            'associate_partner_id' => $row[2],
            'type' => $row[3],
            'pan' => $row[4],
            'panfile' => $row[5],
            'owner' => $row[6],
            'email' => $row[7],
            'address' => $row[8],
            'city' => $row[9],
            'state' => $row[10],
            'pincode' => $row[11],
            'password' => $row[12],
            'phone' => $row[13],
            'reference' => $row[14],
            'status' => $row[15],
            'linked_associate_partner' => $row[16],
            'linked_associate_partner_id' => $row[17],
            'assigned_employee' => $row[18],
            'assigned_employee_id' => $row[19],
            'linked_employee' => $row[20],
            'linked_employee_id' => $row[21],
            'mou' => $row[22],
            'moufile' => $row[23],
            'agreement_start_date' => $row[24],
            'agreementfile' => $row[25],
            'agreement_end_date' => $row[26],
            'contact_person' => $row[27],
            'contact_person_phone' => $row[28],
            'contact_person_email' => $row[29],
            'comments' => $row[30],
        ]);
    }
}
