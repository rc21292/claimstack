@extends('layouts.employee')
@section('title', 'Admins')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form action="{{ route('employee.admins.index') }}">
                            <div class="input-group">
                                <input class="form-control" name="search" type="search"placeholder="Type here to Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>                        
                    </div>
                    <h4 class="page-title">Manage Admin</h4>
                </div>
            </div>
        </div>
        @include('employee.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card no-shadow">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            @if (count($admins) > 0)
                                <table id="basics-datatable" class="table table-hover">
                                    <thead class="thead-grey">
                                        <tr>
                                            <th scope="col">UID</th>
                                            <th scope="col">Employee Code</th>
                                            <th scope="col">Name</th>                                            
                                            <th scope="col">Email</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <th scope="row">{{ $admin->employee_code }}</th>
                                                <td>{{ $admin->id }}</td>
                                                <td>{!! $admin->firstname !!} {!! $admin->lastname !!}</td>                                                
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('employee.admins.edit', $admin->id) }}"
                                                            class="btn btn-primary"><i class="mdi mdi-pencil"></i></a>
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="confirmDelete({{ $admin->id }})"><i
                                                                class="mdi mdi-delete"></i></button>
                                                        <form id='delete-form{{ $admin->id }}'
                                                            action='{{ route('employee.admins.destroy', $admin->id) }}'
                                                            method='POST'>
                                                            <input type='hidden' name='_token'
                                                                value='{{ csrf_token() }}'>
                                                            <input type='hidden' name='_method' value='DELETE'>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">No Admin found.</p>
                            @endif
                        </div>
                        {{ $admins->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div> <!-- container -->
@endsection
{{-- @push('filter')
    @include('employee.filters.question-filter')
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
