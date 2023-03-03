<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentStatus extends Model
{
    use HasFactory;
    protected $fillable=[
        'patient_id',
        'claim_id',
        'claimant_id',
        'hospital_id',
        'hospital_name',
        'hospital_address',
        'patient_name',
        'policy_no',
        'insurance_company',
        'company_tpa_id_card_no',
        'policy_start_date',
        'policy_expiry_date',
        'policy_commencement_date_without_break',
        'hospital_on_the_panel_of_insurance_co',
        'hospital_id_insurance_co',
        'pre_assessment_status',
        'query_pre_assessment',
        'pre_assessment_amount',
        'pre_assessment_suspected_fraud',
        'pre_assessment_suspected_fraud_file',
        'pre_assessment_status_comments',
        'final_assessment',
        'final_assessment_status',
        'query_final_assessment',
        'final_assessment_amount',
        'final_assessment_suspected_fraud',
        'final_assessment_suspected_fraud_file',
        'final_assessment_status_comments',

    ];
}
