<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $users = User::query();
        if($filter_search){
            $users->where(DB::raw("concat(firstname, ' ', lastname)"), 'like','%' . $filter_search . '%');
        }
        $users = $users->orderBy('id', 'desc')->paginate(20);
        return view('employee.users.manage',  compact('users', 'filter_search'));
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
        return view('employee.users.create.create',  compact('admins', 'users'));
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
            'email'                    => 'required|unique:users',           
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

        $user                    =   User::create([
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

        $user->assignRole('user');

        return redirect()->route('employee.users.index')->with('success', 'User created successfully');
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
        $user  = User::find($id);
        $admins = Admin::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'employee_code']);
        $users  = User::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'employee_code']);
        return view('employee.users.edit.edit',  compact('admins', 'users', 'user'));
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
            'email'                    => 'required|unique:users,email,'.$id,           
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

        $user                    =   User::where('id', $id)->update([
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

        return redirect()->route('employee.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('employee.users.index')->with('success', 'User deleted successfully');
    }
}
