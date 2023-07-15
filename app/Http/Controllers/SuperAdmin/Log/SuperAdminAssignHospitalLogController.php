<?php

namespace App\Http\Controllers\SuperAdmin\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemLogs;

class SuperAdminAssignHospitalLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system_logs = SystemLogs::where(['system_logable_type' => 'App\Models\HospitalAdmin', 'module_name' => 'Hospital Admin', 'guard_name' => 'super-admin'])->latest()->paginate(20);

        return view('super-admin.logs.assign-hospital.manage',  compact('system_logs'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SystemLogs::find($id)->delete();    

        return redirect()->route('super-admin.assign-hospital-logs.index')->with('success', 'Log deleted successfully');
    }
}
