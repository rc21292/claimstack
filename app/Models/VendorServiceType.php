<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'associate_partner_id',
        'cashless_claims_management',
        'cashless_claims_management_charge',
        'cashless_helpdesk',
        'cashless_helpdesk_charge',
        'claims_assessment',
        'claims_assessment_charge',
        'claims_bill_entry',
        'claims_bill_entry_charge',
        'claims_reimbursement',
        'claims_reimbursement_charge',
        'doctor_claim_process',
        'doctor_claim_process_charge',
        'doctor_honorary_panel',
        'doctor_honorary_panel_charge',
        'doctor_tele_consultation',
        'doctor_tele_consultation_charge',
        'insurance_tpa_coordination',
        'insurance_tpa_coordination_charge',
        'medical_lending_bill',
        'medical_lending_bill_charge',
        'medical_lending_patient',
        'medical_lending_patient_charge',
        'others',
        'others_charge',
        'vendor_partner_comments',
    ];
}
