@extends('layouts.super-admin')
@section('title', 'New Assessment Status')
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
                            <li class="breadcrumb-item active">Pending for Final-Assessment</li>
                        </ol>
                    </div>
                    <h4 class="page-title"> Pending for Final-Assessment</h4>
                </div>
            </div>
        </div>
        @include('super-admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-12">
   

                <div class="tab-content">
                    <div class="tab-pane show active" id="assessment_status_tab">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('super-admin.assessment-status.update-assessment-status', $claim->id) }}"
                                    method="POST" id="pre-assessment-status-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="form_type" value="pre-assessment-status-form">
                                    <div class="form-group row">
                                        <div class="col-md-6 mt-3">
                                            <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" id="patient_id"
                                                name="patient_id" maxlength="60" placeholder="Enter Patient Id"
                                                value="{{ old('patient_id', @$claim->patient->uid) }}">
                                            @error('patient_id')
                                                <span id="patient-id-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label for="claim_id">Claim ID <span class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" id="claim_id"
                                                name="claim_id" maxlength="60" placeholder="Enter Claim Id"
                                                value="{{ old('claim_id', @$claim->uid) }}">
                                            @error('claim_id')
                                                <span id="claim-id-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                               


                                        <div class="col-md-12 mt-3">
                                            <label for="patient_firstname">Patient Name <span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-3 mt-1">
                                            <select class="form-control" id="patient_title" name="patient_title">
                                                <option disabled value="">Select</option>
                                                <option disabled @if (old('patient_title', @$claim->patient->title) == 'Mr.') selected @endif
                                                    value="Mr.">Mr.</option>
                                                <option disabled @if (old('patient_title', @$claim->patient->title) == 'Ms.') selected @endif
                                                    value="Ms.">Ms.</option>
                                            </select>
                                            @error('patient_title')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mt-1">
                                            <input type="text" readonly maxlength="25" class="form-control"
                                                id="patient_lastname" name="patient_lastname" maxlength="30"
                                                placeholder="Last name"
                                                value="{{ old('patient_lastname', @$claim->patient->lastname) }}">
                                            @error('patient_lastname')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mt-1">
                                            <input type="text" readonly maxlength="25" class="form-control"
                                                id="patient_firstname" name="patient_firstname" maxlength="15"
                                                placeholder="First name"
                                                value="{{ old('patient_firstname', @$claim->patient->firstname) }}">
                                            @error('patient_firstname')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mt-1">
                                            <input type="text" readonly maxlength="25" class="form-control"
                                                id="patient_middlename" name="patient_middlename" maxlength="30"
                                                placeholder="Middle name"
                                                value="{{ old('patient_middlename', @$claim->patient->middlename) }}">
                                            @error('patient_middlename')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label for="hospital_id">Hospital Id <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" id="hospital_id"
                                                name="hospital_id" placeholder="Enter Hospital Id"
                                                value="{{ old('hospital_id', @$claim->patient->hospital->uid) }}">
                                            @error('hospital_id')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>                     

                                        <div class="col-md-6 mt-3">
                                            <label for="hospital_name">Hospital Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" id="hospital_name"
                                                name="hospital_name" placeholder="Enter Hospital Name"
                                                value="{{ old('hospital_name', @$claim->patient->hospital->name) }}">
                                            @error('hospital_name')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="hospital_address">Hospital Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" id="hospital_address"
                                                name="hospital_address" placeholder="Address Line"
                                                value="{{ old('hospital_address', @$claim->patient->hospital->address) }}">
                                            @error('hospital_address')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <input type="text" readonly class="form-control" id="hospital_city"
                                                name="hospital_city" placeholder="City"
                                                value="{{ old('hospital_city', @$claim->patient->hospital->city) }}">
                                            @error('hospital_city')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <input type="text" readonly class="form-control" id="hospital_state"
                                                name="hospital_state" placeholder="State"
                                                value="{{ old('hospital_state', @$claim->patient->hospital->state) }}">
                                            @error('hospital_state')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <input type="number" readonly class="form-control" id="hospital_pincode"
                                                name="hospital_pincode" placeholder="Pincode"
                                                value="{{ old('hospital_pincode', @$claim->patient->hospital->pincode) }}">
                                            @error('hospital_pincode')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mt-3">
                                            <label for="associate_partner_id">Associate Partner ID (Name) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="associate_partner_id"
                                                name="associate_partner_id" placeholder="Associate Partner ID"
                                                value="{{ old('associate_partner_id',@$claim->associate_partner_id) }}">
                                            @error('associate_partner_id')
                                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mt-3">
                                            <label for="date_of_admission">Claim ID Creation Date & Time <span class="text-danger">*</span></label>
                                            <input type="text" disabled class="form-control" id="date_of_admission" name="date_of_admission"
                                            value="{{ old('date_of_admission', @$claim->created_at) }}" placeholder="DD-MM-YYYY" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                            @error('date_of_admission', 'claim-processing-form')
                                            <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>




                                        <div class="col-md-12 mt-3">
                                            <label for="assign_to">Assign to <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" onchange="setStatus();" id="assign_to"
                                                name="assign_to">

                                                <option value="">Please Select</option>
                                                @foreach($admins as $admin)
                                                <option value="{{ $admin->id }}" >{{ $admin->employee_code.'['. $admin->name .']'  }} </option>
                                               @endforeach
                                                
                                            </select>
                                            @error('assign_to')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>


                                         

                                        
                                        

                                        <div class="col-md-12 text-end mt-3">
                                            <button type="submit" class="btn btn-success"
                                                form="pre-assessment-status-form">Assign for Pre-Assessment
                                                </button>
                                        </div>

                                    </form>


                                        <form action="{{ route('super-admin.assessment-status.update-assessment-status', $claim->id) }}"
                                    method="POST" id="final-assessment-status-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="form_type" value="final-assessment-status-form">


                                        <div class="col-md-12 mt-3">
                                            <label for="assign_to">Re-Assign to <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" onchange="setStatus();" id="assign_to"
                                                name="assign_to">
                                                <option value="">Please Select</option>
                                                
                                                @foreach($admins as $admin)
                                                <option value="{{ $admin->id }}" >{{ $admin->employee_code.'['. $admin->name .']'  }} </option>
                                               @endforeach

                                            </select>
                                            @error('assign_to')
                                                <span id="name-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="col-md-12 text-end mt-3">
                                            <button type="submit" class="btn btn-success"
                                                form="pre-assessment-status-form">Re-Assign
                                                </button>
                                        </div>

                                    </form>


                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('super-admin.assessment-status.update-assessment-status', $claim->id) }}"
                                    method="POST" id="final-assessment-status-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="form_type" value="final-assessment-status-form">
                                    <div class="form-group row">
                                        <div class="col-md-12 mt-3">
                                            <label for="final_assessment_status">Status <span
                                                    class="text-danger"></span></label>
                                            <select class="form-select final_assessment_status" onchange="setStatusFinal();" id="final_assessment_status"
                                                name="final_assessment_status">
                                                <option value="">Select</option>
                                                <option value="Waiting for Final-Assessment"
                                                    {{ old('final_assessment_status', isset($assessment_status) ? $assessment_status->final_assessment_status : '') == 'Waiting for Pre-Assessment' ? 'selected' : '' }}>
                                                    Waiting for Pre-Assessment </option>
                                                <option value="Query Raised by BHC Team"
                                                    {{ old('final_assessment_status', isset($assessment_status) ? $assessment_status->final_assessment_status : '') == 'Query Raised by BHC Team' ? 'selected' : '' }}>
                                                    Query Raised by BHC Team</option>
                                                    <option value="Non Admissible as per the Policy TC" {{ old('final_assessment_status', isset($assessment_status) ? $assessment_status->final_assessment_status : '') == 'Non Admissible as per the Policy TC' ? 'selected' : '' }}>Non Admissible as per the Policy TC</option>
                                                    <option value="Non Admissible as per the Treatment Received" {{ old('final_assessment_status', isset($assessment_status) ? $assessment_status->final_assessment_status : '') == 'Non Admissible as per the Treatment Received' ? 'selected' : '' }}>Non Admissible as per the Treatment Received</option>
                                                    <option value="Admissible" {{ old('final_assessment_status', isset($assessment_status) ? $assessment_status->final_assessment_status : '') == 'Admissible' ? 'selected' : '' }}>Admissible</option>
                                            </select>
                                            @error('final_assessment_status')
                                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

</script>
@endpush
