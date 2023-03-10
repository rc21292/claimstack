<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use App\Models\Claim;
use App\Models\Hospital;
use App\Models\BillEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaimController extends Controller
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
        $claims = Hospital::query();
        if($filter_search){
            $claims->where('name', 'like','%' . $filter_search . '%');
        }
        $claims = $claims->orderBy('id', 'desc')->paginate(20);

        return view('super-admin.claims.manage',  compact('claims', 'filter_search'));       
    }


    public function billEntry(Request $request)
    {
        $bill_entry = BillEntry::first();

        if (!$bill_entry) {
            $bill_entry = BillEntry::create(['room_rent_date' => date("Y-m-d H:i:s")]);
        }

        return view('super-admin.claims.edit.tabs.bill-entry',  compact('bill_entry'));       
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
        $hospital          = Hospital::find($id);
        $hospital_id         = $id;
        $hospitals         = Hospital::get();
        $users              = User::get();
        return view('super-admin.claims.edit.edit',  compact('hospital','hospital_id'));
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
