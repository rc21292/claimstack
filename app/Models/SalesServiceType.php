<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
       'associate_partner_id',
       'consulting',
       'consulting_charge',
       'dealer_distributor',
       'dealer_distributor_charge',
       'hospital_empanelment_agent',
       'hospital_empanelment_agent_charge',
       'software_sales',
       'software_sales_charge',
       'others',
       'others_charge',
       'sales_partner_comments',
    ];
}
