@extends('layouts.super-admin')
@section('title', 'Create TPA')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">TPA</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create TPA</h4>
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
                        <form action="{{ route('super-admin.tpa.store') }}" method="post" id="adminForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="company">Company Name <span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-12 mt-1">
                                    <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control"
                                        id="company" name="company" maxlength="90" placeholder="Company Name"
                                        value="{{ old('company') }}">
                                    @error('company')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="company">Company Type <span class="text-danger">*</span></label>
                                    <select class="form-select" id="company_type" name="company_type">
                                        <option value="">Select </option>
                                        <option value="Insurance Co." {{ old('company_type') }}>Insurance Co.</option>
                                        <option value="TPA" {{ old('company_type') }}>TPA</option>
                                        <option value="BHC" {{ old('company_type') }}>BHC</option>
                                        <option value="Self" {{ old('company_type') }}>Self</option>
                                        <option value="Government" {{ old('company_type') }}>Government</option>
                                        <option value="PSU" {{ old('company_type') }}>PSU</option>
                                        <option value="Private Corporate" {{ old('company_type') }}>Private Corporate</option>
\                                </select>
                                @error('company_type')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                                <div class="col-md-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success" form="adminForm">Create
                                        TPA</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
