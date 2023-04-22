<form action="{{ route('hospital.hospitals.department', $hospital->id) }}" method="post" id="hospital-department-form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">

        <div class="col-md-12">
            <button style="float:right;" type="button" class="btn btn-success show-doctors"> <i class="mdi mdi-plus"></i> Add Doctor</button>
        </div>
        <div class="col-md-6 mt-3">
            <label for="specialization">Specialization<span class="text-danger">*</span></label>
            <select class="form-select" id="specialization" name="specialization">
                <option value="">Select Specialization</option>
                <option value="ENT" {{ old('specialization', $hospital_department->specialization ?? '') == 'ENT' ? 'selected' : '' }}>ENT</option>
                <option value="Dental" {{ old('specialization', $hospital_department->specialization ?? '') == 'Dental' ? 'selected' : '' }}>Dental</option>
                <option value="Ophthalmology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Ophthalmology' ? 'selected' : '' }}>Ophthalmology</option>
                <option value="Orthopaedic" {{ old('specialization', $hospital_department->specialization ?? '') == 'Orthopaedic' ? 'selected' : '' }}>Orthopaedic</option>
                <option value="Gyne" {{ old('specialization', $hospital_department->specialization ?? '') == 'Gyne' ? 'selected' : '' }}>Gyne</option>
                <option value="Paediatric" {{ old('specialization', $hospital_department->specialization ?? '') == 'Paediatric' ? 'selected' : '' }}>Paediatric</option>
                <option value="Neonatology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Neonatology' ? 'selected' : '' }}>Neonatology</option>
                <option value="Perinatology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Perinatology' ? 'selected' : '' }}>Perinatology</option>
                <option value="Nephrology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Nephrology' ? 'selected' : '' }}>Nephrology</option>
                <option value="Hepatology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Hepatology' ? 'selected' : '' }}>Hepatology</option>
                <option value="Neurology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Neurology' ? 'selected' : '' }}>Neurology</option>
                <option value="Cardiac" {{ old('specialization', $hospital_department->specialization ?? '') == 'Cardiac' ? 'selected' : '' }}>Cardiac</option>
                <option value="Oncology" {{ old('specialization', $hospital_department->specialization ?? '') == 'Oncology' ? 'selected' : '' }}>Oncology</option>
                <option value="Gastroenterolog" {{ old('specialization', $hospital_department->specialization ?? '') == 'Gastroenterolog' ? 'selected' : '' }}>Gastroenterolog</option>
            </select>
            @error('specialization')
            <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 show-hide mt-3">
            <label for="doctors_firstname">Doctors Name <span class="text-danger">*</span></label>
            <div class="input-group">
            <input type="text" maxlength="15" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control" id="doctors_firstname" name="doctors_firstname"
                placeholder="Firstname" value="{{ old('doctors_firstname', $hospital_department->doctors_firstname ?? '') }}">
            

            <input type="text" maxlength="30" style="margin-left:10px;" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control" id="doctors_lastname" name="doctors_lastname"
                placeholder="Lastname" value="{{ old('doctors_lastname', $hospital_department->doctors_lastname ?? '') }}">

            </div>
            @error('doctors_firstname')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
            @error('doctors_lastname')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <input type="hidden" name="show_doctor" id="show-doctor" value="0">

        <div class="col-md-6 show-hide mt-3">
            <label for="registration_no">Registration No.  <span class="text-danger">*</span></label>
            <input type="text" maxlength="20"  class="form-control" id="registration_no" name="registration_no"
                placeholder="Enter Registration No. " value="{{ old('registration_no', $hospital_department->registration_no ?? '') }}">
            @error('registration_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 show-hide mt-3">
            <label for="email_id">Email ID <span class="text-danger">*</span></label>
            <input type="email" maxlength="45"  class="form-control" id="email_id" name="email_id"
                placeholder="Enter Email ID" value="{{ old('email_id', $hospital_department->email_id ?? '') }}">
            @error('email_id')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 show-hide mt-3">
            <label for="phone">Doctor's Mobile No. <span
                    class="text-danger">*</span></label>
                    <div class="input-group">
                        <label class="input-group-text" for="phone">+91</label>
                            <input type="number" class="form-control" id="phone" name="doctors_mobile_no"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"  placeholder="Enter Doctor's Mobile No." value="{{ old('doctors_mobile_no', $hospital_department->doctors_mobile_no ?? '') }}">
                    </div>
            @error('doctors_mobile_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 show-hide mt-3">

            <label for="email_id">Upload Doctor's Registration Certificate <span class="text-danger">*</span></label>
            <br>
            @isset($hospital_department->upload)
                    <a href="{{ asset('storage/uploads/hospital/department/'.$hospital_department->hospital_id.'/'.$hospital_department->upload) }}" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                @endisset
            <input type="file" name="upload" id="dofsupload" hidden onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');"/>
            <label for="dofsupload" class="btn btn-primary upload-label">
                 <i class="mdi mdi-upload"></i></label>
                @error('upload')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
        </div>

        <div class="col-md-12 text-end mt-3">
            <button type="submit" class="btn btn-success" form="hospital-department-form">Update
                Hospital Department</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
$(document).ready(function() {
  $(".show-hide").hide();
    $("#show-doctor").val(0);

  $('.show-doctors').click(function() {
    $(".show-hide").toggle('fast');
    $("#show-doctor").val(1);
  });
});
    </script>
@endpush
