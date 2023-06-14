@extends('layouts.super-admin')
@section('title', 'Create Admin')
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
                            <li class="breadcrumb-item active">Inter Department Document Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Inter Department Document Update    </h4>
                </div>
            </div>
        </div>
        @include('super-admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-12">
                <div class="card no-shadow">
                    <div class="card-body">
                        <form action="{{ route('super-admin.inter-department-docs-tracking.update', $document_inward_outward_tracking->id ) }}" method="post" id="DocumentIOTrackingForm"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-6 mt-3">
                                    <label for="user_id">User Id <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="user_id"
                                        name="user_id" readonly value="{{ old('user_id', $user->id) }}" placeholder="User Id" >
                                    @error('user_id')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="date_of_transaction">Date of Transaction <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="date_of_transaction" max="{{ date('Y-m-d') }}"
                                        name="date_of_transaction" value="{{ old('date_of_transaction', $document_inward_outward_tracking->date_of_transaction) }}" placeholder="Date of Transaction"
                                        data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                    @error('date_of_transaction')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="document_type">Document Type <span class="text-danger">*</span></label>
                                    <select class="form-select" id="document_type" name="document_type"
                                        onchange=setMedicineOption();>
                                        <option value="">Select</option>
                                        <option value="Main Claim" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'Main Claim' ? 'selected' : '' }}>
                                            Main Claim
                                        </option>
                                        <option value="Pre" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'Pre' ? 'selected' : '' }}>Pre
                                        </option>
                                        <option value="Post" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'Post' ? 'selected' : '' }}>
                                            Post
                                        </option>
                                        <option value="Insurance Claim Form" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'Insurance Claim Form' ? 'selected' : '' }}>
                                            Insurance Claim Form
                                        </option>
                                        <option value="Cancel Cheque" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'Cancel Cheque' ? 'selected' : '' }}>Cancel Cheque
                                        </option>
                                        <option value="MoU" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'MoU' ? 'selected' : '' }}>MoU
                                        </option>
                                        <option value="Other" {{ old('document_type', $document_inward_outward_tracking->document_type) == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    @error('document_type')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="claim_id">Claim ID <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="claim_id" name="claim_id"
                                        data-toggle="select2" onchange="setPatient()">
                                        <option value="">Search Claim ID</option>
                                        @foreach ($claims as $row)
                                            <option value="{{ $row->uid }}"
                                                {{ old('claim_id', $document_inward_outward_tracking->claim_id) == $row->uid ? 'selected' : '' }}
                                                data-patient-id="{{ $row->patient->id }}"
                                                data-patient-uid="{{ $row->patient->uid }}"
                                                data-firstname="{{ $row->patient->firstname }}"
                                                data-middlename="{{ $row->patient->middlename }}"
                                                data-lastname="{{ $row->patient->lastname }}"
                                                data-hospital-id="{{ $row->patient->hospital->id }}"
                                                data-hospital-uid="{{ $row->patient->hospital->uid }}"
                                                data-hospital-name="{{ $row->patient->hospital->name }}"
                                                data-asp-uid="{{ $row->patient->associate_partner_id }}"
                                                data-asp-id="{{ @$row->patient->associatePartner->id }}"
                                                data-asp-name="{{ @$row->patient->associatePartner->name }}"
                                                >
                                                {{ $row->uid }}
                                        @endforeach
                                    </select>
                                    @error('claim_id')
                                        <span id="claim-id-error"
                                            class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="patient_name">Patient Name <span class="text-danger">*</span></label>
                                    <select class="form-control select2" @if(isset($patient) && !empty($patient)) disabled @endif id="patient_name" name="patient_name" data-toggle="select2" onchange="setPatienId()" >
                                        <option value="">Enter Patient ID</option>
                                        @foreach ($patients as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('patient_name', isset($patient) ? $patient->id : '') == $row->id ? 'selected' : '' }}
                                                data-patient-uid="{{ $row->uid }}"
                                                >
                                                {{ $row->uid }}
                                        @endforeach
                                    </select>
                                    @error('patient_name')
                                        <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="patient_id" name="patient_id"  placeholder="Patient Id" value="{{ old('patient_id', $document_inward_outward_tracking->patient_id) }}">
                                    @error('patient_id')
                                        <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="ap_name">Associate Partner Name <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" id="ap_name" name="ap_name"
                                        data-toggle="select2" onchange="setAPId()">
                                        <option value="">Select Associate Partner</option>
                                        @foreach ($associate_partners as $associate)
                                            <option value="{{ $associate->id }}"
                                                {{ old('ap_name') == $associate->name ? 'selected' : '' }}
                                                data-ap-uid="{{ $associate->associate_partner_id }}"
                                                data-id="{{ $associate->associate_partner_id }}">
                                                [<strong>Name: </strong>{{ $associate->name }}]</option>
                                        @endforeach
                                    </select>
                                    @error('ap_name')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="ap_id">Associate Partner ID <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="ap_id" name="ap_id"
                                        placeholder="Associate Partner ID" value="{{ old('ap_id', $document_inward_outward_tracking->ap_id) }}"
                                        @isset($patient) readonly @endisset>
                                    @error('ap_id')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="hospital_name" name="hospital_name"
                                        data-toggle="select2" onchange="setHospitalId()">
                                        <option value="">Search Hospital ID</option>
                                        @foreach ($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}"
                                                {{ old('hospital_name') == $hospital->id ? 'selected' : '' }}
                                                data-hospital-uid="{{ $hospital->uid }}"
                                                >
                                                {{ $hospital->uid }}
                                                [<strong>Name: </strong> {{ $hospital->name }}]
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hospital_name')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="hospital_id">Hospital Id <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="hospital_id" name="hospital_id"
                                        placeholder="Enter Hospital Name" value="{{ old('hospital_id', $document_inward_outward_tracking->hospital_id) }}">
                                    @error('hospital_id')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="other">Other <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" id="other" name="other"
                                         placeholder="Enter Other" maxlength="60" value="{{ old('other', $document_inward_outward_tracking->other) }}">
                                    @error('other')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="col-md-6 mt-3">
                                    <label for="employee_name">Employee Name <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" id="employee_name" data-toggle="select2"
                                        name="employee_name" onchange="setEmployeeId()">
                                        <option value="">Select Employee Name</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                {{ old('employee_name', $document_inward_outward_tracking->employee_name) == $employee->id ? 'selected' : '' }}
                                                data-employee-uid="{{ $employee->employee_code }}"
                                                data-employee-department="{{ $employee->department }}"
                                                >
                                                [<strong>Name: </strong>{{ $employee->firstname }} {{ $employee->lastname }}]</option>
                                        @endforeach
                                    </select>
                                    @error('employee_name')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="employee_id">Employee Id <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="employee_id" name="employee_id"
                                        placeholder="Enter Employee Id" value="{{ old('employee_id', $document_inward_outward_tracking->employee_id) }}">
                                    @error('employee_id')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="department">Department <span class="text-danger">*</span></label>
                                    <select class="form-select" id="department" name="department">
                                        <option value="">Select Department</option>
                                        <option value="Operations"
                                            {{ old('department', $document_inward_outward_tracking->department) == 'Operations' ? 'selected' : '' }}>Operations
                                        </option>
                                        <option value="Sales" {{ old('department', $document_inward_outward_tracking->department) == 'Sales' ? 'selected' : '' }}>Sales
                                        </option>
                                        <option value="Accounts" {{ old('department', $document_inward_outward_tracking->department) == 'Accounts' ? 'selected' : '' }}>
                                            Accounts
                                        </option>
                                        <option value="Analytics & MIS"
                                            {{ old('department', $document_inward_outward_tracking->department) == 'Analytics & MIS' ? 'selected' : '' }}>Analytics & MIS
                                        </option>
                                        <option value="IT" {{ old('department', $document_inward_outward_tracking->department) == 'IT' ? 'selected' : '' }}>IT
                                        </option>
                                        <option value="Product Management"
                                            {{ old('department', $document_inward_outward_tracking->department) == 'Product Management' ? 'selected' : '' }}>Product
                                            Management
                                        </option>
                                        <option value="Provider management"
                                            {{ old('department', $document_inward_outward_tracking->department) == 'Provider management' ? 'selected' : '' }}>Provider
                                            management
                                        </option>
                                        <option value="Insurance"
                                            {{ old('department', $document_inward_outward_tracking->department) == 'Insurance' ? 'selected' : '' }}>Insurance
                                        </option>
                                        <option value="Claims Processing"
                                            {{ old('department', $document_inward_outward_tracking->department) == 'Claims Processing' ? 'selected' : '' }}>Claims
                                            Processing
                                        </option>
                                        <option value="Cashless" {{ old('department', $document_inward_outward_tracking->department) == 'Cashless' ? 'selected' : '' }}>
                                            Cashless
                                        </option>
                                        <option value="Lending" {{ old('department', $document_inward_outward_tracking->department) == 'Lending' ? 'selected' : '' }}>
                                            Lending
                                        </option>
                                    </select>
                                    @error('department')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="document_comments">Document Comments </label>
                                    <textarea class="form-control" id="document_comments" name="document_comments" maxlength="60" placeholder="Document Comments"
                                        rows="5">{{ old('document_comments', $document_inward_outward_tracking->document_comments) }}</textarea>
                                    @error('document_comments')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success" form="DocumentIOTrackingForm">Create
                                        Admin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        setPatient();
        setPatienId();
        setAPId();
        setEmployeeId();
        setHospitalId();
        setFormTo();
    });

    function setPatienId() {                               

        var hospital_uid = $("#patient_name").select2().find(":selected").data("patient-uid");

        $('#patient_id').val(hospital_uid);
    }

    function setAPId() {                               

        var hospital_uid = $("#ap_name").select2().find(":selected").data("ap-uid");

        $('#ap_id').val(hospital_uid);
    }

    function setHospitalId() {                               

        var hospital_uid = $("#hospital_name").select2().find(":selected").data("hospital-uid");

        $('#hospital_id').val(hospital_uid);
    }

    function setPatient() {                               

        var patient_id            = $("#claim_id").select2().find(":selected").data("patient-id");
        var patient_uid           = $("#claim_id").select2().find(":selected").data("patient-uid");
        var patient_name          = $("#claim_id").select2().find(":selected").data("firstname")+ ' '+$("#claim_id").select2().find(":selected").data("middlename")+ ' '+$("#claim_id").select2().find(":selected").data("lastname");
        var hospital_id           = $("#claim_id").select2().find(":selected").data("hospital-id");
        var hospital_uid          = $("#claim_id").select2().find(":selected").data("hospital-uid");
        var hospital_name         = $("#claim_id").select2().find(":selected").data("hospital-name");
        var asp_id                = $("#claim_id").select2().find(":selected").data("asp-id");
        var asp_uid               = $("#claim_id").select2().find(":selected").data("asp-uid");
        var asp_name              = $("#claim_id").select2().find(":selected").data("asp-name");   


        $('#patient_id').val(patient_uid);
        $('#patient_name').val(patient_id).trigger('change');
        $('#ap_id').val(asp_uid);
        $('#ap_name').val(asp_id).trigger('change');
        $('#hospital_id').val(hospital_uid);
        $('#hospital_name').val(hospital_id).trigger('change');
    }

</script>
<script>
    $(function(){
        $('#admission_date').datepicker({
            endDate: '+0d',
            autoclose: true
        });
    });

</script>
<script>

    function setEmployeeId() {                               

        var hospital_uid          = $("#employee_name").select2().find(":selected").data("employee-uid");
        var hospital_department          = $("#employee_name").select2().find(":selected").data("employee-department");

        $('#employee_id').val(hospital_uid);
        $('#department').val(hospital_department);
    }

    function setFormTo(){
        var transaction_type = $('#transaction_type').val();
        switch (transaction_type) {
                case 'Inward':
                    $("#from_to").val('From').trigger('change');
                    break;
                case 'Outward':
                    $("#from_to").val('To').trigger('change');
                    break;
                default:
                     $("#from_to").val('').trigger('change');
                    break;
            }
    }

</script>
@endpush

