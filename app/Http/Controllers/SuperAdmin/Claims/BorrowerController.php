<?php

namespace App\Http\Controllers\SuperAdmin\Claims;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssociatePartner;
use App\Models\Claimant;
use App\Models\IcdCode;
use App\Models\PcsCode;
use App\Models\Borrower;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Claim;
use App\Models\LendingStatus;
use App\Models\DischargeStatus;
use App\Models\Insurer;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $borrowers = Borrower::query();

        if($filter_search){
            $borrowers->where('patient_id', 'like','%' . $filter_search . '%');
        }

        $borrowers = $borrowers->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.claims.borrowers.manage',  compact('borrowers', 'filter_search'));
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
        $claimant       = Claimant::find($id);
        $hospital       = Hospital::where('uid',$claimant->hospital_id)->first();
        $hospitals      = Hospital::get();

        $icd_codes_level1      = IcdCode::where('level1', '!=', '#N/A')->where('level1', '!=', 'Level-1')->distinct('level1_code')->get(['level1','level1_code']);
        $icd_codes_level2      = IcdCode::where('level2', '!=', '#N/A')->where('level2', '!=', 'Level-2')->distinct('level2_code')->get(['level2','level2_code']);
        $icd_codes_level3      = IcdCode::where('level3', '!=', '#N/A')->where('level3', '!=', 'Level-3')->distinct('level3_code')->get(['level3','level3_code']);
        $icd_codes_level4      = IcdCode::where('level4', '!=', '#N/A')->where('level4', '!=', 'Level-4')->distinct('level4_code')->get(['level4','level4_code']);

        $pcs_group_name  = PcsCode::distinct('pcs_group_code')->get(['pcs_group_name','pcs_group_code']);

        $pcs_sub_group_name  = PcsCode::distinct('pcs_sub_group_code')->get(['pcs_sub_group_name','pcs_sub_group_code']);

        $pcs_short_name = PcsCode::distinct('pcs_code')->get(['pcs_short_name', 'pcs_long_name', 'pcs_code']);

        $pcs_codes      = PcsCode::get();
        $patient        = Patient::where('uid', $claimant->patient_id)->first();
        $insurers       = Insurer::get();
        $exists         = Borrower::where('claimant_id', $id)->exists();
        if ($exists) {
            $borrower     = Borrower::where('claimant_id', $id)->first();
        }else{
            $borrower = Borrower::create([
                'claimant_id' => $id,
                'patient_id' => $claimant->patient_id,
                'claim_id' => $claimant->claim_id,
                'hospital_id' => $claimant->hospital_id,
                'hospital_name' => @$hospital->name,
                'hospital_address' => @$hospital->address,
                'hospital_city' => @$hospital->city,
                'hospital_state' =>@ $hospital->state,
                'hospital_pincode' => @$hospital->pincode,
                'patient_title' => @$patient->title,
                'patient_firstname' => @$patient->firstname,
                'patient_middlename' => @$patient->middlename,
                'patient_lastname' => @$patient->lastname,
            ]);
        }

        $associates  = AssociatePartner::get();
        $patient_id   = $claimant->patient_id;
        $hospital_id   = $claimant->hospital_id;

        $claim = $claimant->claim;
        $policy_no = $claim->policy_no;

        $claim_id = $claimant->claim_id;
        $claimant_id = $claimant->uid;

        $hospital_name = $hospital->name;
        $hospital_address = $hospital->address;
        $hospital_city = $hospital->city;
        $hospital_state = $hospital->state;
        $hospital_pincode = $hospital->pincode;
        $patient_title = $patient->title;
        $patient_firstname = $patient->firstname;
        $patient_middlename = $patient->middlename;
        $patient_lastname = $patient->lastname;




        return view('super-admin.claims.borrowers.edit.edit',  compact('patient_id', 'claim_id', 'claimant_id', 'hospital_id', 'associates', 'hospitals', 'patient', 'claimant', 'borrower', 'hospital_name', 'policy_no', 'hospital_address', 'hospital_city', 'hospital_state', 'hospital_pincode', 'patient_title', 'patient_firstname', 'patient_middlename', 'patient_lastname', 'id', 'claim', 'insurers', 'icd_codes_level1', 'pcs_codes', 'icd_codes_level2', 'icd_codes_level3' , 'icd_codes_level4', 'pcs_group_name', 'pcs_sub_group_name', 'pcs_short_name'));

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
