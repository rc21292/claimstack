@extends('layouts.super-admin')
@section('title', 'Edit Borrowers')
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
                            <li class="breadcrumb-item active">Document Inward / Outward Trackings </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Document Inward / Outward Trackings</h4>
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
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <dl class="row mb-0">

                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Date of Transaction
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->date_of_transaction }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  User ID
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->user_id }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Document Type
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->document_type }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Claim ID
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->claim_id }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Patient Name
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ @$document_inward_outward_tracking->patient->firstname }}  {{ @$document_inward_outward_tracking->patient->middlename }}  {{ @$document_inward_outward_tracking->patient->lastname }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Patient ID
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->patient_id }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  AP Name
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ @$document_inward_outward_tracking->associatePartner->name }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  AP ID
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->ap_id }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Hospital Name
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ @$document_inward_outward_tracking->hospital->name }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Hospital ID
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->hospital_id }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Other
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->other }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Employee Name
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ @$document_inward_outward_tracking->employee->firstname }} {{ @$document_inward_outward_tracking->employee->middlename }} {{ @$document_inward_outward_tracking->employee->lastname }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Employee id
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->employee_id }} </p>
                                    </dd>
                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Employee Name
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->department }} </p>
                                    </dd>

                                    <dt class="col-sm-4">
                                        <h5 class="card-title">  Document Comments
                                        </h5>
                                    </dt>
                                    <dd class="col-sm-8">
                                        <p class="card-text">: {{ $document_inward_outward_tracking->document_comments }} </p>
                                    </dd>

                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div> <!-- container -->
@endsection
