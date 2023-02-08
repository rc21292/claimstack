<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:hospital');
    }

    public function index()
    {

        $id = Auth::user()->id;
        $associate_partner = AssociatePartner::find($id);
        $linked_ap         = AssociatePartner::find($associate_partner->linked_employee);
        $assigned_ap         = AssociatePartner::find($associate_partner->assigned_employee);
        return view('associate.dashboard', compact('linked_ap', 'assigned_ap'));
    
    
        $total_associates = AssociatePartner::count();
        $vendor_associates = AssociatePartner::where('type', 'vendor')->count();
        $sales_associates = AssociatePartner::where('type', 'sales')->count();
        return view('hospital.dashboard', compact('total_associates', 'vendor_associates', 'sales_associates'));
    }
}
