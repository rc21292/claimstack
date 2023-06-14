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
                        </ol>
                    </div>
                    <h4 class="page-title">Insurer Plan Data Decoding</h4>
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
                        <form action="{{ route('super-admin.insurer-plan-data-decoding.index') }}" id="adminIForm" method="get">
                            <div class="form-group row">

                                <div class="col-md-6 mt-3">
                                    <label for="insurer">Select Insurer <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" id="insurer" data-toggle="select2"
                                        name="insurer" >
                                        <option value="">Select Linked With Employee</option>
                                        @foreach($decodings as $decoding => $data)
                                        <option @if($insurer == $decoding) selected @endif value="{{ $decoding }}">{{$data}}</option>
                                        @endforeach
                                    </select>
                                    @error('insurer')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="plan_name">Seelct Plan <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" id="plan_name" data-toggle="select2"
                                        name="plan_name" >
                                        <option value="">Select Linked With Employee</option>
                                        @foreach($plans as $plan => $plan_data)
                                        <option @if($plan_name == $plan) selected @endif value="{{ $plan }}">{{$plan_data}}</option>
                                        @endforeach
                                    </select>
                                    @error('plan_name')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success" form="adminIForm">Get Data
                                        </button>

                                    <a type="button" class="btn btn-warning" href="{{ route('super-admin.insurer-plan-data-decoding.index') }}" class="btn btn-success" >Reset Filter
                                        </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card no-shadow">
                    <div class="card-body">

                        @if($decoding_datas && !empty($decoding_datas))
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Office</th>
                                        <th>Medical Practitioner Specialistsconsultants Surgeon Fees</th>
                                        <th>Implants For Surgical Procedures Prosthetics Devices Charges</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($decoding_datas as $decoding_data)
                                    <tr>
                                        <td>{{$decoding_data->office}}</td>
                                        <td>{{$decoding_data->medical_practitioner_specialistsconsultants_surgeon_fees}}</td>
                                        <td>{{$decoding_data->implants_for_surgical_procedures_prosthetics_devices_charges}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
