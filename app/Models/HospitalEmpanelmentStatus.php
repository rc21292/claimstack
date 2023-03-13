<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalEmpanelmentStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'empanelled',
        'empanelled_file',
        'hospital_id_as_per_the_selected_company',
        'signed_mou',
        'signed_mou_file',
        'agreed_packages_and_tariff_pdf_other_images',
        'agreed_packages_and_tariff_pdf_other_images_file',
        'negative_listing_status',
        'negative_listing_status_file',
        'hospital_empanelment_status_comments',
    ];
}
