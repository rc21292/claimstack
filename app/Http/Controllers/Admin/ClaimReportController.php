<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\AdminClaimReportExport;
use App\Models\Claim;
use App\Models\Hospital;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ClaimReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $claims = Claim::query();

        $filter_state = $request->state;
        $filter_hospital = $request->filter_hospital;
        $filter_date_from_to = $request->date_from_to;

        if($filter_hospital){
            $claims->where('hospital_id', 'like','%' . $filter_hospital . '%');
        }

        if($filter_state){

            $claims->whereHas('hospital',  function ($q) use ($filter_state) {
                $q->where('state', 'like','%' . $filter_state . '%');
            });
        }

        if($filter_date_from_to){
            $d = explode('-',$filter_date_from_to);
            $claims->whereDate('created_at', '>=', Carbon::parse($d[0])->format('Y-m-d') );
            $claims->whereDate('created_at','<=', Carbon::parse($d[1])->format('Y-m-d') );
        }

        $user_id = auth('admin')->user()->id;

        $claims = $claims->whereHas('hospital', function ($q) use ($user_id) {
            $q->where('linked_employee', auth('admin')->user()->id)->orWhere('assigned_employee', auth('admin')->user()->id);
            $q->orWhereHas('assignedEmployeeData', function ($q) use ($user_id) {
                $q->where('linked_employee', $user_id);
            })->orWhereHas('linkedEmployeeData', function ($q) use ($user_id) {
                $q->where('linked_employee', $user_id);
            });
        })->orderBy('id', 'desc')->paginate(20);

        $hospitals = Hospital::pluck('name','id');    

        return view('admin.reports.cliam-status',  compact('claims', 'filter_state', 'filter_hospital', 'filter_date_from_to', 'hospitals'));
    }


    public function claimReportExport(Request $request)
    {
        return Excel::download(new AdminClaimReportExport($request), 'claims-status-report.xlsx');
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
