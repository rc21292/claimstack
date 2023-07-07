<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentInwardOutwardTracking;
use App\Models\Patient;
use App\Models\Claim;
use App\Models\Hospital;
use App\Models\AssociatePartner;
use Auth;
use Carbon\Carbon;


class DocumentInwardOutwardTrackingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:hospital');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $document_inward_outward_trackings = DocumentInwardOutwardTracking::query();

        $filter_claim_id = $request->claim_id;
        $filter_patient_id = $request->patient_id;
        $filter_date_from_to = $request->date_from_to;


        if($filter_claim_id){
            $document_inward_outward_trackings->where('claim_id', '=',  $filter_claim_id );
        }

        if($filter_patient_id){
            $document_inward_outward_trackings->where('patient_id', '=',  $filter_patient_id );
        }

        if($filter_date_from_to){

            $d = explode('-',$filter_date_from_to);
            $document_inward_outward_trackings->whereDate('date_of_transaction', '>=',  Carbon::parse($d[0])->format('Y-m-d') );
            $document_inward_outward_trackings->whereDate('date_of_transaction','<=',Carbon::parse($d[1])->format('Y-m-d') );
        }

        $document_inward_outward_trackings = $document_inward_outward_trackings->orderBy('id', 'desc')->paginate(20);
        return view('hospital.document_inward_outward_trackings.manage',  compact('document_inward_outward_trackings', 'filter_claim_id', 'filter_patient_id', 'filter_date_from_to'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = Auth::guard('hospital')->user();              
        $claims = Claim::orderBy('id', 'desc')->with('patient','hospital')->get();
        $patients = Patient::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'uid']);
        $associate_partners = AssociatePartner::orderBy('id', 'desc')->get(['id', 'name', 'associate_partner_id']);
        $hospitals = Hospital::orderBy('id', 'desc')->get(['id', 'name', 'uid']);
        return view('hospital.document_inward_outward_trackings.create.create',  compact('claims', 'associate_partners', 'patients', 'hospitals', 'user'));
    
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
            'transaction_type'                     => 'required',
            'from_to'                              => 'required',
            'name_of_the_organization_person'      => 'required',
            'mode_of_transaction'                  => 'required',
            'courier_person_name'                  => 'required',
            'document_comments'                    => $request->document_type == 'Other' ? 'required' : '',
        ];

        $messages = [
            'date_of_transaction.required'   => 'Please enter date of transaction',
        ];         

        $this->validate($request, $rules, $messages);

        $documentinwardoutwardtracking   =   DocumentInwardOutwardTracking::create([
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
            'transaction_type'                  => $request->transaction_type,
            'from_to'                           => $request->from_to,
            'name_of_the_organization_person'   => $request->name_of_the_organization_person,
            'mode_of_transaction'               => $request->mode_of_transaction,
            'courier_person_name'               => $request->courier_person_name,
            'pod_other_number'                  => $request->pod_other_number,
            'document_comments'                 => $request->document_comments,
        ]);

        

        if ($request->hasfile('pod_other_number_file')) {
            $pod_other_number_file                    = $request->file('pod_other_number_file');
            $name                       = $pod_other_number_file->getClientOriginalName();
            $pod_other_number_file->storeAs('uploads/document-inward-outward-tracking/' . $documentinwardoutwardtracking->id . '/', $name, 'public');
            DocumentInwardOutwardTracking::where('id', $documentinwardoutwardtracking->id)->update([
                'pod_other_number_file'               =>  $name
            ]);
        }

        return redirect()->route('hospital.document-inward-outward-tracking.index')->with('success', 'Document Inward Outward Tracking created successfully');          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document_inward_outward_tracking = DocumentInwardOutwardTracking::find($id);
        return view('hospital.document_inward_outward_trackings.show',  compact('document_inward_outward_tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document_inward_outward_tracking = DocumentInwardOutwardTracking::find($id);
        $document_inward_outward_tracking->date_of_transaction = Carbon::parse($document_inward_outward_tracking->date_of_transaction)->format('d-m-Y');
        $user = Auth::guard('hospital')->user();              
        $claims = Claim::orderBy('id', 'desc')->with('patient','hospital')->get();
        $patients = Patient::orderBy('id', 'desc')->get(['id', 'firstname', 'lastname', 'uid']);
        $associate_partners = AssociatePartner::orderBy('id', 'desc')->get(['id', 'name', 'associate_partner_id']);
        $hospitals = Hospital::orderBy('id', 'desc')->get(['id', 'name', 'uid']);
        return view('hospital.document_inward_outward_trackings.edit.edit',  compact('claims', 'associate_partners', 'patients', 'hospitals', 'user', 'document_inward_outward_tracking'));
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

        if ($request->hasfile('pod_other_number_file')) {
            $pod_other_number_file                    = $request->file('pod_other_number_file');
            $name                       = $pod_other_number_file->getClientOriginalName();
            $pod_other_number_file->storeAs('uploads/document-inward-outward-tracking/' . $id . '/', $name, 'public');
            DocumentInwardOutwardTracking::where('id', $id)->update([
                'pod_other_number_file'               =>  $name
            ]);
        }

        $rules = [
            'date_of_transaction'                  => 'required',
            'document_type'                        => 'required',
            'other'                                => (($request->claim_id == '') || ($request->hospital_id == '') || ($request->patient_id == '') || ($request->ap_id == '') ) ? 'required' :'',
            'transaction_type'                     => 'required',
            'from_to'                              => 'required',
            'name_of_the_organization_person'      => 'required',
            'mode_of_transaction'                  => 'required',
            'courier_person_name'                  => 'required',
            'document_comments'                    => $request->document_type == 'Other' ? 'required' : '',
        ];

        $messages = [
            'date_of_transaction.required'   => 'Please enter date of transaction',
        ];         

        $this->validate($request, $rules, $messages);

        $documentinwardoutwardtracking   =   DocumentInwardOutwardTracking::where('id',$id)->update([
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
            'transaction_type'                  => $request->transaction_type,
            'from_to'                           => $request->from_to,
            'name_of_the_organization_person'   => $request->name_of_the_organization_person,
            'mode_of_transaction'               => $request->mode_of_transaction,
            'courier_person_name'               => $request->courier_person_name,
            'pod_other_number'                  => $request->pod_other_number,
            'document_comments'                 => $request->document_comments,
        ]);

        return redirect()->route('hospital.document-inward-outward-tracking.index')->with('success', 'Document Inward Outward Tracking updated successfully');          
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
