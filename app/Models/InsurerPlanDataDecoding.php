<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurerPlanDataDecoding extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurer',
        'plan_name'
    ];
}
