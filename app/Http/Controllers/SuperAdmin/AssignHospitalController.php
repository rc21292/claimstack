<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Admin;
use App\Models\HospitalAdmin;
use App\Models\SystemLogs;

class AssignHospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:super-admin');
    }

    public function index(Request $request)
    {
        $filter_search = $request->search;
        $hospitals = Hospital::query();
        if($filter_search){
            $hospitals->where('name', 'like','%' . $filter_search . '%');
        }
        $hospitals = $hospitals->orderBy('id', 'desc')->paginate(20);
        return view('super-admin.assigning.hospitals.manage',  compact('hospitals', 'filter_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::get(['name', 'id', 'uid']);
        $admins = Admin::get(['firstname', 'lastname', 'id', 'uid', 'employee_code']);

        $selected_admins = [];
        foreach ($hospital->admins as $key => $admin) {
            array_push($selected_admins, $admin->admin_id);
        }


        $selected_hospitals = [];
        foreach ($hospital->admins as $key => $admin) {
            array_push($selected_hospitals, $admin->hospital_id);
        }

        return view('super-admin.assigning.hospitals.create',  compact('hospital', 'admins', 'selected_admins', 'hospitals', 'selected_hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::find($id);
        $admins = Admin::get(['firstname', 'lastname', 'id', 'uid', 'employee_code']);

        $selected_admins = [];
        foreach ($hospital->admins as $key => $admin) {
            array_push($selected_admins, $admin->admin_id);
        }

        return view('super-admin.assigning.hospitals.edit',  compact('hospital', 'admins', 'selected_admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hospital_admins_old = HospitalAdmin::where(['hospital_id' => $id])->get(['hospital_id', 'admin_id', 'id']);

        HospitalAdmin::where(['hospital_id' => $id])->delete();

        if ($request->assigned_linked_employees && count($request->assigned_linked_employees)) {
            foreach ($request->assigned_linked_employees as $key => $assigned_linked_employee) {
                if (empty($assigned_linked_employee)) {
                    continue;
                }
                HospitalAdmin::create(['hospital_id' => $id, 'admin_id' =>$assigned_linked_employee]);
            }
        }

        $hospital_admins_new = HospitalAdmin::where(['hospital_id' => $id])->get(['hospital_id', 'admin_id', 'id']);


        /*save system log*/

        $systemLog = new SystemLogs();
        $systemLog->system_logable_id = $id;
        $systemLog->system_logable_type = 'App\Models\HospitalAdmin';
        $systemLog->user_id = auth()->user()->id;
        $systemLog->guard_name = 'super-admin';
        $systemLog->module_name = 'Hospital Admin';
        $systemLog->action = 'UPDATED';
        $systemLog->old_value = !empty($hospital_admins_old) ? json_encode($hospital_admins_old) : null;
        $systemLog->new_value = !empty($hospital_admins_new) ? json_encode($hospital_admins_new) : null;
        $systemLog->ip_address = request()->ip();
        $systemLog->save();
        
        /*end save system log*/


        return redirect()->back()->with('success', 'Hospital assigned successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
