@extends('layouts.super-admin')
@section('title', 'New Claim')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Claims</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.claims.index') }}">Claimants</a>
                            </li>
                            <li class="breadcrumb-item active">New Claimant</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Borower</h4>
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

                            <li class="nav-item">
                                <a href="#borrower_id_creation_tab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link rounded-0">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Borrower ID Creation</span>
                                </a>
                            </li>
                        

                        <li class="nav-item">
                            <a href="#documents_reimbursement_creation_tab" data-bs-toggle="tab" aria-expanded="false"
                            class="nav-link rounded-0">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Documents Reimbursement</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#assessment_status_creation_tab" data-bs-toggle="tab" aria-expanded="false"
                            class="nav-link rounded-0">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Assessment Status</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#lending_status_creation_tab" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link rounded-0">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Lending Status</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#discharge_status_creation_tab" data-bs-toggle="tab" aria-expanded="false"
                            class="nav-link rounded-0">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Discharge Status</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#claim_processing_tab" data-bs-toggle="tab" aria-expanded="false"
                            class="nav-link rounded-0">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Claim Processing</span>
                            </a>
                        </li>


                    </ul>

                    <div class="tab-content">

                            <div class="tab-pane active" id="borrower_id_creation_tab">
                                @include('super-admin.claims.borrowers.edit.tabs.borrower-id-creation')
                            </div>
                        

                        <div class="tab-pane" id="documents_reimbursement_creation_tab">
                            @include('super-admin.claims.borrowers.edit.tabs.documents-reimbursement')
                        </div>

                        <div class="tab-pane" id="assessment_status_creation_tab">
                            @include('super-admin.claims.borrowers.edit.tabs.assessment-status')
                        </div>

                        <div class="tab-pane" id="lending_status_creation_tab">
                            @include('super-admin.claims.borrowers.edit.tabs.lending-status')
                        </div>

                        <div class="tab-pane" id="discharge_status_creation_tab">
                            @include('super-admin.claims.borrowers.edit.tabs.discharge-status')
                        </div>

                        <div class="tab-pane" id="claim_processing_tab">
                            @include('super-admin.claims.borrowers.edit.tabs.processing')
                        </div>

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
            setHospitalId();
            setInsuranceCoverageOptions();
            setClaimIntimationNumber();
        });

        @if (@$claim->insurance_coverage == 'Yes')
            $(document).ready(function() {
                setGroupName();
                setPrimaryInsuredAddress();
                setAdditionalPolicy();
                setCurrentlyCovered();
                setHospitalizedOption();
            });
        @endif

        function setPatient() {
            var title = $("#patient_id").select2().find(":selected").data("title");
            var firstname = $("#patient_id").select2().find(":selected").data("firstname");
            var middlename = $("#patient_id").select2().find(":selected").data("middlename");
            var lastname = $("#patient_id").select2().find(":selected").data("lastname");
            var age = $("#patient_id").select2().find(":selected").data("age");
            var gender = $("#patient_id").select2().find(":selected").data("gender");
            var hospital = $("#patient_id").select2().find(":selected").data("hospital");
            var registrationno = $("#patient_id").select2().find(":selected").data("registrationno");


            $('#title').val(title);
            $('#firstname').val(firstname);
            $('#middlename').val(middlename);
            $('#lastname').val(lastname);
            $('#age').val(age);
            $('#gender').val(gender);
            $('#hospital_name').val(hospital).trigger('change');
            $('#registration_no').val(registrationno);
        }

        function setHospitalId() {
            var uid = $("#hospital_name").select2().find(":selected").data("id");
            var address = $("#hospital_name").select2().find(":selected").data("address");
            var city = $("#hospital_name").select2().find(":selected").data("city");
            var state = $("#hospital_name").select2().find(":selected").data("state");
            var pincode = $("#hospital_name").select2().find(":selected").data("pincode");
            var associate_partner_id = $("#hospital_name").select2().find(":selected").data("ap");

            $('#hospital_id').val(uid);
            $('#hospital_address').val(address);
            $('#hospital_city').val(city);
            $('#hospital_state').val(state);
            $('#hospital_pincode').val(pincode);
            $('#hospital_pincode').val(pincode);
            $('#associate_partner_id').val(associate_partner_id);
        }
    </script>
    <script>
        function setInsuranceCoverageOptions() {
            var insurance_coverage = $('#insurance_coverage').val();
            switch (insurance_coverage) {
                case 'Yes':
                    $("#policy_no").prop("readonly", false);
                    $("#company_tpa_id_card_no").prop("readonly", false);
                    $("#claim_intimation_done").prop("disabled", false);
                    break;
                case 'No':
                    $("#policy_no").prop("readonly", true);
                    $("#company_tpa_id_card_no").prop("readonly", true);
                    $("#claim_intimation_done").prop("disabled", true);
                    break;
                default:
                    $("#policy_no").prop("readonly", true);
                    $("#company_tpa_id_card_no").prop("readonly", true);
                    $("#claim_intimation_done").prop("disabled", true);
                    break;
            }
        }
    </script>
    <script>
        function setClaimIntimationNumber() {
            var claim_intimation_done = $('#claim_intimation_done').val();
            switch (claim_intimation_done) {
                case 'Yes':
                    $("#claim_intimation_number_mail").prop("readonly", false);
                    break;
                case 'No':
                    $("#claim_intimation_number_mail").prop("readonly", true);
                    break;
                default:
                    $("#claim_intimation_number_mail").prop("readonly", true);
                    break;
            }
        }
    </script>
    <script>
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
    <script>
        function setPrimaryInsuredAddress() {
            var is_primary_insured_and_patient_same = $('#is_primary_insured_and_patient_same').val();
            var address = {!! json_encode(@$claim->patient->patient_current_address) !!};
            switch (is_primary_insured_and_patient_same) {
                case 'Yes':
                    $("#primary_insured_address").val(address);
                    $("#primary_insured_city").val("{{ @$claim->patient->patient_current_city }}");
                    $("#primary_insured_state").val("{{ @$claim->patient->patient_current_state }}");
                    $("#primary_insured_pincode").val("{{ @$claim->patient->patient_current_pincode }}");
                    break;
                case 'No':
                    $("#primary_insured_address").val("");
                    $("#primary_insured_city").val("");
                    $("#primary_insured_state").val("");
                    $("#primary_insured_pincode").val("");
                    break;
                default:
                    $("#primary_insured_address").val("");
                    $("#primary_insured_city").val("");
                    $("#primary_insured_state").val("");
                    $("#primary_insured_pincode").val("");
                    break;
            }
        }
    </script>
    <script>
        function setAdditionalPolicy() {
            $("#policy_no_additional").prop("readonly", true);
            var additional_policy = $('input[name="additional_policy"]:checked').val();
            switch (additional_policy) {
                case 'Yes':
                    $("#policy_no_additional").prop("readonly", false);
                    break;
                case 'No':
                    $("#policy_no_additional").prop("readonly", true);
                    break;
                default:
                    $("#policy_no_additional").prop("readonly", true);
                    break;
            }
        }
    </script>
    <script>
        function setCurrentlyCovered() {
            $("#commencement_date_other").prop("readonly", true);
            $("#insurance_company_other").prop("readonly", true);
            $("#policy_no_other").prop("readonly", true);
            $("#sum_insured_other").prop("readonly", true);
            var currentlycovered = $('input[name="currently_covered"]:checked').val();
            switch (currentlycovered) {
                case 'Yes':
                    $("#commencement_date_other").prop("readonly", false);
                    $("#insurance_company_other").prop("readonly", false);
                    $("#policy_no_other").prop("readonly", false);
                    $("#sum_insured_other").prop("readonly", false);
                    break;
                case 'No':
                    $("#commencement_date_other").prop("readonly", true);
                    $("#insurance_company_other").prop("readonly", true);
                    $("#policy_no_other").prop("readonly", true);
                    $("#sum_insured_other").prop("readonly", true);
                    break;
                default:
                    $("#commencement_date_other").prop("readonly", true);
                    $("#insurance_company_other").prop("readonly", true);
                    $("#policy_no_other").prop("readonly", true);
                    $("#sum_insured_other").prop("readonly", true);
                    break;
            }
        }
    </script>
    <script>
        function setHospitalizedOption() {
            $("#admission_date_past").prop("readonly", true);
            $("#diagnosis").prop("readonly", true);
            var additional_policy = $('input[name="hospitalized"]:checked').val();
            switch (additional_policy) {
                case 'Yes':
                    $("#admission_date_past").prop("readonly", false);
                    $("#diagnosis").prop("readonly", false);
                    break;
                case 'No':
                    $("#admission_date_past").prop("readonly", true);
                    $("#diagnosis").prop("readonly", true);
                    break;
                default:
                    $("#admission_date_past").prop("readonly", true);
                    $("#diagnosis").prop("readonly", true);
                    break;
            }
        }
    </script>
    <script>
    $('#patients_relation_with_claimant').on('change', function () {
        if($(this).val() == 'Other'){
            $('#specify').attr('disabled', false);
        }
    });

    $('#are_patient_and_claimant_same').on('change', function () {
        var idCountry = this.value;
        if(idCountry == 'Yes'){

            var title            = $("#claim_id").select2().find(":selected").data("title");
            var firstname           = $("#claim_id").select2().find(":selected").data("firstname");
            var middlename          = $("#claim_id").select2().find(":selected").data("middlename");
            var lastname            = $("#claim_id").select2().find(":selected").data("lastname");
            var address            = $("#claim_id").select2().find(":selected").data("address");
            var city            = $("#claim_id").select2().find(":selected").data("city");
            var state            = $("#claim_id").select2().find(":selected").data("state");
            var pincode            = $("#claim_id").select2().find(":selected").data("pincode");
            var email            = $("#claim_id").select2().find(":selected").data("email");
            var mobile            = $("#claim_id").select2().find(":selected").data("mobile");

            $('#patients_relation_with_claimant').val('Self').trigger('change');
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

        }else{

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


    $('select').on('change', function(){
            var id = $(this).attr('id');
        if($(this).val() == 'No' || $(this).val() == 'NA'){
            $("#"+id+"_file").attr('disabled',true);
        }else{
            $("#"+id+"_file").attr('disabled',false);
        }
    });

    var cancel_cheque = "{{ old('cancel_cheque') }}";
    if(cancel_cheque == 'No'){
        $("#cancel_cheque_file").attr('disabled',true);
    }
</script>
@endpush