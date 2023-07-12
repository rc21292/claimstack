<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Admin;
use App\Models\HospitalAdmin;

class AssignHospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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

        HospitalAdmin::where(['hospital_id' => $id])->delete();

        if ($request->assigned_linked_employees && count($request->assigned_linked_employees)) {
            foreach ($request->assigned_linked_employees as $key => $assigned_linked_employee) {
                if (empty($assigned_linked_employee)) {
                    continue;
                }
                HospitalAdmin::create(['hospital_id' => $id, 'admin_id' =>$assigned_linked_employee]);
            }
        }

        return redirect()->back()->with('success', 'Hospital Document updated successfully');
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
