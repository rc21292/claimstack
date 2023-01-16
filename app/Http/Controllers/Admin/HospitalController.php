<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
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
        return view('admin.hospitals.manage',  compact('hospitals', 'filter_search'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $associates = AssociatePartner::get();
        $users      = User::get();
        
        return view('hospital.associate-partners.create.create',  compact('associates', 'users'));
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
            'type'                     => 'required',
            'pan'                      => 'required',
            'panfile'                  => 'required',
            'owner'                    => 'required',
            'email'                    => 'required|unique:associate_partners',
            'address'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'pincode'                  => 'required',
            'phone'                    => 'required|numeric|digits:10',
            'status'                   => 'required',
            'reference'                => 'required',
            'assigned_employee'        => 'required',
            'assigned_employee_id'     => 'required',
            'linked_employee'          => 'required',
            'linked_employee_id'       => 'required',
        ];

        $messages = [
            'firstname.required'             => 'Please enter firstname',
            'type.required'                  => 'Please select associate partner type.',
            'pan.required'                   => 'Please enter PAN number.',
            'panfile.required'               => 'Please upload PAN Card.',
            'owner.required'                 => "Please enter associate partner's owner name",
            'email.required'                 => 'Please enter official email ID.',
            'address.required'               => 'Please enter address.',
            'city.required'                  => 'Please enter city.',
            'state.required'                 => 'Please enter state.',
            'pincode.required'               => 'Please enter pincode.',
            'phone.required'                 => 'Please enter associate partner mobile number.',
            'status.required'                => 'Please select associate partner status.',
            'reference.required'             => 'Please enter reference',
            'assigned_employee.required'     => 'Please select assigned employee.',
            'assigned_employee_id.required'  => 'Please enter assigned employee ID.',
            'linked_employee.required'       => 'Please select linked employee.',
            'linked_employee_id.required'    => 'Please enter linked employee ID.',
        ];

        $this->validate($request, $rules, $messages);
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
        //
    }
}
