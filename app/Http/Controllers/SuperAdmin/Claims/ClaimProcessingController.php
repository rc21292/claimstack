<?php

namespace App\Http\Controllers\Superadmin\Claims;

use App\Http\Controllers\Controller;
use App\Models\Claimant;
use App\Models\ClaimProcessing;
use App\Models\Insurer;
use Illuminate\Http\Request;
use App\Models\IcdCode;
use App\Models\PcsCode;

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
        $icd_codes_level1               = IcdCode::where('level1', '!=', '#N/A')->where('level1', '!=', 'Level-1')->distinct('level1_code')->get(['level1','level1_code']);
        $icd_codes_level2               = IcdCode::where('level2', '!=', '#N/A')->where('level2', '!=', 'Level-2')->distinct('level2_code')->get(['level2','level2_code']);
        $icd_codes_level3               = IcdCode::where('level3', '!=', '#N/A')->where('level3', '!=', 'Level-3')->distinct('level3_code')->get(['level3','level3_code']);
        $icd_codes_level4               = IcdCode::where('level4', '!=', '#N/A')->where('level4', '!=', 'Level-4')->distinct('level4_code')->get(['level4','level4_code']);
        $pcs_group_name                 = PcsCode::distinct('pcs_group_code')->get(['pcs_group_name','pcs_group_code']);
        $pcs_sub_group_name             = PcsCode::distinct('pcs_sub_group_code')->get(['pcs_sub_group_name','pcs_sub_group_code']);
        $pcs_short_name                 = PcsCode::distinct('pcs_code')->get(['pcs_short_name', 'pcs_long_name', 'pcs_code']);
        $pcs_codes                      = PcsCode::get();

        return view('super-admin.claims.claimants.edit.claim-processing', compact('claimant', 'claim_processing', 'insurers', 'icd_codes_level1', 'icd_codes_level2', 'icd_codes_level3', 'icd_codes_level4', 'pcs_group_name', 'pcs_sub_group_name', 'pcs_short_name' , 'pcs_codes'));
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
