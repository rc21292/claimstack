@extends('layouts.admin')
@section('title', 'Associate Partners')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Claim Stack</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Associate Partner</a></li>
                            <li class="breadcrumb-item active">Manage</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Associate Partner</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a href="{{ route('admin.associate-partners.create') }}" class="btn btn-warning">Create</a>
                        {{-- <a class="btn btn-dark right-bar-toggle" href="javascript: void(0);">
                            Filter
                        </a> --}}
                    </div>
                    <div class="card-body">
                        @if (count($associates) > 0)
                            <table id="basics-datatable" class="table table-hover thead-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($associates as $associate)
                                        <tr>
                                            <th scope="row">{{ $associate->associate_partner_id }}</th>
                                            <td>{!! $associate->firstname !!} {!! $associate->lastname !!}</td>
                                            <td><span class="badge badge-outline-secondary">{{ ucfirst($associate->type) }}</span></td>
                                            <td>{{ $associate->email }}</td>
                                            <td>{{ $associate->phone }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.associate-partners.edit', $associate->id) }}"
                                                        class="btn btn-primary"><i class="mdi mdi-pencil"></i></a>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete({{ $associate->id }})"><i
                                                            class="mdi mdi-delete"></i></button>
                                                    <form id='delete-form{{ $associate->id }}'
                                                        action='{{ route('admin.associate-partners.destroy', $associate->id) }}'
                                                        method='POST'>
                                                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                                                        <input type='hidden' name='_method' value='DELETE'>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $associates->links('pagination::bootstrap-4') }}
                        @else
                            <p class="text-center">No Associate Partner found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div> <!-- container -->
@endsection
{{-- @push('filter')
    @include('admin.filters.question-filter')
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
