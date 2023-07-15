<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLogs extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'system_logs';


    /**
     * @var string[]
     */
    protected $fillable = [
        'system_logable_id',
        'system_logable_type',
        'user_id',
        'guard_name',
        'module_name',
        'action',
        'old_value',
        'new_value',
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
    
    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital', 'system_logable_id', 'id');
    }
}
