<?php

namespace App\Http\Controllers\Associate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\AssociateClaimReportExport;
use App\Models\Claim;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ClaimReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $claims = Claim::query();

        $filter_date_from_to = $request->date_from_to;

        if($filter_date_from_to){
            $d = explode('-',$filter_date_from_to);

            $claims->whereDate('created_at', '>=', Carbon::parse($d[0])->format('Y-m-d') );
            $claims->whereDate('created_at','<=', Carbon::parse($d[1])->format('Y-m-d') );
        }

        $user_id = auth('associate')->user()->associate_partner_id;
        $claims = $claims->whereHas('hospital', function($q) use ($user_id){
            $q->where('linked_associate_partner_id', auth('associate')->user()->associate_partner_id)
        ->orWhereHas('associate', function($q) use ($user_id)
        {
            $q->where('linked_associate_partner_id', $user_id)
            ->orWhereHas('associate', function($q) use ($user_id)
            {
                $q->where('linked_associate_partner_id', $user_id)
                ->orWhereHas('associate', function($q) use ($user_id)
                {
                        $q->where('linked_associate_partner_id', $user_id);
                });
            });
        });
        })->orderBy('id', 'desc')->paginate(20);

        return view('associate.reports.cliam-status',  compact('claims', 'filter_date_from_to'));
    }


    public function claimReportExport(Request $request)
    {
        return Excel::download(new AssociateClaimReportExport($request), 'claims-status-report.xlsx');
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
