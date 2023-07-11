<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'hospital_id'
    ];


    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

}
