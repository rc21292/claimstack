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
                        <form action="{{ route('super-admin.assign-hospitals.index') }}">
                            <div class="input-group">
                                <input class="form-control" name="search" type="search"placeholder="Type here to Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <!-- <a class="btn btn-primary" href="{{ route('super-admin.assign-hospitals.create') }}">Assgn Hospitals to Emaployees</a> -->
                                </div>
                            </div>
                        </form>  
                    </div>
                    <h4 class="page-title">Assign Hospital Logs</h4>
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
                            @if (count($system_logs) > 0)
                                <table id="basics-datatable" class="table table-hover table-striped">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">IP</th>
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">User Id</th>
                                            <th scope="col">Panel</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Date Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($system_logs as $log)
                                            <tr>
                                                <th scope="row">{{ $log->id }}</th>
                                                <th scope="row">{{ $log->ip_address }}</th>
                                                <td>{{ @$log->hospital->name }} #{{ @$log->hospital->uid }} <!-- {{ $log->system_logable_id }} --></td>
                                                <td>{{ $log->user_name }}</td>
                                                <td>{{ $log->guard_name == 'super-admin' ? 'Super Admin': 'Admin' }}</td>
                                                <td>{{ $log->action }}</td>
                                                <td>{{ date('d-m-Y H:i:s', strtotime($log->created_at)) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete({{ $log->id }})"><i
                                                    class="uil uil-trash-alt"></i></button>

                                                    <form id='delete-form{{ $log->id }}'
                                                        action='{{ route('super-admin.assign-hospital-logs.destroy', $log->id) }}'
                                                        method='POST'>
                                                        <input type='hidden' name='_token'
                                                        value='{{ csrf_token() }}'>
                                                        <input type='hidden' name='_method' value='DELETE'>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">No Log found.</p>
                            @endif
                        </div>
                        {{ $system_logs->withQueryString()->links('pagination::bootstrap-4') }}
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
