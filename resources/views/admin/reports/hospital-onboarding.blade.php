@extends('layouts.admin')
@section('title', 'Hospital Onboarding report')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <div class="input-group">
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="{{ route('admin.hospital-onboarding-export') }}">Export Data</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="page-title">Hospital Onboarding report Export</h4>
                </div>
            </div>

            <div class="container">
                <form action="{{ route('admin.hospital-onboarding') }}">

                    <div class="row pb-4">

                        <div class="col-sm-4">
                            <input type="text" name="date_from_to" placeholder="Select Date from to Date to" class="form-control" value="{{ @$filter_date_from_to}}"   >
                        </div>

                        <div class="col-sm-3">
                            <input class="form-control" value="{{ @$filter_state }}" name="state" type="search" placeholder="Enter State">
                        </div>
                        
                        <div class="col-sm-3">
                            <input class="form-control" value="{{ @$filter_ap_name }}" name="ap_name" type="search" placeholder="Enter Associate Partner Name">
                        </div> 

                        <div class="col-sm-2">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            <a class="btn btn-warning" href='./hospital-onboarding' >Reset</a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card no-shadow">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            @if (count($hospitals) > 0)
                                <table id="basics-datatable" class="table table-hover table-striped">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">Hospital UID</th>
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">Date of Onboarding </th>
                                            <th scope="col">Onboarding Status</th>
                                            <th scope="col">Hospital Address</th>
                                            <th scope="col">Hospital City</th>
                                            <th scope="col">Hospital State</th>
                                            <th scope="col">Hospital PIN</th>
                                            <th scope="col">Hospital By</th>
                                            <th scope="col">AP Name</th>
                                            <th scope="col">Sub AP Name</th>
                                            <th scope="col">Agency Name</th>
                                            <th scope="col">Claim Stack 2.0 Installed</th>
                                            <th scope="col">Auto Adjudication Installed</th>
                                            <th scope="col">Claims Reimbursement - Insured Services</th>
                                            <th scope="col">Cashless Claims Management Services</th>
                                            <th scope="col">Finance Company Agreement</th>
                                            <th scope="col">Name of the Finance Company</th>
                                            <th scope="col">Medical Lending for Patients</th>
                                            <th scope="col">Medical Lending for Bill/ Invoice Discounting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitals as $hospital)
                                            <tr>
                                                <th scope="row">{{ $hospital->uid }}</th>
                                                <td>{!! $hospital->name !!}</td>
                                                <td>{{ $hospital->onboarding }}</td>
                                                <td>{{ $hospital->status }}</td>                                               
                                                <td>{{ $hospital->address }}</td>                                               
                                                <td>{{ $hospital->city }}</td>                                               
                                                <td>{{ $hospital->state }}</td>                                               
                                                <td>{{ $hospital->pincode }}</td>                                               
                                                <td>{{ $hospital->hospital_by }}</td>                                               
                                                <td>@if(@$hospital->associate->status == 'Main') {{ @$hospital->associate->name }} @else {{'--'}} @endif</td>                                               
                                                <td>@if(@$hospital->associate->status == 'Sub AP') {{ @$hospital->associate->name }} @else {{'--'}} @endif</td>                                               
                                                <td>@if(@$hospital->associate->status == 'Agency') {{ @$hospital->associate->name }} @else {{'--'}} @endif</td> 
                                                <td>--</td>                                              
                                                <td>--</td> 
                                                <td>{{ $hospital->tieup->claims_reimbursement_insured_services }}</td>
                                                <td>{{ $hospital->tieup->cashless_claims_management_services }}</td>        
                                                <td>{{ $hospital->tieup->lending_finance_company_agreement }}</td>
                                                <td>--</td>
                                                <td>{{ $hospital->tieup->medical_lending_for_patients }}</td>
                                                <td>{{ $hospital->tieup->medical_lending_for_bill_invoice_discounting }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">No Hospital found.</p>
                            @endif
                        </div>
                        {{ $hospitals->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $('#file_hospital_import').change(function() {
      $('#submit-form1').submit();
  });
</script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>

    $(function() {

        $('input[name="date_from_to"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="date_from_to"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('input[name="date_from_to"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
</script>

@endpush
