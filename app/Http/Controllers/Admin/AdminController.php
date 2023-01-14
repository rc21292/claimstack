<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $admins = Admin::query();
        if($filter_search){
            $admins->where(DB::raw("concat(firstname, ' ', lastname)"), 'like','%' . $filter_search . '%');
        }
        $admins = $admins->orderBy('id', 'desc')->paginate(20);
        return view('admin.admins.manage',  compact('admins', 'filter_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'employee_code']);
        $users  = User::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'employee_code']);
        return view('admin.admins.create.create',  compact('admins', 'users'));
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
        $admin  = Admin::find($id);
        $admins = Admin::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'employee_code']);
        $users  = User::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'employee_code']);
        return view('admin.admins.edit.edit',  compact('admins', 'users', 'admin'));
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
        Admin::find($id)->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully');
    }
}
