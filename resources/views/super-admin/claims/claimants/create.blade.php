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
                    <h4 class="page-title">New Claim</h4>
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
                                <span class="d-none d-md-block">Borrower ID  Creation</span>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="claimant_creation_tab">
                            @include('super-admin.claims.claimants.create.tabs.claimant-id-creation')
                        </div>

                        <div class="tab-pane" id="borrower_id_creation_tab">
                            @include('super-admin.claims.claimants.create.tabs.borrower-id-creation')
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
    });

    function setPatient() {
        var title            = $("#claim_id").select2().find(":selected").data("title");
        var patient_id               = $("#claim_id").select2().find(":selected").data("patient-id");
        var firstname           = $("#claim_id").select2().find(":selected").data("firstname");
        var asp_id           = $("#claim_id").select2().find(":selected").data("asp-id");
        var middlename          = $("#claim_id").select2().find(":selected").data("middlename");
        var lastname            = $("#claim_id").select2().find(":selected").data("lastname");
        var age                 = $("#claim_id").select2().find(":selected").data("age");
        var gender              = $("#claim_id").select2().find(":selected").data("gender");
        var hospital            = $("#claim_id").select2().find(":selected").data("hospital");
        var idprof            = $("#claim_id").select2().find(":selected").data("id-prof");


        $('#patient_id').val(patient_id);
        $('#patient_id_proof').val(idprof);
        $('#associate_partner_id').val(asp_id);
        $('#patient_title').val(title);
        $('#patient_title').val(title);
        $('#patient_firstname').val(firstname);
        $('#patient_middlename').val(middlename);
        $('#patient_lastname').val(lastname);
        $('#patient_age').val(age);
        $('#patient_gender').val(gender);
        $('#hospital_id').val(hospital).trigger('change');
    }

    
</script>
<script>
    function setInsuranceCoverageOptions(){
        var insurance_coverage = $('#insurance_coverage').val();
        switch (insurance_coverage) {
                case 'Yes':
                    $("#policy_no").prop("readonly", false);
                    $("#company_tpa_id_card_no").prop("readonly", false);
                    break;
                case 'No':
                    $("#policy_no").prop("readonly", true);
                    $("#company_tpa_id_card_no").prop("readonly", true);
                    break;
                default:
                    $("#policy_no").prop("readonly", true);
                    $("#company_tpa_id_card_no").prop("readonly", true);
                    break;
            }
    }
</script>
@endpush
