<?php

namespace App\Http\Controllers\Superadmin\Claims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssociatePartner;
use App\Models\Claimant;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\User;

class ClaimantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:super-admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $claimants = Claimant::query();
        if($filter_search){
            $claimants->where('name', 'like','%' . $filter_search . '%');
        }
        $claimants = $claimants->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.claims.claimants.manage',  compact('claimants', 'filter_search'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient_id     = $request->patient_id;
        $associates     = AssociatePartner::get();
        $hospitals      = Hospital::get();
        $patient        = Patient::find($request->patient_id);


        return view('super-admin.claims.claimants.create',  compact('patient_id', 'associates', 'hospitals', 'patient'));
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
        //
    }
}
