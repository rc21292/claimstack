@extends('layouts.super-admin')
@section('title', 'Edit Hospitals')
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
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Hospital</a></li>
                            <li class="breadcrumb-item active">Assigning</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Assigning Hospital</h4>
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
                        <form action="{{ route('super-admin.assign-hospitals.update', $hospital->id) }}" method="post" id="hospital-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">

                            <div class="col-md-12 mt-3">
                                <strong>Hospital Name</strong> : {{ $hospital->name }}
                            </div>
                            <div class="col-md-12 mt-3">

                                <label for="assigned_linked_employees">Select Assigned/Linked To Employee Name <span
                                    class="text-danger">*</span></label>
                                    <select class="form-control select2" placeholder="Please Select Employee" multiple id="assigned_linked_employees" name="assigned_linked_employees[]"
                                    data-toggle="select2">
                                    <option value="">Select Employee</option>
                                    @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}"  @if(in_array($admin->id, $selected_admins)) selected @endif >{{ $admin->firstname }} {{ $admin->lastname }} [ {{ $admin->employee_code }} ]</option>
                                        @endforeach
                                    </select>
                                    @error('assigned_linked_employees')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                    <p style="margin-top: 10px;"><input type="checkbox" id="checkbox" > Select All</p>
                                </div>


                                <div class="col-md-12 text-end mt-3 show-hide"> <button type="submit" class="btn btn-success" form="hospital-form">Assign Hospital</button> </div>

                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

        
    <script>
      $(document).ready(function() {
    $("#checkbox").click(function(){
      if($("#checkbox").is(':checked') ){ //select all
        $("#assigned_linked_employees").find('option').prop("selected",true);
        $("#assigned_linked_employees").trigger('change');
      } else { //deselect all
        $("#assigned_linked_employees").find('option').prop("selected",false);
        $("#assigned_linked_employees").trigger('change');
      }
  });
});
    </script>

@endpush
