<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'patient_id',
        'claim_id',
        'claimant_id',
        'hospital_id',       
        'is_patient_and_borrower_same',
        'is_claimant_and_borrower_same',
        'borrower_title',
        'borrower_firstname',
        'borrower_middlename',
        'borrower_lastname',
        'borrowers_relation_with_patient',
        'borrower_dob',
        'gender',
        'borrower_address',
        'borrower_city',
        'borrower_state',
        'borrower_pincode',
        'borrower_id_proof',
        'borrower_id_proof_file',
        'nature_of_income',
        'organization',
        'member_or_employer_id',
        'borrower_personal_email_id',
        'borrower_official_email_id',
        'borrower_mobile_no',
        'borrower_pan_no',
        'borrower_pan_no_file',
        'borrower_aadhar_no',
        'borrower_aadhar_no_file',
        'bank_statement',
        'bank_statement_file',
        'itr',
        'itr_file',
        'borrower_cancel_cheque',
        'borrower_cancel_cheque_file',
        'borrower_bank_name',
        'borrower_bank_address',
        'borrower_ac_no',
        'borrower_ifs_code',
        'co_borrower_nominee_name',
        'co_borrower_nominee_dob',
        'co_borrower_nominee_dob_file',
        'co_borrower_nominee_gender',
        'co_borrower_nominee_gender_file',
        'co_borrower_nominee_relation',
        'co_borrower_other_documents',
        'co_borrower_other_documents_file',
        'borrower_estimated_amount',
        'co_borrower_comments',

    ];

    public function claimant()
    {
        return $this->belongsTo(Claimant::class, 'claimant_id', 'id');
    }

    public function claim()
    {
        return $this->belongsTo(Claim::class, 'claim_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
