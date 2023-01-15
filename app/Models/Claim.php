<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'patient_id',
        'patient_dob',
        'Male',
        'patient_address',
        'patient_city',
        'patient_state',
        'patient_pincode',
        'patient_id_proof',
        'patient_id_proof_file',
        'hospital_id',
        'hospital_name',
        'hospital_address',
        'hospital_city',
        'hospital_state',
        'hospital_pincode',
        'associate_partner_id',
        'patient_email',
        'patient_mobile',
        'Direct',
        'patient_comments',
        'probable_date_of_admission',
        'probable_date_of_discharge',
        'patient_referred_by',
        'lending_required',
        'treatment_type',
        'admission_type',
        'claim_category',
        'treatment_category',
        'disease_category',
        'disease_type',
        'disease_name',
        'claim_intimation_comments',
    ];
}
