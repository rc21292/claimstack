<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\SuperAdminClaimReportExport;
use App\Models\Claim;
use Maatwebsite\Excel\Facades\Excel;

class ClaimReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $claims = Claim::with('patient');
        if ($filter_search) {
            $claims->whereHas('patient', function ($q) use ($filter_search) {
                $q->where(function ($q) use ($filter_search) {
                    $q->where('uid', 'like', '%' . $filter_search . '%');
                });
            });
        }

        $claims = $claims->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.reports.cliam-status',  compact('claims', 'filter_search'));
    }


    public function claimReportExport(Request $request)
    {
        return Excel::download(new SuperAdminClaimReportExport($request), 'claims-status-report.xlsx');
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