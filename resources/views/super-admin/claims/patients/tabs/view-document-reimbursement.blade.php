@extends('layouts.super-admin')
@section('title', 'Create Associate Partners')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Claim Stack</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Associate Partner</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Associate Partner</h4>
                </div>
            </div>
        </div>
        @include('super-admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-12">
                <div class="card no-shadow">
                    <div class="card-body p-0" >
                        <div class="" style="background:#3E4097">
                            <div class="d-flex align-items-center mb-2" >
                                <div class="flex-shrink-0">
                                    <div class="avatar-md" style="margin-top: 10px;margin-left:20px ;">
                                        <span class="avatar-title bg-success  rounded-circle"style="background: white;">
                                            Claims
                                        </span>
                                    </div>

                                </div>
                                <div class="d-flex flex-row align-items-center m-2 text-white">
                                    <p class="mb-0 me-2"><br> Claims Documents</p>
                                </div>                        
                            </div>
                            <div class="col-12 nav nav-tabs" id="myTab" >
                                <a style=" line-height: 40px; font-size: 19px;" class="text-white px-2 active" href="#tab1" c data-bs-toggle="tab">Initial Assessment</a>
                                <a style=" line-height: 40px; font-size: 19px;" class="text-white px-2" href="#tab2" data-bs-toggle="tab">Final Assessment</a>
                                <a style=" line-height: 40px; font-size: 19px;" class="text-white px-2" href="#tab3" data-bs-toggle="tab">Insurance Claim</a>
                                <a style=" line-height: 40px; font-size: 19px;" class="text-white px-2" href="#tab4" data-bs-toggle="tab">Medical Loan (Borrower)</a>
                                <a style=" line-height: 40px; font-size: 19px;" class="text-white px-2" href="#tab5" data-bs-toggle="tab">Loan (Co-Borrower)</a>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$reimbursementdocument->patient_id_proof_file) }}" >Patient ID Proof</a></td>
                                                    <td><a href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$reimbursementdocument->patient_id_proof_file) }}" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>

                                                @if($document_files && (count($document_files) > 0) && isset($document_files['patient_id_proof_file']) && $document_files['patient_id_proof_file'])
                                                @foreach($document_files['patient_id_proof_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$document_file->file_path) }}">Patient ID Proof{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$document_file->file_path) }}" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif     


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$reimbursementdocument->doctor_prescriptions_or_consultation_papers_file) }}" >Doctor Prescriptions / Consultation Papers</a></td>
                                                    <td><a href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$reimbursementdocument->doctor_prescriptions_or_consultation_papers_file) }}" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>

                                                @if($document_files && (count($document_files) > 0) && isset($document_files['doctor_prescriptions_or_consultation_papers_file']) && $document_files['doctor_prescriptions_or_consultation_papers_file'])
                                                @foreach($document_files['doctor_prescriptions_or_consultation_papers_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$document_file->file_path) }}">Doctor Prescriptions / Consultation Papers{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/reimbursement/documents/'.$reimbursementdocument->id.'/'.$document_file->file_path) }}" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif                                             
                                        

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab2">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="" >Indoor Care Paper</a></td>
                                                    <td><a href="" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>                                              

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab3">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="" >Claimant PAN Card</a></td>
                                                    <td><a href="" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>                                              

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab4">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="" >Borrower Current Address Proof</a></td>
                                                    <td><a href="" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>                                              

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab5">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="" >Co-Borrower  Current Address Proof</a></td>
                                                    <td><a href="" download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>                                              

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        
    </script>
@endpush
