@php
use Carbon\Carbon;
@endphp
@extends('layouts.super-admin')
@section('title', 'Manage Hospital')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form action="{{ route('super-admin.hospital-authorizations.index') }}">
                            <div class="input-group">
                                <input class="form-control" value="{{ $filter_search }}" name="search" type="search" placeholder="Type here to Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                    <h4 class="page-title">Pending for Claim Processing</h4>
                </div>
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
                            @if (count($claims) > 0)
                                <table id="basics-datatable" class="table table-hover">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">Claim ID</th>
                                            <th scope="col">Patient Name(Id)</th>
                                            <th scope="col">Hospital Name(Id)</th>
                                            <th scope="col">Date & Time of Assigning for Claim Processing (Last)</th>
                                            <th scope="col">Assigned to</th>
                                            <th scope="col">Linked Admin Name & ID (Assigned Employee's)</th>
                                            <th scope="col">Pending TAT</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($claims as $claim)
                                            <tr>
                                                <th scope="row">{{ $claim->uid }}</th>
                                                <td>{{ $claim->patient->firstname }} {{ $claim->patient->lastname }} ({{ $claim->patient->uid }})</td>                  
                                                <td>{{ $claim->hospital->name }} ({{ $claim->hospital->uid }})</td>
                                                <td>{{ Carbon::parse($claim->assigned_at_claim_processing)->format('d-m-Y H:i:s'); }}</td>
                                                <td>{{ $claim->assignToClaimProcessing->firstname }} {{ $claim->assignToClaimProcessing->lastname }}</td>
                                                <td>{{ $claim->linked_employee_data->firstname }} {{ $claim->linked_employee_data->lastname }}</td>

                                                @php
                                                $startDate = Carbon::parse($claim->created_at);
                                                $endDate = Carbon::parse(Carbon::now()->toDateTimeString());
                                                @endphp
                                                <td>{{ $startDate->diff($endDate)->format('%D : %H:%I'); }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('super-admin.claim-processing.create',['claim_id' => $claim->id]) }}"
                                                            class="btn btn-primary"><i class="mdi mdi-eye"></i></a>
                                                            <button type="button" title=" Authorize Claim ID" class="btn btn-danger"  onclick="confirmDelete({{ $claim->id }})"><i class="uil-shield-check"></i></button>
                                                        <form id='delete-form{{ $claim->id }}'
                                                            action="{{ route('super-admin.pending-claim-processing.update', $claim->id) }}"
                                                            method='POST'>
                                                            <input type='hidden' name='_token'
                                                            value='{{ csrf_token() }}'>
                                                            <input type='hidden' name='_method' value='PUT'>
                                                        </form>
                                                    </div>
                                                </td>
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
        <!-- end page content -->

    </div> <!-- container -->

@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        localStorage.setItem('activeTab', '');
        function confirmDelete(no) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Authorize it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form' + no).submit();
                }
            })
        };
    </script>
     <script>
        $(".change-password").click(function () {
                var id = $(this).data('id');
                var uid = $(this).data('uid');
                $('#uid').text(uid);
                $('#employee_code').val(uid);                
                $('#id').val(id);
            });
    </script>
    @error('new_password')
    <script>
        $(document).ready(function () {
            $('#modal-password').modal('show');
        });       
    </script>
    @enderror
@endpush
