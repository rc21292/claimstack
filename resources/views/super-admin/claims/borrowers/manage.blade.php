@extends('layouts.super-admin')
@section('title', 'Manage Claimants')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form action="{{ route('super-admin.borrowers.index') }}">
                            <div class="input-group">
                                <input class="form-control" name="search" type="search"placeholder="Type here to Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h4 class="page-title">Manage Claimants</h4>
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
                            @if (count($borrowers) > 0)
                                <table id="basics-datatable" class="table table-hover">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">Patient UID</th>
                                            <th scope="col">Claim UID</th>
                                            <th scope="col">Claimant UID</th>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">State</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Pincode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrowers as $borrower)
                                            <tr>
                                                <th>{{ $borrower->patient_id }}</th>
                                                <th scope="row">{{ $borrower->claim_id }}</th>
                                                <th scope="row">{{ $borrower->uid }}</th>
                                                <td>{{ @$borrower->claim->patient->middlename }} {{ @$borrower->claim->patient->lastname }}</td>
                                                <td>{{ @$borrower->claim->patient->hospital->name }}</td>
                                                <td>{{ $borrower->state }}</td>
                                                <td>{{ $borrower->city }}</td>
                                                <td>{{ $borrower->pincode }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center mt-5 mb-5">No Claimants found.</p>
                            @endif
                        </div>
                        {{ $borrowers->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div> <!-- container -->

@endsection
{{-- @push('filter')
    @include('super-admin.filters.question-filter')
@endpush --}}
@push('scripts')
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
@endpush
