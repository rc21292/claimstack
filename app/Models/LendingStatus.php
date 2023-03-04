<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendingStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrower_id',
        'patient_id',
        'claim_id',
        'hospital_name',
        'hospital_address',
        'patient_name',
        'borrower_name',
        'borrower_email_id',
        'borrower_official_email_id',
        'borrower_mobile_no',
        'borrower_pan_no',
        'borrower_aadhar_no',
        'estimated_amount',
        'final_assessment_amount',
        'medical_lending_type',
        'vendor_partner_name_nbfc_or_bank',
        'vendor_partner_id',
        'loan_application_comments',
        'date_of_loan_application',
        'time_of_loan_application',
        'date_of_loan_re_application',
        'time_of_loan_re_application',
        'loan_id_or_no',
        'loan_id_or_no_file',
        'loan_status',
        'loan_approved_amount',
        'loan_approved_amount_file',
        'loan_disbursed_amount',
        'date_of_loan_disbursement',
        'loan_tenure',
        'loan_instalments',
        'loan_start_date',
        'loan_end_date',
        'insurance_claim_settlement_date',
        'insurance_claim_settled_amount',
        'insurance_claim_settled_amount_file',
        'insurance_claim_amount_disbursement_date',
        'insurance_claim_amount_disbursement_date_file',
        'loan_application_status_comments',
        're_apply_loan_amount',
        'loan_re_application_status_comments',
    
    ];
}
