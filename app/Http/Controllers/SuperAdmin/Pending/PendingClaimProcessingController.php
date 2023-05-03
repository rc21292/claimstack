<?php

namespace App\Http\Controllers\SuperAdmin\Pending;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Insurer;
use App\Models\Admin;

class PendingClaimProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $claims =  Claim::where('claim_processing_status', 0)
            ->where(function ($query) {
            $query->whereNotNull('assign_to_claim_processing')
            ->orWhereNotNull('re_assign_to_claim_processing');
        })->orderBy('id', 'desc')->paginate(20);

        $filter_search = '';
        
    /*
        \DB::connection()->enableQueryLog();
        $filter_search = $request->search;
        $claims = Claim::query();
        if($filter_search){
            $claims->where('name', 'like','%' . $filter_search . '%');
            $claims->orWhere('uid', 'like','%' . $filter_search . '%');
        }

        $claims = $claims->whereHas('claimProcessing', function ($q) {
                $q->whereNotNull('claim_id');
            })->where('insurance_coverage', 'Yes')->orWhere('lending_required', 'Yes')->orWhere(['insurance_coverage' => 'Yes', 'lending_required' => 'Yes'])->orderBy('id', 'desc')->paginate(20);

        $queries = \DB::getQueryLog();

        $last_query = end($queries);
*/
        return view('super-admin.pendings.processing.manage',  compact('claims', 'filter_search'));
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
        Claim::where('id', $id)->update(['claim_processing_status' => 1]);
        return redirect()->route('super-admin.pending-claim-processing.index')->with('success', 'Claim Authorised successfully');
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
