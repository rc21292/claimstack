<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelLog;


class InterDepartmentDocumentTracking extends Model
{
    use HasFactory, ModelLog;

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
        'employee_name',
        'employee_id',
        'department',
        'document_comments'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_name');
    }

    
    public function associatePartner()
    {
        return $this->belongsTo(AssociatePartner::class, 'ap_name');
    }


    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_name');
    }

    public function employee()
    {
        return $this->belongsTo(Admin::class, 'employee_name');
    }
}
