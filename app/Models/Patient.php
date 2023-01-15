<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'dob',
        'gender',
        'address',
        'city',
        'state',
        'pincode',
        'id_proof',
        'id_proof_file',
        'hospital_id',
        'hospital_name',
        'hospital_address',
        'hospital_city',
        'hospital_state',
        'hospital_pincode',
        'associate_partner_id',
        'email',
        'mobile',
        'referred_by',
        'Direct',
        'comments'
    ];
}
