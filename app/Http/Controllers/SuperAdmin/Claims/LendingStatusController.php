<?php

namespace App\Http\Controllers\SuperAdmin\Claims;

use App\Http\Controllers\Controller;
use App\Models\AssessmentStatus;
use App\Models\Borrower;
use App\Models\Claimant;
use App\Models\Insurer;
use App\Models\LendingStatus;
use App\Models\VendorServiceType;
use Illuminate\Http\Request;

class LendingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $claimant           = Claimant::with('claim')->find($id);
        $borrower           = Borrower::where('claimant_id', $id)->first();
        $assessment         = AssessmentStatus::where('claimant_id', $id)->first();
        $lending_exists     = LendingStatus::where('claimant_id', $id)->exists();
        $lending_status     = $lending_exists ? LendingStatus::where('borrower_id', $borrower->id)->first() : null;
        $insurers           = Insurer::get();

        $associates = VendorServiceType::join('associate_partners', 'associate_partners.id', 'vendor_service_types.associate_partner_id')->where('vendor_service_types.medical_lending_patient', 'yes')->get(['associate_partners.id', 'associate_partners.name', 'associate_partners.associate_partner_id']);

        return view('super-admin.claims.claimants.edit.lending-status', compact('claimant', 'assessment', 'lending_status', 'insurers', 'borrower', 'associates'));
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
        $claimant      = Claimant::with('claim')->find($id);
        $borrower      = Borrower::where('claimant_id', $id)->first();
        $assessment    = AssessmentStatus::where('claimant_id', $id)->first();

        if (!$borrower || !$claimant || !$assessment) {
            return redirect()->back()->with('warning', 'Please create/update borrower and/or assessment first!');
        }

        $lending       = LendingStatus::updateOrCreate(
            ['claimant_id'  => $id,
            'borrower_id'   => $borrower->id,
        ],
            [
            'patient_id'      => $claimant->claim_id,
            'claim_id'      => $claimant->claim_id,
            'claimant_id'   => $claimant->id,
            'hospital_id'   => $claimant->hospital_id]
        );

        switch ($request->form_type) {
            case 'loan-application-form':
                $rules = [    
                    'medical_lending_type'              =>'required',
                    'vendor_partner_name_nbfc_or_bank'  =>'required',
                    'vendor_partner_id'                 =>'required|max:40',
                ];
                
                $messages =  [   
                    'medical_lending_type.required'             =>'Please Enter medical lending type',
                    'vendor_partner_name_nbfc_or_bank.required' =>'Please select vendor partner name nbfc or bank',
                    'vendor_partner_id.required'                =>'Please Enter vendor partner id',                                           
                ];
                
                $this->validate($request, $rules, $messages);

                LendingStatus::where('claimant_id', $id)->update([                   
                    'medical_lending_type'              =>  $request->medical_lending_type,
                    'vendor_partner_name_nbfc_or_bank'  =>  $request->vendor_partner_name_nbfc_or_bank,
                    'vendor_partner_id'                 =>  $request->vendor_partner_id,
                    'loan_application_comments'         =>  $request->loan_application_comments,            
                ]);

                break;

            case 'loan-application-status-form':
                $rules = [
                    'date_of_loan_application'  => ($request->applyloan == 1) ? 'required' : '',   
                    'loan_id_or_no'             => ($request->applyloan == 1) ? 'required|max:20' : '',
                    'loan_status'               => ($request->applyloan == 1) ? 'required' : '',   
                ];
                
                $messages =  [
                    'date_of_loan_application.required'       =>'Please Enter date of loan application',   
                    'loan_id_or_no.required'                  =>'Please Enter loan id or no',    
                    'loan_status.required'                    =>'Please Enter loan status',
                   
                    
                ];
                
                $this->validate($request, $rules, $messages);

                LendingStatus::where('claimant_id', $id)->update([                   
                    'date_of_loan_application'                  => $request->date_of_loan_application,
                    'time_of_loan_application'                  => $request->time_of_loan_application,
                    'date_of_loan_re_application'               => $request->date_of_loan_re_application,
                    'time_of_loan_re_application'               => $request->time_of_loan_re_application,
                    'loan_id_or_no'                             => $request->loan_id_or_no,
                    'loan_status'                               => $request->loan_status,
                    'loan_approved_amount'                      => $request->loan_approved_amount,
                    'loan_disbursed_amount'                     => $request->loan_disbursed_amount,
                    'date_of_loan_disbursement'                 => $request->date_of_loan_disbursement,
                    'loan_tenure'                               => $request->loan_tenure,
                    'loan_instalments'                          => $request->loan_instalments,
                    'loan_start_date'                           => $request->loan_start_date,
                    'loan_end_date'                             => $request->loan_end_date,
                    'insurance_claim_settlement_date'           => $request->insurance_claim_settlement_date,
                    'insurance_claim_settled_amount'            => $request->insurance_claim_settled_amount,
                    'insurance_claim_amount_disbursement_date'  => $request->insurance_claim_amount_disbursement_date,
                    'loan_application_status_comments'          => $request->loan_application_status_comments,          
                ]);
                break;
            case 'loan-reapplication-form':
                LendingStatus::where('claimant_id', $id)->update([                   
                    're_apply_loan_amount'                  =>  $request->re_apply_loan_amount,
                    'loan_re_application_status_comments'   =>  $request->loan_re_application_status_comments,                         
                ]);
                break;
            default:
                # code...
                break;
            
        }
        return redirect()->back()->with('success', 'Lending status updated successfully');
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
