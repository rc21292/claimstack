<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentInwardOutwardTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_transaction',
        'document_type',
        'claim_id',
        'patient_name',
        'patient_id',
        'ap_name',
        'ap_id',
        'hospital_name',
        'hospital_id',
        'other',
        'transaction_type',
        'from_to',
        'name_of_the_organization_person',
        'mode_of_transaction',
        'courier_person_name',
        'pod_other_number_file',
        'pod_other_number',
        'document_comments'
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_name');
    }

    
    public function associatePartner()
    {
        return $this->belongsTo(associatePartner::class, 'ap_name');
    }


    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_name');
    }

}
