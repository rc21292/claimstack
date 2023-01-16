@extends('layouts.admin')
@section('title', 'Edit Associate Partners')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Associate Partner</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Associate Partner</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->
        
        <!-- start page content -->
        <div class="row">
            <div class="col-12">
                <div class="card no-shadow">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#associate_partner_details" data-bs-toggle="tab" aria-expanded="true"
                                    class="nav-link rounded-0 active">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Associate Partner Details</span>
                                </a>
                            </li>
                            @if ($associate->type == 'vendor')
                                <li class="nav-item">
                                    <a href="#vendor_partner_service_type" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0 ">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Vendor Partner Service Type</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#vendor_partner_reports" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Vendor Partner Reports</span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="#sales_partner_service_type" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Sales Partner Service Type</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sales_partner_reports" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Sales Partner Reports</span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="associate_partner_details">
                                @include('admin.associate-partners.edit.tabs.associate-partner-details')
                            </div>
                            @if ($associate->type == 'vendor')
                                <div class="tab-pane" id="vendor_partner_service_type">
                                   @include('admin.associate-partners.edit.tabs.vendor-partner-service-type')
                                </div>
                                <div class="tab-pane" id="vendor_partner_reports">
                                    @include('admin.associate-partners.edit.tabs.vendor-partner-reports')
                                </div>
                            @else
                                <div class="tab-pane" id="sales_partner_service_type">
                                    @include('admin.associate-partners.edit.tabs.sales-partner-service-type')
                                </div>
                                <div class="tab-pane" id="sales_partner_reports">
                                    @include('admin.associate-partners.edit.tabs.vendor-partner-reports')
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
