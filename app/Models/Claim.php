<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'patient_id',
        'admission_date',
        'admission_time',
        'abha_id',
        'abhafile',
        'insurance_coverage',
        'policy_no',
        'company_tpa_id_card_no',
        'lending_required',
        'hospitalization_due_to',
        'date_of_delivery',
        'system_of_medicine',
        'treatment_type',
        'admission_type_1',
        'admission_type_2',
        'admission_type_3',
        'claim_category',
        'treatment_category',
        'disease_category',
        'disease_name',
        'disease_type',
        'estimated_amount',
        'comments',
        'claim_intimation_done',
        'claim_intimation_number_mail'
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
