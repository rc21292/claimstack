<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\Associate\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssociatePartner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'associate_partner_id',
        'type',
        'pan',
        'panfile',
        'owner',
        'email',
        'address',
        'city',
        'state',
        'pincode',
        'password',
        'phone',
        'reference',
        'status',
        'linked_associate_partner',
        'linked_associate_partner_id',
        'assigned_employee',
        'assigned_employee_id',
        'linked_employee',
        'linked_employee_id',
        'mou',
        'moufile',
        'agreement_start_date',
        'agreementfile',
        'agreement_end_date',
        'contact_person',
        'contact_person_phone',
        'contact_person_email',
        'comments',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
