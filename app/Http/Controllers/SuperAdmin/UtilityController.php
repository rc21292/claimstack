<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\HospitalDepartment;
use App\Models\User;
use App\Models\RetailPolicy;
use Illuminate\Http\Request;
use DB;

class UtilityController extends Controller
{

    public function getHospitalDoctors($hospital)
    {
        $doctors = HospitalDepartment::where('hospital_id',$hospital)->get(['id','doctors_firstname', 'doctors_lastname', 'registration_no', 'doctors_mobile_no', 'specialization']);

        $html  = '<option value="">Select</option>';
        if (count($doctors) > 0) {
            foreach ($doctors as $employee) {
                $html .= '<option value=' . $employee->id . ' data-specialization="'. $employee->specialization . '" data-registration="'. $employee->registration_no . '" data-mobile="'. $employee->doctors_mobile_no. '" >' . $employee->doctors_firstname . ' '.  $employee->doctors_lastname . '</option>';
            }
        } else {
            $html  = 'Not Found.';
        }


        return response()->json($html);

    }

    public function getRetailPolicies($policy)
    {
        DB::connection()->enableQueryLog();
        $data =  RetailPolicy::where('policy_name',trim($policy))->orWhere('policy_name', str_replace('.', '', $policy))->orWhere('policy_name',' '. str_replace('.', '', $policy))->get(['id','policy_name','plan_name']);
        $queries = DB::getQueryLog();
        $last_query = end($queries);

        $html  = '<option value="">Select</option>';
        if (count($data) > 0) {
            foreach ($data as $employee) {
                $html .= '<option value=' . $employee->id . '  data-policy=' . $employee->policy_name . '>' . $employee->plan_name . '</option>';
            }
        } else {
            $html  = 'Not Found.';
        }


        return response()->json($html);

        return $data;
    }

    public function getEmployeesByDepartment($department)
    {
        $users  = User::/*where('department', $department)->*/get(['id', 'firstname', 'lastname', 'department', 'employee_code'])->collect();
        $users->map(function ($item) {
            $item->name = $item->firstname . ' ' . $item->lastname;
            $item->role = 'User';
            unset($item->firstname);
            unset($item->lastname);
            return $item;
        });

        $admins = Admin::/*where('department', $department)->*/get(['id', 'firstname', 'lastname', 'department', 'employee_code'])->collect();
        $admins->map(function ($item) {
            $item->name = $item->firstname . ' ' . $item->lastname;
            $item->role = 'Admin';
            unset($item->firstname);
            unset($item->lastname);
            return $item;
        });
        $employees = $users->merge($admins);
        $html  = '<option value="">Select Linked With Employee</option>';
        if (count($employees) > 0) {
            foreach ($employees as $employee) {
                $html .= '<option value=' . $employee->id . '  data-id=' . $employee->employee_code . '>' . $employee->name . '[' . $employee->employee_code . '][' . $employee->department . ']</option>';
            }
        } else {
            $html  = 'No Employee found for selected department.';
        }


        return response()->json($html);
    }
}
