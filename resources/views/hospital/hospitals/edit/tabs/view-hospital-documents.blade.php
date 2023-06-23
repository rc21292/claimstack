@extends('layouts.hospital')
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
                            <li class="breadcrumb-item"><a href="{{ route('hospital.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Associate Partner</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Documents</h4>
                </div>
            </div>
        </div>
        @include('hospital.sections.flash-message')
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
                                            Hospital
                                        </span>
                                    </div>

                                </div>
                                <div class="d-flex flex-row align-items-center m-2 text-white">
                                    <p class="mb-0 me-2"><br> Hospital Documents</p>
                                </div>                        
                            </div>
                            <div class="col-12 nav nav-tabs custom-tab" id="myTab" style="font-size: 17px;">
                                <a  class="px-1 active" href="#tab1" data-bs-toggle="tab">Hospital Documents</a> 
                                <a  class="px-1" href="#tab2" data-bs-toggle="tab">Hospital Tariff</a> 
                                <a  class="px-1" href="#tab3" data-bs-toggle="tab">BCH Agreement</a> 
                                <a  class="px-1" href="#tab6" data-bs-toggle="tab">Hospital Facilities</a> 
                                <a  class="px-1" href="#tab4" data-bs-toggle="tab">Hospital Infrastructure</a> 
                                <a  class="px-1" href="#tab5" data-bs-toggle="tab">Hospital Department</a> 
                                <a  class="px-1" href="#tab7" data-bs-toggle="tab">Hospital Empanelment Status</a> 
                                <a  class="px-1" href="#tab8" data-bs-toggle="tab">Other Documents</a>
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <table class="table">
                                            <tbody>

                                               <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_pan_card) }}" @if(!isset($reimbursementdocument->hospital_pan_card)) style="color:#333336;pointer-events: none" @endif >Hospital PAN No.</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_pan_card) }}" download @if(!isset($reimbursementdocument->hospital_pan_card)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>

                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_pan_card']) && $document_files['hospital_pan_card'])
                                                @foreach($document_files['hospital_pan_card'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital PAN No.{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif     


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_rohini_certificate) }}" @if(!isset($reimbursementdocument->hospital_rohini_certificate)) style="color:#333336;pointer-events: none" @endif >Rohini Code</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_rohini_certificate) }}" download @if(!isset($reimbursementdocument->hospital_rohini_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>

                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_rohini_certificate']) && $document_files['hospital_rohini_certificate'])
                                                @foreach($document_files['hospital_rohini_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Rohini Code{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif     
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_tan_certificate) }}" @if(!isset($reimbursementdocument->hospital_tan_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital TAN No.</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_tan_certificate) }}" download @if(!isset($reimbursementdocument->hospital_tan_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>

                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_tan_certificate']) && $document_files['hospital_tan_certificate'])
                                                @foreach($document_files['hospital_tan_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital TAN No.{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif    
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_gst_certificate) }}" @if(!isset($reimbursementdocument->hospital_gst_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital GST No.</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_gst_certificate) }}" download @if(!isset($reimbursementdocument->hospital_gst_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_gst_certificate']) && $document_files['hospital_gst_certificate'])
                                                @foreach($document_files['hospital_gst_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital GST No.{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif     

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->medical_superintendents_registration_certificate) }}" @if(!isset($reimbursementdocument->medical_superintendents_registration_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital Medical Superintendent's Registration No.</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->medical_superintendents_registration_certificate) }}" download @if(!isset($reimbursementdocument->medical_superintendents_registration_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['medical_superintendents_registration_certificate']) && $document_files['medical_superintendents_registration_certificate'])
                                                @foreach($document_files['medical_superintendents_registration_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Medical Superintendent's Registration No.{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif
                                                
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_pollution_clearance_certificate) }}" @if(!isset($reimbursementdocument->hospital_pollution_clearance_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital Pollution Clearance Certificate</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_pollution_clearance_certificate) }}" download @if(!isset($reimbursementdocument->hospital_pollution_clearance_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_pollution_clearance_certificate']) && $document_files['hospital_pollution_clearance_certificate'])
                                                @foreach($document_files['hospital_pollution_clearance_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Pollution Clearance Certificate{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_fire_safety_clearance_certificate) }}" @if(!isset($reimbursementdocument->hospital_fire_safety_clearance_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital Fire Safety Clearance Certificate</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_fire_safety_clearance_certificate) }}" download @if(!isset($reimbursementdocument->hospital_fire_safety_clearance_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_fire_safety_clearance_certificate']) && $document_files['hospital_fire_safety_clearance_certificate'])
                                                @foreach($document_files['hospital_fire_safety_clearance_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Fire Safety Clearance Certificate{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_certificate_of_incorporation) }}" @if(!isset($reimbursementdocument->hospital_certificate_of_incorporation)) style="color:#333336;pointer-events: none" @endif >Hospital Certificate of Incorporation</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_certificate_of_incorporation) }}" download @if(!isset($reimbursementdocument->hospital_certificate_of_incorporation)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_certificate_of_incorporation']) && $document_files['hospital_certificate_of_incorporation'])
                                                @foreach($document_files['hospital_certificate_of_incorporation'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Certificate of Incorporation{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_cancel_cheque) }}" @if(!isset($reimbursementdocument->hospital_cancel_cheque)) style="color:#333336;pointer-events: none" @endif >Cancel Cheque</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_cancel_cheque) }}" download @if(!isset($reimbursementdocument->hospital_cancel_cheque)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_cancel_cheque']) && $document_files['hospital_cancel_cheque'])
                                                @foreach($document_files['hospital_cancel_cheque'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Cancel Cheque{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabh_certificate) }}" @if(!isset($reimbursementdocument->nabh_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital NABH Registration</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabh_certificate) }}" download @if(!isset($reimbursementdocument->nabh_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['nabh_certificate']) && $document_files['nabh_certificate'])
                                                @foreach($document_files['nabh_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital NABH Registration{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabl_certificate) }}" @if(!isset($reimbursementdocument->nabl_certificate)) style="color:#333336;pointer-events: none" @endif >Hospital NABL Registration No.</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabl_certificate) }}" download @if(!isset($reimbursementdocument->nabl_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['nabl_certificate']) && $document_files['nabl_certificate'])
                                                @foreach($document_files['nabl_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital NABL Registration No.{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->iso_certificates) }}" @if(!isset($reimbursementdocument->iso_certificates)) style="color:#333336;pointer-events: none" @endif >ISO Status</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->iso_certificates) }}" download @if(!isset($reimbursementdocument->iso_certificates)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['iso_certificates']) && $document_files['iso_certificates'])
                                                @foreach($document_files['iso_certificates'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">ISO Status{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

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
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->indoor_care_paper_file) }}" @if(!isset($reimbursementdocument->indoor_care_paper_file)) style="color:#333336;pointer-events: none" @endif >Indoor Care Paper</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->indoor_care_paper_file) }}" download @if(!isset($reimbursementdocument->indoor_care_paper_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['indoor_care_paper_file']) && $document_files['indoor_care_paper_file'])
                                                @foreach($document_files['indoor_care_paper_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Indoor Care Paper{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ecg_report_file) }}" @if(!isset($reimbursementdocument->ecg_report_file)) style="color:#333336;pointer-events: none" @endif >ECG Report</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ecg_report_file) }}" download @if(!isset($reimbursementdocument->ecg_report_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['ecg_report_file']) && $document_files['ecg_report_file'])
                                                @foreach($document_files['ecg_report_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">ECG Report{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ct_mri_usg_hpe_investigation_report_file) }}" @if(!isset($reimbursementdocument->ct_mri_usg_hpe_investigation_report_file)) style="color:#333336;pointer-events: none" @endif >CT/MRI/USG/HPE investigation Report</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ct_mri_usg_hpe_investigation_report_file) }}" download @if(!isset($reimbursementdocument->ct_mri_usg_hpe_investigation_report_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['ct_mri_usg_hpe_investigation_report_file']) && $document_files['ct_mri_usg_hpe_investigation_report_file'])
                                                @foreach($document_files['ct_mri_usg_hpe_investigation_report_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">CT/MRI/USG/HPE investigation Report{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->diagnostic_or_investigation_reports_file) }}" @if(!isset($reimbursementdocument->diagnostic_or_investigation_reports_file)) style="color:#333336;pointer-events: none" @endif >Diagnostic / Investigation Reports</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->diagnostic_or_investigation_reports_file) }}" download @if(!isset($reimbursementdocument->diagnostic_or_investigation_reports_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['diagnostic_or_investigation_reports_file']) && $document_files['diagnostic_or_investigation_reports_file'])
                                                @foreach($document_files['diagnostic_or_investigation_reports_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Diagnostic / Investigation Reports{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->doctor’s_reference_slip_for_investigation_file) }}" @if(!isset($reimbursementdocument->doctor’s_reference_slip_for_investigation_file)) style="color:#333336;pointer-events: none" @endif >Doctor’s reference slip for Investigation</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->doctor’s_reference_slip_for_investigation_file) }}" download @if(!isset($reimbursementdocument->doctor’s_reference_slip_for_investigation_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['doctor’s_reference_slip_for_investigation_file']) && $document_files['doctor’s_reference_slip_for_investigation_file'])
                                                @foreach($document_files['doctor’s_reference_slip_for_investigation_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Doctor’s reference slip for Investigation{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->operation_theatre_notes_file) }}" @if(!isset($reimbursementdocument->operation_theatre_notes_file)) style="color:#333336;pointer-events: none" @endif >Operation Theatre Notes</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->operation_theatre_notes_file) }}" download @if(!isset($reimbursementdocument->operation_theatre_notes_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['operation_theatre_notes_file']) && $document_files['operation_theatre_notes_file'])
                                                @foreach($document_files['operation_theatre_notes_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Operation Theatre Notes{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->pharmacy_bills_file) }}" @if(!isset($reimbursementdocument->pharmacy_bills_file)) style="color:#333336;pointer-events: none" @endif >Pharmacy Bills</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->pharmacy_bills_file) }}" download @if(!isset($reimbursementdocument->pharmacy_bills_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['pharmacy_bills_file']) && $document_files['pharmacy_bills_file'])
                                                @foreach($document_files['pharmacy_bills_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Pharmacy Bills{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->implant_sticker_invoice_file) }}" @if(!isset($reimbursementdocument->implant_sticker_invoice_file)) style="color:#333336;pointer-events: none" @endif >Implant Sticker Invoice</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->implant_sticker_invoice_file) }}" download @if(!isset($reimbursementdocument->implant_sticker_invoice_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['implant_sticker_invoice_file']) && $document_files['implant_sticker_invoice_file'])
                                                @foreach($document_files['implant_sticker_invoice_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Implant Sticker Invoice{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_break_up_bills_file) }}" @if(!isset($reimbursementdocument->hospital_break_up_bills_file)) style="color:#333336;pointer-events: none" @endif >Hospital Break-up Bills</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_break_up_bills_file) }}" download @if(!isset($reimbursementdocument->hospital_break_up_bills_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_break_up_bills_file']) && $document_files['hospital_break_up_bills_file'])
                                                @foreach($document_files['hospital_break_up_bills_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Break-up Bills{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_main_final_bill_file) }}" @if(!isset($reimbursementdocument->hospital_main_final_bill_file)) style="color:#333336;pointer-events: none" @endif >Hospital (Main) Final Bill</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_main_final_bill_file) }}" download @if(!isset($reimbursementdocument->hospital_main_final_bill_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_main_final_bill_file']) && $document_files['hospital_main_final_bill_file'])
                                                @foreach($document_files['hospital_main_final_bill_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital (Main) Final Bill{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->discharge_or_day_care_summary_file) }}" @if(!isset($reimbursementdocument->discharge_or_day_care_summary_file)) style="color:#333336;pointer-events: none" @endif >Discharge / Day-care Summary</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->discharge_or_day_care_summary_file) }}" download @if(!isset($reimbursementdocument->discharge_or_day_care_summary_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['discharge_or_day_care_summary_file']) && $document_files['discharge_or_day_care_summary_file'])
                                                @foreach($document_files['discharge_or_day_care_summary_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Discharge / Day-care Summary{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->death_summary_from_hospital_where_applicable_file) }}" @if(!isset($reimbursementdocument->death_summary_from_hospital_where_applicable_file)) style="color:#333336;pointer-events: none" @endif >Death summary from hospital where applicable</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->death_summary_from_hospital_where_applicable_file) }}" download @if(!isset($reimbursementdocument->death_summary_from_hospital_where_applicable_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['death_summary_from_hospital_where_applicable_file']) && $document_files['death_summary_from_hospital_where_applicable_file'])
                                                @foreach($document_files['death_summary_from_hospital_where_applicable_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Death summary from hospital where applicable{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->payment_receipts_of_the_hospital_file) }}" @if(!isset($reimbursementdocument->payment_receipts_of_the_hospital_file)) style="color:#333336;pointer-events: none" @endif >Payment Receipts of the Hospital</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->payment_receipts_of_the_hospital_file) }}" download @if(!isset($reimbursementdocument->payment_receipts_of_the_hospital_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['payment_receipts_of_the_hospital_file']) && $document_files['payment_receipts_of_the_hospital_file'])
                                                @foreach($document_files['payment_receipts_of_the_hospital_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Payment Receipts of the Hospital{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->other_documents_file) }}" @if(!isset($reimbursementdocument->other_documents_file)) style="color:#333336;pointer-events: none" @endif >Other Documents</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->other_documents_file) }}" download @if(!isset($reimbursementdocument->other_documents_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['other_documents_file']) && $document_files['other_documents_file'])
                                                @foreach($document_files['other_documents_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Other Documents{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab3">
                                        <table class="table">
                                            <tbody>
                                              
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->mou_with_bhc) }}" @if(!isset($reimbursementdocument->mou_with_bhc)) style="color:#333336;pointer-events: none" @endif >Hospital Signed MOUs</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->mou_with_bhc) }}" download @if(!isset($reimbursementdocument->mou_with_bhc)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['mou_with_bhc']) && $document_files['mou_with_bhc'])
                                                @foreach($document_files['mou_with_bhc'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Signed MOUs{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->borrower_current_address_proof_file) }}" @if(!isset($reimbursementdocument->borrower_current_address_proof_file)) style="color:#333336;pointer-events: none" @endif >BHC Packages for Surgical Procedures Accepted</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->borrower_current_address_proof_file) }}" download @if(!isset($reimbursementdocument->borrower_current_address_proof_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['borrower_current_address_proof_file']) && $document_files['borrower_current_address_proof_file'])
                                                @foreach($document_files['borrower_current_address_proof_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">BHC Packages for Surgical Procedures Accepted{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->borrower_current_address_proof_file) }}" @if(!isset($reimbursementdocument->borrower_current_address_proof_file)) style="color:#333336;pointer-events: none" @endif >Lending / Finance Company's Agreement</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->borrower_current_address_proof_file) }}" download @if(!isset($reimbursementdocument->borrower_current_address_proof_file)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['borrower_current_address_proof_file']) && $document_files['borrower_current_address_proof_file'])
                                                @foreach($document_files['borrower_current_address_proof_file'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Lending / Finance Company's Agreement{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif 

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab6">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->pharmacy) }}" @if(!isset($reimbursementdocument->pharmacy)) style="color:#333336;pointer-events: none" @endif >Pharmacy</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->pharmacy) }}" download @if(!isset($reimbursementdocument->pharmacy)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['pharmacy']) && $document_files['pharmacy'])
                                                @foreach($document_files['pharmacy'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Pharmacy{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->lab) }}" @if(!isset($reimbursementdocument->lab)) style="color:#333336;pointer-events: none" @endif >Lab</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->lab) }}" download @if(!isset($reimbursementdocument->lab)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['lab']) && $document_files['lab'])
                                                @foreach($document_files['lab'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Lab{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ambulance) }}" @if(!isset($reimbursementdocument->ambulance)) style="color:#333336;pointer-events: none" @endif >Ambulance</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ambulance) }}" download @if(!isset($reimbursementdocument->ambulance)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['ambulance']) && $document_files['ambulance'])
                                                @foreach($document_files['ambulance'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Ambulance{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->operation_theatre) }}" @if(!isset($reimbursementdocument->operation_theatre)) style="color:#333336;pointer-events: none" @endif >Operation</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->operation_theatre) }}" download @if(!isset($reimbursementdocument->operation_theatre)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-operation_theatreel"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['operation_theatre']) && $document_files['operation_theatre'])
                                                @foreach($document_files['operation_theatre'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Operation{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->icu) }}" @if(!isset($reimbursementdocument->icu)) style="color:#333336;pointer-events: none" @endif >Icu</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->icu) }}" download @if(!isset($reimbursementdocument->icu)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['icu']) && $document_files['icu'])
                                                @foreach($document_files['icu'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Icu{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->iccu) }}" @if(!isset($reimbursementdocument->iccu)) style="color:#333336;pointer-events: none" @endif >ICCU</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->iccu) }}" download @if(!isset($reimbursementdocument->iccu)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-iccuel"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['iccu']) && $document_files['iccu'])
                                                @foreach($document_files['iccu'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">ICCU{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nicu) }}" @if(!isset($reimbursementdocument->nicu)) style="color:#333336;pointer-events: none" @endif >NICU</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nicu) }}" download @if(!isset($reimbursementdocument->nicu)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['nicu']) && $document_files['nicu'])
                                                @foreach($document_files['nicu'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">NICU{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->csc_sterilization) }}" @if(!isset($reimbursementdocument->csc_sterilization)) style="color:#333336;pointer-events: none" @endif >CSC (Sterilization)</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->csc_sterilization) }}" download @if(!isset($reimbursementdocument->csc_sterilization)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-csc_sterilizationel"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['csc_sterilization']) && $document_files['csc_sterilization'])
                                                @foreach($document_files['csc_sterilization'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">CSC (Sterilization){{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->centralized_gas_ons) }}" @if(!isset($reimbursementdocument->centralized_gas_ons)) style="color:#333336;pointer-events: none" @endif >Centralized-Gas (ONS)</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->centralized_gas_ons) }}" download @if(!isset($reimbursementdocument->centralized_gas_ons)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['centralized_gas_ons']) && $document_files['centralized_gas_ons'])
                                                @foreach($document_files['centralized_gas_ons'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Centralized-Gas (ONS){{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->centralized_ac) }}" @if(!isset($reimbursementdocument->centralized_ac)) style="color:#333336;pointer-events: none" @endif >Centralized-AC</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->centralized_ac) }}" download @if(!isset($reimbursementdocument->centralized_ac)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-centralized_acel"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['centralized_ac']) && $document_files['centralized_ac'])
                                                @foreach($document_files['centralized_ac'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Centralized-AC{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif 


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->kitchen) }}" @if(!isset($reimbursementdocument->kitchen)) style="color:#333336;pointer-events: none" @endif >Kitchen</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->kitchen) }}" download @if(!isset($reimbursementdocument->kitchen)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['kitchen']) && $document_files['kitchen'])
                                                @foreach($document_files['kitchen'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Kitchen{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->usg_machine) }}" @if(!isset($reimbursementdocument->usg_machine)) style="color:#333336;pointer-events: none" @endif >USG Machine</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->usg_machine) }}" download @if(!isset($reimbursementdocument->usg_machine)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['usg_machine']) && $document_files['usg_machine'])
                                                @foreach($document_files['usg_machine'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">USG Machine{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->digital_x_ray) }}" @if(!isset($reimbursementdocument->digital_x_ray)) style="color:#333336;pointer-events: none" @endif >Digital X-Ray</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->digital_x_ray) }}" download @if(!isset($reimbursementdocument->digital_x_ray)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['digital_x_ray']) && $document_files['digital_x_ray'])
                                                @foreach($document_files['digital_x_ray'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Digital X-Ray{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ct) }}" @if(!isset($reimbursementdocument->ct)) style="color:#333336;pointer-events: none" @endif >CT</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->ct) }}" download @if(!isset($reimbursementdocument->ct)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['ct']) && $document_files['ct'])
                                                @foreach($document_files['ct'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">CT{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->mri) }}" @if(!isset($reimbursementdocument->mri)) style="color:#333336;pointer-events: none" @endif >MRI</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->mri) }}" download @if(!isset($reimbursementdocument->mri)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['mri']) && $document_files['mri'])
                                                @foreach($document_files['mri'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">MRI{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->pet_scan) }}" @if(!isset($reimbursementdocument->pet_scan)) style="color:#333336;pointer-events: none" @endif >PET Scan</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->pet_scan) }}" download @if(!isset($reimbursementdocument->pet_scan)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['pet_scan']) && $document_files['pet_scan'])
                                                @foreach($document_files['pet_scan'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">PET Scan{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->organ_transplant_unit) }}" @if(!isset($reimbursementdocument->organ_transplant_unit)) style="color:#333336;pointer-events: none" @endif >Organ Transplant Unit</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->organ_transplant_unit) }}" download @if(!isset($reimbursementdocument->organ_transplant_unit)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['organ_transplant_unit']) && $document_files['organ_transplant_unit'])
                                                @foreach($document_files['organ_transplant_unit'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Organ Transplant Unit{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif 


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->burn_unit) }}" @if(!isset($reimbursementdocument->burn_unit)) style="color:#333336;pointer-events: none" @endif >Burn Unit</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->burn_unit) }}" download @if(!isset($reimbursementdocument->burn_unit)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['burn_unit']) && $document_files['burn_unit'])
                                                @foreach($document_files['burn_unit'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Burn Unit{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->dialysis_unit) }}" @if(!isset($reimbursementdocument->dialysis_unit)) style="color:#333336;pointer-events: none" @endif >Dialysis Unit</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->dialysis_unit) }}" download @if(!isset($reimbursementdocument->dialysis_unit)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['dialysis_unit']) && $document_files['dialysis_unit'])
                                                @foreach($document_files['dialysis_unit'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Dialysis Unit{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->blood_bank) }}" @if(!isset($reimbursementdocument->blood_bank)) style="color:#333336;pointer-events: none" @endif >Blood Bank</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->blood_bank) }}" download @if(!isset($reimbursementdocument->blood_bank)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['blood_bank']) && $document_files['blood_bank'])
                                                @foreach($document_files['blood_bank'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Blood Bank{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  

                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab4">
                                        <table class="table">
                                            <tbody>
                                               <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabl_certificate) }}" @if(!isset($reimbursementdocument->nabl_certificate)) style="color:#333336;pointer-events: none" @endif >NABL Approved Lab</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabl_certificate) }}" download @if(!isset($reimbursementdocument->nabl_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['nabl_certificate']) && $document_files['nabl_certificate'])
                                                @foreach($document_files['nabl_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Borrower Current Address Proof{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabh_certificate) }}" @if(!isset($reimbursementdocument->nabh_certificate)) style="color:#333336;pointer-events: none" @endif >NABH Status</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nabh_certificate) }}" download @if(!isset($reimbursementdocument->nabh_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['nabh_certificate']) && $document_files['nabh_certificate'])
                                                @foreach($document_files['nabh_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Borrower Current Address Proof{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->jci_certificate) }}" @if(!isset($reimbursementdocument->jci_certificate)) style="color:#333336;pointer-events: none" @endif >JCI Status</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->jci_certificate) }}" download @if(!isset($reimbursementdocument->jci_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['jci_certificate']) && $document_files['jci_certificate'])
                                                @foreach($document_files['jci_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Borrower Current Address Proof{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  


                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nqac_or_nhsrc_certificate) }}" @if(!isset($reimbursementdocument->nqac_or_nhsrc_certificate)) style="color:#333336;pointer-events: none" @endif >NQAC/NHSRC Status</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->nqac_or_nhsrc_certificate) }}" download @if(!isset($reimbursementdocument->nqac_or_nhsrc_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['nqac_or_nhsrc_certificate']) && $document_files['nqac_or_nhsrc_certificate'])
                                                @foreach($document_files['nqac_or_nhsrc_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Borrower Current Address Proof{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  

                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hippa_certificate) }}" @if(!isset($reimbursementdocument->hippa_certificate)) style="color:#333336;pointer-events: none" @endif >HIPPA Status</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hippa_certificate) }}" download @if(!isset($reimbursementdocument->hippa_certificate)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hippa_certificate']) && $document_files['hippa_certificate'])
                                                @foreach($document_files['hippa_certificate'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Borrower Current Address Proof{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="tab7">
                                        <table class="table">
                                            <tbody>
                                                 <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->mous_ic_or_tpa_or_govt_or_psu_or_other_corporates) }}" @if(!isset($reimbursementdocument->mous_ic_or_tpa_or_govt_or_psu_or_other_corporates)) style="color:#333336;pointer-events: none" @endif >All MoUs and Tariffs IC and TPA*</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->mous_ic_or_tpa_or_govt_or_psu_or_other_corporates) }}" download @if(!isset($reimbursementdocument->mous_ic_or_tpa_or_govt_or_psu_or_other_corporates)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['mous_ic_or_tpa_or_govt_or_psu_or_other_corporates']) && $document_files['mous_ic_or_tpa_or_govt_or_psu_or_other_corporates'])
                                                @foreach($document_files['mous_ic_or_tpa_or_govt_or_psu_or_other_corporates'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">All MoUs and Tariffs IC and TPA*{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                

                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="tab-pane fade" id="tab5">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_other_documents) }}" @if(!isset($reimbursementdocument->hospital_other_documents)) style="color:#333336;pointer-events: none" @endif >Upload</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_other_documents) }}" download @if(!isset($reimbursementdocument->hospital_other_documents)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_other_documents']) && $document_files['hospital_other_documents'])
                                                @foreach($document_files['hospital_other_documents'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Upload{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                

                                                
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="tab-pane fade" id="tab8">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_other_documents) }}" @if(!isset($reimbursementdocument->hospital_other_documents)) style="color:#333336;pointer-events: none" @endif >Hospital Other Documents</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$reimbursementdocument->hospital_other_documents) }}" download @if(!isset($reimbursementdocument->hospital_other_documents)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr>


                                                @if($document_files && (count($document_files) > 0) && isset($document_files['hospital_other_documents']) && $document_files['hospital_other_documents'])
                                                @foreach($document_files['hospital_other_documents'] as $document_file)
                                                <tr>
                                                    <td><a target="_blank" href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}">Hospital Other Documents{{ $document_file->file_id }}</a></td>
                                                    <td><a href="{{ asset('storage/uploads/hospital/documents/'.$id.'/'.$document_file->file_path) }}" download @if(!isset($document_file->file_path)) style="pointer-events: none" @else style="color:blueviolet" @endif class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                                </tr> 
                                                @endforeach
                                                @endif  
                                                
                                                

                                                
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
