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
                <ul class="nav nav-pills  bg-nav-pills  nav-justified mb-3">
                    <li class="nav-item">
                        <a href="{{ route('super-admin.claimants.edit', $claimant->id) }}" aria-expanded="false"
                            class="nav-link rounded-0">
                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">Claimant ID Creation / Intimation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('super-admin.borrowers.show', $claimant->id) }}" aria-expanded="false"
                            class="nav-link rounded-0">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Borrower ID Creation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('super-admin.document-reimbursement.show', $claimant->id) }}"
                            aria-expanded="false" class="nav-link rounded-0">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Documents Reimbursement</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('super-admin.assessment-status.show', $claimant->id) }}" aria-expanded="false"
                            class="nav-link rounded-0">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Assessment Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('super-admin.lending-status.show', $claimant->id) }}" aria-expanded="false"
                            class="nav-link rounded-0">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Lending Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('super-admin.discharge-status.show', $claimant->id) }}" aria-expanded="false"
                            class="nav-link rounded-0">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Discharge Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('super-admin.claim-processing.show', $claimant->id) }}" aria-expanded="true"
                            class="nav-link rounded-0 active">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Claim Processing</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="claim_processing_tab">

                        <form action="{{ route('super-admin.claim-processing.update', $claimant->id) }}" method="POST"
                            id="claim-processing-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-grou row">

                                    </div>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
@endpush
