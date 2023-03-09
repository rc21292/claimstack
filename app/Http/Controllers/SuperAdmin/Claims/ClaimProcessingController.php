<?php

namespace App\Http\Controllers\Superadmin\Claims;

use App\Http\Controllers\Controller;
use App\Models\Claimant;
use App\Models\ClaimProcessing;
use App\Models\Insurer;
use Illuminate\Http\Request;

class ClaimProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $claimant                       = Claimant::with('claim')->find($id);
        $claim_processing_exists        = ClaimProcessing::where('patient_id', $claimant->patient_id)->exists();
        $claim_processing               = $claim_processing_exists ? ClaimProcessing::where('claimant_id', $claimant->id)->first() : null;
        $insurers                       = Insurer::get();

        return view('super-admin.claims.claimants.edit.claim-processing', compact('claimant', 'claim_processing', 'insurers'));
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
