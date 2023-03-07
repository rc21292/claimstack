@extends('layouts.super-admin')
@section('title', 'New Claimant')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Claimant Stack</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.claimants.index') }}">Claimant</a>
                            </li>
                            <li class="breadcrumb-item active">New Claimant</li>
                        </ol>
                    </div>
                    <h4 class="page-title">New Claimant</h4>
                </div>
            </div>
        </div>
        @include('super-admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-12">
                <div class="card no-shadow">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        @isset($claim)
                            @if ($claim->insurance_coverage == 'Yes')
                                <li class="nav-item">
                                    <a href="#claimant_creation_tab" data-bs-toggle="tab" aria-expanded="true"
                                        class="nav-link rounded-0 active">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Claimant ID Creation / Intimation</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#borrower_id_creation_tab" disabled data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Borrower ID Creation</span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="#claimant_no_tab" data-bs-toggle="tab" aria-expanded="true"
                                        class="nav-link rounded-0 active">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">No Insurance coverage found</span>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="#claimant_creation_tab" data-bs-toggle="tab" aria-expanded="true"
                                    class="nav-link rounded-0 active">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Claimant ID Creation / Intimation</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#borrower_id_creation_tab" disabled data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link rounded-0">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Borrower ID Creation</span>
                                </a>
                            </li>
                        @endisset

                    </ul>

                    <div class="tab-content">
                        @isset($claim)
                            @if ($claim->insurance_coverage == 'Yes')
                                <div class="tab-pane show active" id="claimant_creation_tab">
                                    @include('super-admin.claims.claimants.create.tabs.claimant-id-creation')
                                </div>

                                <div class="tab-pane" id="borrower_id_creation_tab">
                                    @include('super-admin.claims.claimants.create.tabs.borrower-id-creation')
                                </div>
                            @else
                                <div class="tab-pane show active" id="claimant_no_tab">
                                    @include('super-admin.claims.claimants.create.tabs.notab')
                                </div>
                            @endif
                        @else
                            <div class="tab-pane show active" id="claimant_creation_tab">
                                @include('super-admin.claims.claimants.create.tabs.claimant-id-creation')
                            </div>

                            <div class="tab-pane" id="borrower_id_creation_tab">
                                @include('super-admin.claims.claimants.create.tabs.borrower-id-creation')
                            </div>
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var patients_relation_with_claimant = "{{ old('patients_relation_with_claimant') }}";

        if (patients_relation_with_claimant == 'Other') {
            $('#specify').attr('disabled', false);
        }

        $('#patients_relation_with_claimant').on('change', function() {
            if ($(this).val() == 'Other') {
                $('#specify').attr('disabled', false);
            }
        });

        $('#are_patient_and_claimant_same').on('change', function() {
            var idCountry = this.value;
            if (idCountry == 'Yes') {

                var title = $("#claim_id").select2().find(":selected").data("title");
                var firstname = $("#claim_id").select2().find(":selected").data("firstname");
                var middlename = $("#claim_id").select2().find(":selected").data("middlename");
                var lastname = $("#claim_id").select2().find(":selected").data("lastname");
                var address = $("#claim_id").select2().find(":selected").data("address");
                var city = $("#claim_id").select2().find(":selected").data("city");
                var state = $("#claim_id").select2().find(":selected").data("state");
                var pincode = $("#claim_id").select2().find(":selected").data("pincode");
                var email = $("#claim_id").select2().find(":selected").data("email");
                var mobile = $("#claim_id").select2().find(":selected").data("mobile");
                console.log(firstname);
                $('#patients_relation_with_claimant').val('Self');
                $('#title').val(title).trigger('change');
                $('#firstname').val(firstname);
                $('#middlename').val(middlename);
                $('#lastname').val(lastname);
                $('#address').val(address);
                $('#city').val(city);
                $('#state').val(state);
                $('#pincode').val(pincode);
                $('#personal_email_id').val(email);
                $('#mobile_no').val(mobile);

            } else {

                $('#patients_relation_with_claimant').val('').trigger('change');
                $('#title').val('').trigger('change');
                $('#firstname').val('');
                $('#middlename').val('');
                $('#lastname').val('');
                $('#address').val('');
                $('#city').val('');
                $('#state').val('');
                $('#pincode').val('');
                $('#personal_email_id').val('');
                $('#mobile_no').val('');

            }
        });

        $('select').on('change', function() {
            var id = $(this).attr('id');
            if ($(this).val() == 'No' || $(this).val() == 'NA') {
                $("#" + id + "_file").attr('disabled', true);
            } else {
                $("#" + id + "_file").attr('disabled', false);
            }
        });

        var cancel_cheque = "{{ old('cancel_cheque') }}";
        if (cancel_cheque == 'No') {
            $("#cancel_cheque_file").attr('disabled', true);
        }

        $('#claim_id').on('change', function() {
            var title = $("#claim_id").select2().find(":selected").data("title");
            var firstname = $("#claim_id").select2().find(":selected").data("firstname");
            var middlename = $("#claim_id").select2().find(":selected").data("middlename");
            var lastname = $("#claim_id").select2().find(":selected").data("lastname");
            var address = $("#claim_id").select2().find(":selected").data("address");
            var city = $("#claim_id").select2().find(":selected").data("city");
            var state = $("#claim_id").select2().find(":selected").data("state");
            var policy_type = $("#claim_id").select2().find(":selected").data("policy_type");
            var group_name = $("#claim_id").select2().find(":selected").data("group_name");
            var pincode = $("#claim_id").select2().find(":selected").data("pincode");
            var email = $("#claim_id").select2().find(":selected").data("email");
            var patient_id = $("#claim_id").select2().find(":selected").data("patient-id");
            var hospital_id = $("#claim_id").select2().find(":selected").data("hospital");
            var patient_id_proof = $("#claim_id").select2().find(":selected").data("id-prof");
            var mobile = $("#claim_id").select2().find(":selected").data("mobile");
            var associate_partner_id = $("#claim_id").select2().find(":selected").data("asp-id");

            $('#patients_relation_with_claimant').val('Self').trigger('change');
            $('#patient_title').val(title);
            $('#patient_firstname').val(firstname);
            $('#patient_middlename').val(middlename);
            $('#patient_lastname').val(lastname);
            $('#address').val(address);
            $('#city').val(city);
            $('#state').val(state);
            $('#policy_type').val(policy_type).trigger('change');
            $('#group_name').val(group_name);
            $('#pincode').val(pincode);
            $('#personal_email_id').val(email);
            $('#mobile_no').val(mobile);
            if(associate_partner_id && title){
            $('#associate_partner_id').val(associate_partner_id);
        }else{
            $('#associate_partner_id').val('');
        }
            $('#hospital_id').val(hospital_id);
            $('#patient_id').val(patient_id);
            $('#patient_id_proof').val(patient_id_proof);
        });

        function setGroupName() {
            var policy_type = $('#policy_type').val();
            switch (policy_type) {
                case 'Group':
                    $("#group_name").prop("readonly", false);
                    break;
                case 'Retail':
                    $("#group_name").prop("readonly", true);
                    break;
                default:
                    $("#group_name").prop("readonly", true);
                    break;
            }
        }
    </script>
@endpush
