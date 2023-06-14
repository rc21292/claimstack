<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterDepartmentDocumentTracking;
use App\Models\Patient;
use App\Models\Claim;
use App\Models\Hospital;
use App\Models\Admin;
use App\Models\AssociatePartner;
use Auth;
use Carbon\Carbon;

class InterDepartmentDocumentTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inter_department_document_trackings = InterDepartmentDocumentTracking::query();

        $filter_claim_id = $request->claim_id;
        $filter_patient_id = $request->patient_id;
        $filter_date_from_to = $request->date_from_to;


        if($filter_claim_id){
            $inter_department_document_trackings->where('claim_id', '=',  $filter_claim_id );
        }

        if($filter_patient_id){
            $inter_department_document_trackings->where('patient_id', '=',  $filter_patient_id );
        }

        if($filter_date_from_to){

            $d = explode('-',$filter_date_from_to);
            $inter_department_document_trackings->whereDate('date_of_transaction', '>=',  Carbon::parse($d[0])->format('Y-m-d') );
            $inter_department_document_trackings->whereDate('date_of_transaction','<=',Carbon::parse($d[1])->format('Y-m-d') );
        }


        $inter_department_document_trackings = $inter_department_document_trackings->orderBy('id', 'desc')->paginate(20);
        return view('super-admin.inter_department_document_trackings.manage',  compact('inter_department_document_trackings', 'filter_claim_id', 'filter_patient_id', 'filter_date_from_to'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = Auth::guard('super-admin')->user();              
        $claims = Claim::orderBy('id', 'desc')->with('patient','hospital')->get();
        $employees = Admin::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'uid', 'employee_code', 'department']);
        $patients = Patient::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'uid']);
        $associate_partners = AssociatePartner::orderBy('id', 'desc')->get(['id', 'name', 'associate_partner_id']);
        $hospitals = Hospital::orderBy('id', 'desc')->get(['id', 'name', 'uid']);
        return view('super-admin.inter_department_document_trackings.create.create',  compact('claims', 'associate_partners', 'patients', 'hospitals', 'user', 'employees'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'date_of_transaction'                  => 'required',
            'document_type'                        => 'required',
            'other'                                => (($request->claim_id == '') || ($request->hospital_id == '') || ($request->patient_id == '') || ($request->ap_id == '') ) ? 'required' :'',
            'document_comments'                    => $request->document_type == 'Other' ? 'required' : '',
        ];

        $messages = [
            'date_of_transaction.required'   => 'Please enter date of transaction',
        ];         

        $this->validate($request, $rules, $messages);

        $documentinwardoutwardtracking   =   InterDepartmentDocumentTracking::create([
            'user_id'                           => $request->user_id,
            'date_of_transaction'               => Carbon::parse($request->date_of_transaction)->format('Y-m-d'),
            'document_type'                     => $request->document_type,
            'claim_id'                          => $request->claim_id,
            'patient_name'                      => $request->patient_name,
            'patient_id'                        => $request->patient_id,
            'ap_name'                           => $request->ap_name,
            'ap_id'                             => $request->ap_id,
            'hospital_name'                     => $request->hospital_name,
            'hospital_id'                       => $request->hospital_id,
            'other'                             => $request->other,
            'employee_name'                     => $request->employee_name,
            'employee_id'                       => $request->employee_id,
            'department'                        => $request->department,
            'document_comments'                 => $request->document_comments,
        ]);

        return redirect()->route('super-admin.inter-department-docs-tracking.index')->with('success', 'Document Inward Outward Tracking created successfully');          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document_inward_outward_tracking = InterDepartmentDocumentTracking::find($id);
        return view('super-admin.inter_department_document_trackings.show',  compact('document_inward_outward_tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document_inward_outward_tracking = InterDepartmentDocumentTracking::find($id);
        $document_inward_outward_tracking->date_of_transaction = Carbon::parse($document_inward_outward_tracking->date_of_transaction)->format('d-m-Y');
        $user = Auth::guard('super-admin')->user();              
        $claims = Claim::orderBy('id', 'desc')->with('patient','hospital')->get();
        $employees = Admin::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'uid', 'employee_code', 'department']);
        $patients = Patient::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'uid']);
        $associate_partners = AssociatePartner::orderBy('id', 'desc')->get(['id', 'name', 'associate_partner_id']);
        $hospitals = Hospital::orderBy('id', 'desc')->get(['id', 'name', 'uid']);
        return view('super-admin.inter_department_document_trackings.edit.edit',  compact('claims', 'associate_partners', 'patients', 'hospitals', 'user', 'employees', 'document_inward_outward_tracking'));
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
        
        $rules = [
            'date_of_transaction'                  => 'required',
            'document_type'                        => 'required',
            'other'                                => (($request->claim_id == '') || ($request->hospital_id == '') || ($request->patient_id == '') || ($request->ap_id == '') ) ? 'required' :'',
            'document_comments'                    => $request->document_type == 'Other' ? 'required' : '',
        ];

        $messages = [
            'date_of_transaction.required'   => 'Please enter date of transaction',
        ];         

        $this->validate($request, $rules, $messages);

        $documentinwardoutwardtracking   =   InterDepartmentDocumentTracking::where('id',$id)->update([
            'user_id'                           => $request->user_id,
            'date_of_transaction'               => Carbon::parse($request->date_of_transaction)->format('Y-m-d'),
            'document_type'                     => $request->document_type,
            'claim_id'                          => $request->claim_id,
            'patient_name'                      => $request->patient_name,
            'patient_id'                        => $request->patient_id,
            'ap_name'                           => $request->ap_name,
            'ap_id'                             => $request->ap_id,
            'hospital_name'                     => $request->hospital_name,
            'hospital_id'                       => $request->hospital_id,
            'other'                             => $request->other,
            'employee_name'                     => $request->employee_name,
            'employee_id'                       => $request->employee_id,
            'department'                        => $request->department,
            'document_comments'                 => $request->document_comments,
        ]);

        return redirect()->route('super-admin.inter-department-docs-tracking.index')->with('success', 'Document Inward Outward Tracking updated successfully');          
    
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
