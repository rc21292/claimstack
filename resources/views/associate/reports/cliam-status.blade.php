@extends('layouts.associate')
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
                                <a class="btn btn-primary" href="{{ route('associate-partner.claim-reports-export', ['date_from_to' => request()->date_from_to, 'state' => request()->state, 'ap_name' => request()->ap_name ]) }}">Export Data</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="page-title">Claim Status report Export</h4>
                </div>
            </div>

            <div class="container">
                <form action="{{ route('associate-partner.claim-reports.index') }}">

                    <div class="row pb-4">

                        <div class="col-sm-4">
                            <input type="text" name="date_from_to" placeholder="Select Date from to Date to" class="form-control" value="{{ @$filter_date_from_to}}"   >
                        </div>

                        <div class="col-sm-2">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            <a class="btn btn-warning" href="{{ route('associate-partner.claim-reports.index') }}" >Reset</a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        @include('associate.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card no-shadow">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            @if (count($claims) > 0)
                                <table id="basics-datatable" class="table table-hover table-striped">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">Patient ID</th>
                                            <th scope="col">Claim ID</th>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Claimant Name</th>
                                            <th scope="col">Borrower Name</th>
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">Pre-Assessment Status</th>
                                            <th scope="col">Claim Processing Status</th>
                                            <th scope="col">Final Assessment / Authorization Status</th>
                                            <th scope="col">IC Claim Status</th>
                                            <th scope="col">Estimated Amount</th>
                                            <th scope="col">Claimed Ampunt</th>
                                            <th scope="col">Loan Amount</th>
                                            <th scope="col">Settled Amount</th>
                                            <th scope="col">Date of Disbursement (By IC)</th>
                                            <th scope="col">DOA</th>
                                            <th scope="col">DOD</th>
                                            <th scope="col">Policy No.</th>
                                            <th scope="col">Insurance Co.</th>
                                            <th scope="col">TPA Name</th>
                                            <th scope="col">Policy Type</th>
                                            <th scope="col">Disease Category</th>
                                            <th scope="col">Disease Name</th>
                                            <th scope="col">Disease Type</th>
                                            <th scope="col">Claimant ID</th>
                                            <th scope="col">Borrower ID</th>
                                            <th scope="col">Hospital ID</th>
                                            <th scope="col">Hospital Address</th>
                                            <th scope="col">Hospital City</th>
                                            <th scope="col">Hospital State</th>
                                            <th scope="col">Hospital PIN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($claims as $claim)
                                            <tr>
                                                <th scope="row">{{ $claim->patient->uid }}</th>
                                                <td>{{ $claim->uid }}</td>
                                                <td>{{ $claim->patient->title }} {{ $claim->patient->firstname }} {{ $claim->patient->middlename }} {{ $claim->patient->lastname }}</td>
                                                <td>{{ @$claim->claimant->title }} {{ @$claim->claimant->firstname }} {{ @$claim->claimant->middlename }} {{ @$claim->claimant->lastname }}</td>
                                                <td>{{ @$claim->borrower->borrower_title }} {{ @$claim->borrower->borrower_firstname }} {{ @$claim->borrower->borrower_middlename }} {{ @$claim->borrower->borrower_lastname }}</td>
                                                <td>{{ $claim->hospital->name }}</td>                                               
                                                <td>{{ @$claim->assessmentStatus->pre_assessment_status }}</td>
                                                <td>{{ @$claim->claimProcessing->final_assessment_status }}</td>                                            
                                                <td>{{ @$claim->assessmentStatus->final_assessment_status }}</td>
                                                <td>{{ @$claim->icClaimStatus->ic_claim_status }}</td>
                                                <td>{{ $claim->estimated_amount }}</td>                                               
                                                <td>{{ @$claim->claimant->estimated_amount }}</td>                                               
                                                <td>{{ @$claim->lendingStatusData->loan_disbursed_amount }}</td>                                               
                                                <td>{{ @$claim->icClaimStatus->settled_amount }}</td>                                               
                                                <td>{{ @$claim->icClaimStatus->date_disbursement }}</td>
                                                <td>{{ $claim->admission_date }}</td>                                               
                                                <td>{{ $claim->discharge_date }}</td>                                               
                                                <td>{{ @$claim->policy->policy_no }}</td>     
                                                <td>{{ @$claim->policy->insurer->name }}</td>                                               
                                                <td>{{ @$claim->policy->tpa_name }}</td>                                               
                                                <td>{{ @$claim->policy->policy_type }}</td>     
                                                <td>{{ $claim->disease_category }}</td>                                               
                                                <td>{{ $claim->disease_name }}</td>     
                                                <td>{{ $claim->disease_type }}</td>                                               
                                                <td>{{ @$claim->claimant->uid }}</td>                                               
                                                <td>{{ @$claim->borrower->uid }}</td>                                               
                                                <td>{{ @$claim->hospital->uid }}</td>     
                                                <td>{{ @$claim->hospital->address }}</td>                                               
                                                <td>{{ @$claim->hospital->city }}</td>                                               
                                                <td>{{ @$claim->hospital->state }}</td>                                               
                                                <td>{{ @$claim->hospital->pincode }}</td>                                          
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">No Hospital found.</p>
                            @endif
                        </div>
                        {{ $claims->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
