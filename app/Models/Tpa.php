<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpa extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'company_type',
        'comment',
    ];
}
