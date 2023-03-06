<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'claim_id',
        'claimant_id',
        'hospital_id',
        'hospital_name',
        'hospital_address',
        'hospital_city',
        'hospital_state',
        'hospital_pincode',
        'patient_title',
        'patient_firstname',
        'patient_middlename',
        'patient_lastname',
        'is_patient_and_borrower_same',
        'is_claimant_and_borrower_same',
        'borrower_title',
        'borrower_firstname',
        'borrower_middlename',
        'borrower_lastname',
        'borrowers_relation_with_patient',
        'gender',
        'bank_statement',
        'bank_statement_file',
        'itr',
        'itr_file',
        'dob',
        'borrower_address',
        'borrower_official_email_id',
        'borrower_city',
        'borrower_state',
        'borrower_pincode',
        'borrower_id_proof',
        'borrower_dob',
        'borrower_id_proof_file',
        'borrower_mobile_no',
        'borrower_email_id',
        'borrower_pan_no',
        'borrower_pan_no_file',
        'borrower_aadhar_no',
        'borrower_aadhar_no_file',
        'borrower_cancel_cheque',
        'borrower_cancel_cheque_file',
        'borrower_personal_email_id',
        'borrower_bank_name',
        'borrower_bank_address',
        'borrower_estimated_amount',
        'co_borrower_nominee_name',
        'co_borrower_nominee_dob',
        'co_borrower_nominee_dob_file',
        'co_borrower_nominee_gender',
        'co_borrower_nominee_gender_file',
        'co_borrower_nominee_relation',
        'co_borrower_other_documents',
        'co_borrower_other_documents_file',
        'borrower_ac_no',
        'borrower_ifs_code'.
        'co_borrower_comments'

    ];

    public function claimant()
    {
        return $this->belongsTo(Claimant::class, 'claimant_id', 'uid');
    }

    public function claim()
    {
        return $this->belongsTo(Claim::class, 'claim_id', 'uid');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'uid');
    }
}
