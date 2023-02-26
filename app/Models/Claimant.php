<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Claim;

class Claimant extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'claim_id',
        'associate_partner_id',
        'hospital_id',
        'patient_title',
        'patient_firstname',
        'patient_middlename',
        'patient_lastname',
        'patient_id_proof',
        'patient_id_proof_file',
        'are_patient_and_claimant_same',
        'title',
        'firstname',
        'middlename',
        'lastname',
        'pan_no',
        'pan_no_file',
        'aadhar_no',
        'aadhar_no_file',
        'patients_relation_with_claimant',
        'specify',
        'address',
        'city',
        'state',
        'pincode',
        'personal_email_id',
        'official_email_id',
        'mobile_no',
        'estimated_amount',
        'cancel_cheque',
        'cancel_cheque_file',
        'bank_name',
        'bank_address',
        'ac_no',
        'ifs_code',
        'comments',
    ];

    public function claim()
    {
        return $this->belongsTo(claim::class, 'claim_id', 'uid');
    }
}
