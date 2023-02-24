<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'claim_id',
        'policy_no',
        'insurance_company',
        'policy_name',
        'si_no_or_certificate_no',
        'company_or_tpa_id_card_no',
        'tpa_name',
        'policy_type',
        'group_name',
        'policy_start_date',
        'policy_expiry_date',
        'policy_commencement_date_without_break',
        'proposer_or_primary_insured_sur_name',
        'proposer_or_primary_insured_first_name',
        'proposer_or_primary_insured_middle_name',
        'proposer_or_primary_insured_last_name',
        'is_primary_insured_and_patient_same',
        'primary_insured_address',
        'primary_insured_city',
        'primary_insured_state',
        'primary_insured_pincode',
        'no_of_insured_person',
        'basic_sum_insured',
        'cumulative_bonus_cv',
        'agent_broker_code',
        'agent_broker_name',
        'are_you_covered_under_any_top_up_or_additional_policy',
        'currently_covered_by_any_other_mediclaim_or_health_insurance',
        'other_policy_commencement_date_without_break',
        'other_policy_insurance_company_name',
        'other_policy_no',
        'other_policy_sum_insured',
        'patient_hospitalized_last_4y_since_inception',
        'date_of_admission_past',
        'diagnosis_previous',
        'policy_details_comments',
    ];
}
