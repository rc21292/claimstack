<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $rules = [
            'firstname'                => 'required',
            'employee_code'            => 'required',
            'designation'              => 'required',           
            'email'                    => 'required|unique:admins',           
            'phone'                    => 'required',
            'department'               => 'required',
            'kra'                      => 'required',
            'linked_employee'          => 'required',
            'linked_employee_id'       => 'required',
        ];

        $messages = [
            'firstname.required'             => 'Please enter firstname',
            'employee_code.required'         => 'Please enter employee code.',
            'designation.required'           => 'Please enter designation.',          
            'email.required'                 => 'Please enter official mail ID.',         
            'phone.required'                 => 'Please enter contact number.',
            'department.required'            => 'Please select department.',
            'kra.required'                   => 'Please enter KRA',           
            'linked_employee.required'       => 'Please select linked employee.',
            'linked_employee_id.required'    => 'Please enter linked employee ID.',
        ];

        $this->validate($request, $rules, $messages);

        $admin                    =   Admin::create([
            'firstname'           =>  $request->firstname,
            'lastname'            =>  $request->lastname,
            'employee_code'       =>  $request->employee_code,
            'designation'         =>  $request->designation,           
            'email'               =>  $request->email,
            'phone'               =>  $request->phone,
            'password'            =>  Hash::make('12345678'),
            'department'          =>  $request->department,
            'kra'                 =>  $request->kra,
            'linked_employee'     =>  $request->linked_employee,
            'linked_employee_id'  =>  $request->linked_employee_id
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully');
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
        $rules = [
            'firstname'                => 'required',
            'employee_code'            => 'required',
            'designation'              => 'required',           
            'email'                    => 'required|unique:admins,email,'.$id,           
            'phone'                    => 'required',
            'department'               => 'required',
            'kra'                      => 'required',
            'linked_employee'          => 'required',
            'linked_employee_id'       => 'required',
        ];

        $messages = [
            'firstname.required'             => 'Please enter firstname',
            'employee_code.required'         => 'Please enter employee code.',
            'designation.required'           => 'Please enter designation.',          
            'email.required'                 => 'Please enter official mail ID.',         
            'phone.required'                 => 'Please enter contact number.',
            'department.required'            => 'Please select department.',
            'kra.required'                   => 'Please enter KRA',           
            'linked_employee.required'       => 'Please select linked employee.',
            'linked_employee_id.required'    => 'Please enter linked employee ID.',
        ];

        $this->validate($request, $rules, $messages);

        $admin                    =   Admin::where('id', $id)->update([
            'firstname'           =>  $request->firstname,
            'lastname'            =>  $request->lastname,
            'employee_code'       =>  $request->employee_code,
            'designation'         =>  $request->designation,           
            'email'               =>  $request->email,
            'phone'               =>  $request->phone,
            'department'          =>  $request->department,
            'kra'                 =>  $request->kra,
            'linked_employee'     =>  $request->linked_employee,
            'linked_employee_id'  =>  $request->linked_employee_id
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully');
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
