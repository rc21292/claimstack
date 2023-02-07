<?php

namespace App\Http\Controllers\Associate;

use App\Http\Controllers\Controller;
use App\Models\AssociatePartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:associate');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $associate_partner = AssociatePartner::find($id);
        $linked_ap         = AssociatePartner::find($associate_partner->linked_employee);
        $assigned_ap         = AssociatePartner::find($associate_partner->assigned_employee);
        return view('associate.dashboard', compact('linked_ap', 'assigned_ap'));
    }
}
