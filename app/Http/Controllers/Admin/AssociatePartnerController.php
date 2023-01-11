<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AssociatePartnerController extends Controller
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
    public function index()
    {
        $associates = AssociatePartner::orderBy('id', 'desc')->paginate(20);
        return view('admin.associate-partners.manage',  compact('associates'));
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
        return view('admin.associate-partners.create.create',  compact('associates', 'users'));
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
            'owner'                    => 'required',
            'email'                    => 'required|unique:users',
            'address'                  => 'required',
            'city'                     => 'required',
            'state'                    => 'required',
            'pincode'                  => 'required',
            'phone'                    => 'required',
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

        $associate_partner             =  AssociatePartner::create([
            'firstname'                => $request->firstname,
            'lastname'                 => $request->lastname,
            'type'                     => $request->type,
            'pan'                      => $request->pan,
            'owner'                    => $request->owner,
            'email'                    => $request->email,
            'password'                 => Hash::make('12345678'),
            'address'                  => $request->address,
            'city'                     => $request->city,
            'state'                    => $request->state,
            'pincode'                  => $request->pincode,
            'phone'                    => $request->phone,
            'status'                   => $request->status,
            'reference'                => $request->reference,
            'assigned_employee'        => $request->assigned_employee,
            'assigned_employee_id'     => $request->assigned_employee_id,
            'linked_employee'          => $request->linked_employee,
            'linked_employee_id'       => $request->linked_employee_id
        ]);

        AssociatePartner::where('id', $associate_partner->id)->update([
            'associate_partner_id'      => 'AP' . substr($associate_partner->pan, 0, 2) . substr($associate_partner->pan, -2)
        ]);

        if ($request->hasfile('panfile')) {
            $panfile                    = $request->file('panfile');
            $name                       = $panfile->getClientOriginalName();
            $panfile->storeAs('uploads/associate-partners/' . $associate_partner->id . '/', $name, 'public');
            AssociatePartner::where('id', $associate_partner->id)->update([
                'panfile'               =>  $name
            ]);
        }

        return redirect()->route('admin.associate-partners.index')->with('success', 'Associate partner created success');
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
        $associate  = AssociatePartner::find($id);
        $associates = AssociatePartner::get();
        $users      = User::get();
        return view('admin.associate-partners.edit.edit',  compact('associate', 'associates', 'users'));
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
