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
        'title',
        'firstname',
        'middlename',
        'lastname',
        'borrowers_relation_with_patient',
        'gender',
        'dob',
        'address',
        'city',
        'state',
        'pincode',
        'id_proof',
        'id_proof_file',
        'mobile_no',
        'email_id',
        'official_email_id',
        'pan_no',
        'pan_no_file',
        'aadhar_no',
        'aadhar_no_file',
        'bank_statement',
        'bank_statement_file',
        'itr',
        'itr_file',
        'cancel_cheque',
        'cancel_cheque_file',
        'personal_email_id',
        'bank_name',
        'bank_address',
        'bank_account_no',
        'bank_ifs_code',
        'co_borrower_nominee_name',
        'co_borrower_nominee_dob',
        'co_borrower_nominee_dob_file',
        'co_borrower_nominee_gender',
        'co_borrower_nominee_gender_file',
        'co_borrower_nominee_relation',
        'co_borrower_other_documents',
        'co_borrower_other_documents_file',
        'estimated_amount',
        'co_borrower_comments',
    ];
}
