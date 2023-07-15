@extends('layouts.super-admin')
@section('title', 'Manage Hospital')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    
                    <h4 class="page-title">Assign Hospital Logs</h4>
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
                        
                        <div class="card text-center">
                            <div class="card-header bg-primary">Log Information</div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="row">IP</th>
                                            <td scope="row">{{ $system_log->ip_address }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">User Id</th>
                                            <td scope="row">{{ $system_log->user_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Panel</th>
                                            <td scope="row">{{ $system_log->guard_name == 'super-admin' ? 'Super Admin': ucfirst($system_log->guard_name) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date Time</th>
                                            <td scope="row">{{ date('d-m-Y H:i:s', strtotime($system_log->created_at)) }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="card text-center">
                            <div class="card-header bg-info">Values Details</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">

                                        <table class="table table-striped table-hover table-bordered">


                                            <thead>
                                                <tr>
                                                    <th class="bg-success" scope="col">Field</th>
                                                    <th class="bg-success" scope="col">Prvious Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                               @foreach ($system_log->old_value as $key => $old_value)
                                                @foreach ($old_value as $key => $value_old)

                                                @php
                                                if($key == 'id'){
                                                    continue;
                                                }
                                                if($key == 'hospital_id'){
                                                    $data = Helper::getHospitalUid($value_old);
                                                }else if($key == 'admin_id'){
                                                    $data = Helper::getAdminUid($value_old);
                                                }else{
                                                    $data = $value_old;
                                                }
                                                @endphp
                                                <tr>
                                                    <td scope="col">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                                    <td scope="col">{{$data}}</td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table class="table table-striped table-hover table-bordered">


                                            <thead>
                                                <tr>
                                                    <th scope="col" class="bg-success">Field</th>
                                                    <th scope="col" class="bg-success">New Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($system_log->new_value as $key => $new_value)
                                                @foreach ($new_value as $key => $value_new)
                                                @php
                                                if($key == 'id'){
                                                    continue;
                                                }
                                                if($key == 'hospital_id'){
                                                    $data = Helper::getHospitalUid($value_new);
                                                }else if($key == 'admin_id'){
                                                    $data = Helper::getAdminUid($value_new);
                                                }else{
                                                    $data = $value_new;
                                                }
                                                @endphp
                                                <tr>
                                                    <td scope="col">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                                    <td scope="col">{{$data}}</td>
                                                </tr>
                                                @endforeach
                                                @endforeach  
                                            </tbody>
                                        </table></div>

                                    </div>


                                </div>
                        </div>
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
