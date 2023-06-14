<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsurerPlanDataDecoding;
use App\Models\DecodingInsurer;
use App\Models\DecodingPlan;
use DB;

class InsurerPlanDataDecodingController extends Controller
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
        $decodings = DecodingInsurer::latest()->pluck('insurer','id');
        $plans = DecodingPlan::latest()->pluck('plan_name','id');

        $plan_name = $request->plan_name;
        $insurer = $request->insurer;

        if ($request->insurer && $request->plan_name) {

        DB::connection()->enableQueryLog();
            $decoding_datas = InsurerPlanDataDecoding::where(['insurer' => $request->insurer, 'plan_name' => $request->plan_name])->get();
            $queries = DB::getQueryLog();
            $last_query = end($queries);
        }else{
            $decoding_datas = null;
        }
  
        return view('super-admin.decodings.create.create',  compact('decodings','plans', 'decoding_datas', 'plan_name', 'insurer'));  
                
          
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
