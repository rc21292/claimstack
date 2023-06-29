<?php

namespace App\Imports;

use App\Models\Hospital;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportHospital implements ToModel, WithValidation
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

        $hospital = Hospital::latest()->first();

        return new Hospital([
            'uid' => 'HSP'.(($hospital->id)+1),
            'name' => $row[0],
            'onboarding' => $row[1],
            'by' => $row[2],
            'hospital_by' => $row[3],
            'address' => $row[4],
            'city' => $row[5],
            'state' => $row[6],
            'pincode' => $row[7],
            'firstname' => $row[8],
            'lastname' => $row[9],
            'pan' => $row[10],
            'email' => $row[11],
            'code' => $row[12],
            'landline' => $row[13],
            'phone' => $row[14],
            'rohini' => $row[15],
            'linked_employee_department' => $row[16],
            'linked_associate_partner' => $row[17],
            'linked_associate_partner_id' => $row[18],
            'linked_employee' => $row[19],
            'linked_employee_id' => $row[20],
            'assigned_employee_department' => $row[21],
            'assigned_employee' => $row[22],
            'assigned_employee_id' => $row[23],
            'tan' => $row[24],
            'gst' => $row[25],
            'owner_email' => $row[26],
            'owner_phone' => $row[27],
            'owner_pan' => $row[28],
            'owner_aadhar' => $row[29],
            'contact_person_firstname' => $row[30],
            'contact_person_lastname' => $row[31],
            'contact_person_email' => $row[32],
            'contact_person_phone' => $row[33],
            'registration_no' => $row[34],
            'comments' => $row[35],
            'password' => Hash::make('12345678'),
        ]);
    }

    public function rules(): array
    {
        return [
            '10' => 'unique:hospitals,email',
        ];
    }
}
