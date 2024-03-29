@extends('layouts.associate')
@section('title', 'Manage Claims')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form action="{{ route('associate-partner.claims.index') }}">
                            <div class="input-group">
                                <input class="form-control" name="search" type="search"placeholder="Type here to Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h4 class="page-title">Manage Claims</h4>
                </div>
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
                                            <th scope="col">Patient UID</th>
                                            <th scope="col">Claim UID</th>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">State</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Pincode</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($claims as $claim)
                                            <tr>
                                                <th>{{ $claim->patient->uid }}</th>
                                                <th>{{ $claim->uid }}</th>
                                                <td>{{ $claim->patient->title }} {{ $claim->patient->firstname }} {{ $claim->patient->middlename }} {{ $claim->patient->lastname }}</td>
                                                <td>{{ $claim->patient->hospital->name }}</td>
                                                <td>{{ $claim->patient->patient_current_city }}</td>
                                                <td>{{ $claim->patient->patient_current_state }}</td>
                                                <td>{{ $claim->patient->patient_current_pincode }}</td>
                                                <td class="text-center">
                                                   <div class="input-group">
                                                        <button type="button" class="btn btn-primary 
                                                            dropdown-toggle" 
                                                            data-bs-toggle="dropdown">
                                                                Claim Details &nbsp;
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.claims.edit', @$claim->id) }}">
                                                                <i class="mdi mdi-pencil"></i> Claim Status </a>
                                                            </li>
                                                            @if($claim->claimant && !empty($claim->claimant))
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.claimants.edit', $claim->claimant) }}">
                                                                <i class="mdi mdi-pencil"></i> Claimant Status</a></li>

                                                             @if(@$claim->claimant->icclaim_status && !empty(@$claim->claimant->icclaim_status))
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.icclaim-status.create', ['claimant_id' => $claim->claimant]) }}">
                                                                <i class="mdi mdi-pencil"></i> Insurance Company Claim Status</a></li>
                                                            @else
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.icclaim-status.create', ['claimant_id' => $claim->claimant]) }}">
                                                                 <i class="mdi mdi-plus"></i> Insurance Company Claim Status</a></li>
                                                            @endif

                                                            @else
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.claimants.create', ['claim_id' => $claim->id]) }}">
                                                                 <i class="mdi mdi-plus"></i> Claimant Status</a></li>
                                                            @endif

                                                            @if($claim->borrower && !empty($claim->borrower))
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.borrowers.edit', $claim->id) }}">
                                                                <i class="mdi mdi-pencil"></i> Borrower Status</a>
                                                            </li>


                                                            @if($claim->borrower && !empty($claim->borrower))
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.lending-status.create', ['borrower_id' => $claim->borrower]) }}">
                                                                <i class="mdi mdi-pencil"></i> Lending Status</a></li>
                                                            @else
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.lending-status.create', ['borrower_id' => $claim->borrower]) }}">
                                                                 <i class="mdi mdi-plus"></i> Lending Status</a></li>
                                                            @endif

                                                            @else
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.borrowers.edit', $claim->id) }}">
                                                                <i class="mdi mdi-plus"></i> Borrower Status</a>
                                                            </li>
                                                            @endif

                                                            @if($claim->assessment && !empty($claim->assessment))
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.assessment-status.create', ['claim_id' => $claim->id]) }}">
                                                                <i class="mdi mdi-pencil"></i> Assessment Status</a>
                                                            </li>
                                                            @else
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.assessment-status.create', ['claim_id' => $claim->id]) }}">
                                                                <i class="mdi mdi-plus"></i> Assessment Status</a>
                                                            </li>
                                                            @endif

                                                            @if($claim->discharge && !empty($claim->discharge))
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.discharge-status.create', ['claim_id' => $claim->id]) }}">
                                                                <i class="mdi mdi-pencil"></i> Discharge Status</a>
                                                            </li>
                                                            @else
                                                            <li><a class="dropdown-item" href="{{ route('associate-partner.discharge-status.create', ['claim_id' => $claim->id]) }}">
                                                                <i class="mdi mdi-plus"></i> Discharge Status</a>
                                                            </li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">No Claims found.</p>
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
{{-- @push('filter')
    @include('associate.filters.question-filter')
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
