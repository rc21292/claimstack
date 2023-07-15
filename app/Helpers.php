<?php

namespace App\Helpers;
use App\Models\Hospital;
use App\Models\Admin;

class Helper {

    public static function getHospitalUid($id=0){
        return Hospital::find($id)->value('uid');
    }

    public static function getAdminUid($id=0){
        return Admin::find($id)->value('employee_code');
    }
}