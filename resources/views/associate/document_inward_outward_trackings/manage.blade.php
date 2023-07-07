@extends('layouts.associate')
@section('title', 'Admins')
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
                                    <!-- <a class="btn btn-primary" href="{{ route('associate-partner.document-inward-outward-tracking.create') }}">Add Trcking</a> -->
                                </div>
                            </div>
                    </div>
                    <h4 class="page-title">Manage Document Inward / Outward Trackings</h4>
                </div>
            </div>

            <div class="container">
                <form action="{{ route('associate-partner.document-inward-outward-tracking.index') }}">

                    <div class="row pb-4">

                        <div class="col-sm-3">
                            <input class="form-control" value="{{ @$filter_claim_id }}" name="claim_id" type="search" placeholder="Enter Claim ID">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="date_from_to" placeholder="Select Date from to Date to" class="form-control" value="{{ @$filter_date_from_to}}"   >
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" value="{{ @$filter_patient_id }}" name="patient_id" type="search" placeholder="Enter Patient ID">
                        </div> 

                        <div class="col-sm-2">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            <a class="btn btn-warning" href='./document-inward-outward-tracking' >Reset</a>
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
                            @if (count($document_inward_outward_trackings) > 0)
                                <table id="basics-datatable" class="table table-hover table-striped">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">Date of Transaction</th>
                                            <th scope="col">Document Type</th>
                                            <th scope="col">Transaction Type</th>
                                            <th scope="col">Mode of Transaction</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Claim ID</th>
                                            <th scope="col">Paitient ID</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($document_inward_outward_trackings as $document_inward_outward_tracking)
                                            <tr>
                                                <th scope="row">{{ $document_inward_outward_tracking->date_of_transaction }}</th>
                                                <td>{{ $document_inward_outward_tracking->document_type }}</td>
                                                <td>{!! $document_inward_outward_tracking->transaction_type !!} </td>
                                                <td>    {!! $document_inward_outward_tracking->mode_of_transaction !!}</td>
                                                <td>{{ $document_inward_outward_tracking->user_id }}</td>
                                                <td>{{ $document_inward_outward_tracking->claim_id }}</td>
                                                <td>{{ $document_inward_outward_tracking->patient_id }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('associate-partner.document-inward-outward-tracking.edit', $document_inward_outward_tracking->id) }}"
                                                            class="btn btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="{{ route('associate-partner.document-inward-outward-tracking.show', $document_inward_outward_tracking->id) }}"
                                                            class="btn btn-primary"><i class="mdi mdi-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">No Data found.</p>
                            @endif
                        </div>
                        {{ $document_inward_outward_trackings->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div> <!-- container -->


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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

        function confirmDelete(no) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
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
