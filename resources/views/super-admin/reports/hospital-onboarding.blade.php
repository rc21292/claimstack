@extends('layouts.super-admin')
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
                                <a class="btn btn-primary" href="{{ route('super-admin.hospital-onboarding-export', ['date_from_to' => request()->date_from_to, 'state' => request()->state, 'ap_name' => request()->ap_name ]) }}">Export Data</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="page-title">Hospital Onboarding Report</h4>
                </div>
            </div>

            <div class="container">
                <form action="{{ route('super-admin.hospital-onboarding') }}">

                    <div class="row pb-4">

                        <div class="col-sm-4">
                            <input type="text" name="date_from_to" placeholder="Select Date from to Date to" class="form-control" value="{{ @$filter_date_from_to}}"   >
                        </div>

                        <div class="col-sm-3">
                            <input class="form-control" value="{{ @$filter_state }}" name="state" type="search" placeholder="Enter State">
                        </div>

                        <div class="col-sm-3">

                            <select class="form-control select2" name="ap_name" data-toggle="select2" >
                            <option value="">Select Associate Partner</option>
                            @foreach ($associates as $associate)
                            <option value="{{ $associate->associate_partner_id }}"
                                {{ @$filter_ap_id == $associate->associate_partner_id ? 'selected' : '' }} >{{ $associate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <div class="col-sm-2">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            <a class="btn btn-warning" href="{{ route('super-admin.hospital-onboarding') }}" >Reset</a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        @include('super-admin.sections.flash-message')
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
                                            <th scope="col">Hospital Linked Employee</th>
                                            <th scope="col">Hospital Assigned Employee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitals as $hospital)

                                         @php
                                        if ((isset($hospital->tieup->agreed_for)) && ($hospital->tieup->agreed_for == 'ClaimStack2.O' || $hospital->tieup->agreed_for == 'Both')) {
                                            $agreed_for = 'Yes';
                                        }else if((isset($hospital->tieup->agreed_for)) && ($hospital->tieup->agreed_for == 'Claims Servicing')){
                                            $agreed_for = 'No';
                                        }else{
                                            $agreed_for = 'No';
                                        }

                                        if(isset($hospital->associate) && $hospital->associate->status == 'Main'){
                                            $main_ap = $hospital->associate->name;
                                            $sub_ap = '';
                                            $agency = '';
                                        }else if(isset($hospital->associate) && $hospital->associate->status == 'Sub AP'){
                                            $main_ap = $hospital->associate->associate->name;
                                            $sub_ap = $hospital->associate->name;
                                            $agency = '';
                                        }else if( isset($hospital->associate) && $hospital->associate->status == 'Agency'){

                                            if($hospital->associate->associate->status == 'Main'){
                                                $main_ap = $hospital->associate->associate->name;
                                                $sub_ap = '';
                                                $agency = $hospital->associate->name;
                                            }else if($hospital->associate->associate->status == 'Sub AP'){
                                                $main_ap = isset($hospital->associate->associate->associate) ? $hospital->associate->associate->associate->name : '';
                                                $sub_ap = $hospital->associate->associate->name;
                                                $agency = $hospital->associate->name;
                                            }else{
                                                $main_ap = isset($hospital->associate->associate->associate) ? $hospital->associate->associate->associate->name : '';
                                                $sub_ap = $hospital->associate->associate->name;
                                                $agency = $hospital->associate->name;
                                            }
                                        }else{
                                            $main_ap = '';
                                            $sub_ap = '';
                                            $agency = '';
                                        }
                                        @endphp
                                            <tr>
                                                <th scope="row">{{ $hospital->uid }}</th>
                                                <td>{!! $hospital->name !!}</td>
                                                <td>{{ Carbon\Carbon::parse($hospital->created_at)->format('m-d-Y') }}</td>
                                                <td>{{ $hospital->onboarding }}</td>                                            
                                                <td>{{ $hospital->address }}</td>                                               
                                                <td>{{ $hospital->city }}</td>                                               
                                                <td>{{ $hospital->state }}</td>                                               
                                                <td>{{ $hospital->pincode }}</td>                                               
                                                <td>{{ $hospital->by }}</td>                                               
                                                <td>{{ @$main_ap }}</td>                                               
                                                <td>{{ @$sub_ap }}</td>                                               
                                                <td>{{ @$agency }}</td>                                              
                                                <td>{{ @$agreed_for }}</td>                                              
                                                <td>{{ @$hospital->tieup->auto_adjudication ?? 'No' }}</td> 
                                                <td>{{ @$hospital->tieup->claims_reimbursement_insured_services ?? 'No' }}</td>
                                                <td>{{ @$hospital->tieup->cashless_claims_management_services ?? 'No' }}</td>        
                                                <td>{{ @$hospital->tieup->lending_finance_company_agreement ?? 'No' }}</td>
                                                <td>{{ @$hospital->tieup->nbfc1->name }} @if(@$hospital->tieup->nbfc_2) , @endif  {{ @$hospital->tieup->nbfc2->name }} @if(@$hospital->tieup->nbfc_3) , @endif {{ @$hospital->tieup->nbfc3->name }}</td>
                                                <td>{{ @$hospital->tieup->medical_lending_for_patients ?? 'No' }}</td>
                                                <td>{{ @$hospital->tieup->medical_lending_for_bill_invoice_discounting ?? 'No' }}</td>
                                                <td>{{ @$hospital->linkedEmployeeData->firstname }} {{ @$hospital->linkedEmployeeData->lastname }} </td>    
                                                <td>{{ @$hospital->assignedEmployeeData->firstname }} {{ @$hospital->assignedEmployeeData->lastname }} </td>    
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
