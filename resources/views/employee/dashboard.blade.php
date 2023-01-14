@extends('layouts.employee')
@section('title', 'Dashboard')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('employee.dashboard') }}">Claim Stack</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-account-group float-end"></i>
                    <h6 class="text-uppercase mt-0">Total Associate Partners</h6>
                    <h2 class="my-2" id="active-users-count">{{ $total_associates }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-account-group float-end"></i>
                    <h6 class="text-uppercase mt-0">Vendor Associate Partners</h6>
                    <h2 class="my-2" id="active-users-count">{{ $vendor_associates }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-account-group float-end"></i>
                    <h6 class="text-uppercase mt-0">Sales Associate Partners</h6>
                    <h2 class="my-2" id="active-users-count">{{ $sales_associates }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>

</div> <!-- container -->
@endsection
