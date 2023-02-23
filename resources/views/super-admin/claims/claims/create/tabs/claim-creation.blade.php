<form action="{{ route('super-admin.claims.store') }}" method="post" id="associate-partner-form"
    enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <div class="col-md-12 mb-3">
            <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="patient_id" name="patient_id" maxlength="60"
                placeholder="Search Patient Id" value="{{ old('patient_id') }}">
            @error('patient_id')
                <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
            <select class="form-control select2" id="hospital_name" name="hospital_name"
                data-toggle="select2" onchange="setHospitalId()">
                <option value="">Select Associate Partner</option>
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}"
                        {{ old('hospital_name') == $hospital->id ? 'selected' : '' }}
                        data-name="{{ $hospital->name }}" data-id="{{ $hospital->uid }}"
                        data-address="{{ $hospital->address }}" data-city="{{ $hospital->city }}"
                        data-state="{{ $hospital->state }}"
                        data-pincode="{{ $hospital->pincode }}"
                        data-ap="{{ $hospital->linked_associate_partner_id }}"
                        data-apname="{{ $hospital->ap_name }}">
                        {{ $hospital->name }}
                        [<strong>UID: </strong>{{ $hospital->uid }}]
                        [<strong>City: </strong>{{ $hospital->city }}]
                        [<strong>State: </strong>{{ $hospital->state }}]
                    </option>
                @endforeach
            </select>
            @error('hospital_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="name">Hospital Id <span class="text-danger">*</span></label>
            <input type="text" readonly class="form-control" id="hospital_id" name="hospital_id"
                placeholder="Enter Hospital name" value="{{ old('hospital_id') }}">
            @error('hospital_id')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="hospital_address">Hospital Address <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="hospital_address" name="hospital_address"
                placeholder="Address Line"
                value="{{ old('hospital_address') }}">
            @error('hospital_address')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="hospital_city" name="hospital_city"
                placeholder="City" value="{{ old('hospital_city') }}">
            @error('hospital_city')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="hospital_state" name="hospital_state"
                placeholder="State" value="{{ old('hospital_state') }}">
            @error('hospital_state')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="number" class="form-control" id="hospital_pincode" name="hospital_pincode"
                placeholder="Pincode" value="{{ old('hospital_pincode') }}">
            @error('hospital_pincode')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="associate_partner_id">Associate Partner ID <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="associate_partner_id"
                name="associate_partner_id" placeholder="Associate Partner ID"
                value="{{ old('associate_partner_id') }}">
            @error('associate_partner_id')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="registration_no">IP (In-patient) Registration No. <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" maxlength="20" id="registration_no"
                name="registration_no" placeholder="Enter IP Registration No."
                value="{{ old('registration_no') }}">
            @error('registration_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="firstname">Patient Name <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-3 mt-1">
            <select class="form-control" id="title" name="title">
                <option value="">Select</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
            </select>
            @error('title')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-1">
            <input type="text" maxlength="25" class="form-control" id="firstname"
                name="firstname" maxlength="15" placeholder="First name"
                value="{{ old('firstname') }}">
            @error('firstname')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-1">
            <input type="text" maxlength="25" class="form-control" id="middlename"
                name="middlename" maxlength="30" placeholder="Middle name"
                value="{{ old('middlename') }}">
            @error('middlename')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-1">
            <input type="text" maxlength="25" class="form-control" id="lastname"
                name="lastname" maxlength="30" placeholder="Last name"
                value="{{ old('lastname') }}">
            @error('lastname')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="dob">Patient DOB <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="date" class="form-control" id="dob" name="dob"
                    value="{{ old('dob') }}" onchange="calculateAge();">
                <input type="file" name="dobfile" id="dobfile" hidden
                    onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                <label for="dobfile" class="btn btn-primary upload-label"><i
                        class="mdi mdi-upload"></i></label>
            </div>
            @error('dob')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
            @error('dobfile')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="age">Patient Age <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control"
                id="age" name="age" placeholder="Patient Age"
                value="{{ old('age') }}">
            @error('age')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="gender">Patient Gender <span class="text-danger">*</span></label>
            <select class="form-select" id="gender" name="gender">
                <option value="">Select gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                </option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                </option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                </option>
            </select>
            @error('gender')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

    </div>
</form>
