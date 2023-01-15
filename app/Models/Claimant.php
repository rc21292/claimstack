<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claimant extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id'
        'claim_id',
        'patient_firstname',
        'patient_lastname',
        'claimant_firstname',
        'claimant_lastname',
        'patient_or_claimant_pan',
        'patient_or_claimant_pan_file',
        'patient_id_proof',
        'patient_id_proof_file',
        'associate_partner_id',
        'hospital_id',
        'claimant_address',
        'claimant_city',
        'claimant_state',
        'claimant_pincode',
        'claimant_email',
        'patient_or_claimant_offical_email',
        'claimant_mobile'
    ];
}
