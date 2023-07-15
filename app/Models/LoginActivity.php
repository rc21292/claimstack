<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_guard',
        'user_agent',
        'ip_address'
    ];

    protected $appends = array('user_name');

    public function getUserNameAttribute()
    {
        if ($this->user_guard === 'super-admin') {
            return $this->belongsTo('App\Models\SuperAdmin', 'user_id', 'id')->value('employee_code');
        }if ($this->user_guard === 'admin') {
            return $this->belongsTo('App\Models\Admin', 'user_id', 'id')->value('employee_code');
        } if ($this->user_guard == 'hospital') {
            return $this->belongsTo('App\Models\Hospital', 'user_id', 'id')->value('uid');
        }else if ($this->user_guard == 'associate') {
            return $this->belongsTo('App\Models\AssociatePartner', 'user_id', 'id')->value('associate_partner_id');
        }else{
            return $this->belongsTo('App\Models\SuperAdmin', 'user_id', 'id')->value('employee_code');
        }
    }
}
