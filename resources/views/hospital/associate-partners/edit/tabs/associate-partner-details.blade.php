<form action="{{ route('hospital.associate-partners.update', $associate->id) }}" method="post" id="associate-partner-form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">

        <div class="col-md-12">
            <label for="firstname">Associate Partner Name <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="firstname" name="firstname" maxlength="15" placeholder="Firstname"
                value="{{ old('firstname', $associate->firstname) }}">
            @error('firstname')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" placeholder="Lastname"
                value="{{ old('lastname', $associate->lastname) }}">
            @error('lastname')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="type">Associate Partner Type <span class="text-danger">*</span></label>
            <select class="form-select" id="type" name="type">
                <option value="">Select Type</option>
                <option value="vendor" {{ old('type', $associate->type) == 'vendor' ? 'selected' : '' }}>Vendor Type
                </option>
                <option value="sales" {{ old('type', $associate->type) == 'sales' ? 'selected' : '' }}>Sales Type
                </option>
            </select>
            @error('type')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="pan">PAN Number <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter PAN no."
                    value="{{ old('pan', $associate->pan) }}">
                    @isset($associate->panfile)
                        <a href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->panfile) }}" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                    @endisset
                    <input type="file" name="panfile" hidden id="panfile"/>
                    <label for="panfile" class="btn btn-primary upload-label"><i class="mdi mdi-upload"></i></label>
            </div>
            @error('pan')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
            @error('panfile')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="owner">Associate Partner Owner's Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="owner" name="owner" maxlength="15"
                placeholder="Enter associate partner owner's name" value="{{ old('owner', $associate->owner) }}">
            @error('owner')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="owner">Official email ID <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" maxlength="30"
                placeholder="Enter official emailID" value="{{ old('email', $associate->email) }}">
            @error('email')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <label for="address">Hospital Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address Line"
                value="{{ old('address', $associate->address) }}">
            @error('address')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="city" name="city" placeholder="City"
                value="{{ old('city', $associate->city) }}">
            @error('city')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="state" name="state" placeholder="State"
                value="{{ old('state', $associate->state) }}">
            @error('state')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="number" class="form-control" id="pincode" name="pincode" maxlength="10" placeholder="Pincode"
                value="{{ old('pincode', $associate->pincode) }}">
            @error('pincode')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="phone">Associate Partner Mobile Number <span class="text-danger">*</span></label>
            <div class="input-group">
                <label class="input-group-text" for="phone">+91</label>
            <input type="number" class="form-control" id="phone" name="phone"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"
                placeholder="Enter associate partner mobile number" value="{{ old('phone', $associate->phone) }}">
            </div>
            @error('phone')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="reference">Reference <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="reference" name="reference"
                placeholder="Enter reference" value="{{ old('reference', $associate->reference) }}">
            @error('reference')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <label for="statuses">Associate Partner Status <span class="text-danger">*</span></label>
            <select class="form-select" id="statuses" name="status">
                <option value="">Select Status</option>
                <option value="Main" {{ old('status', $associate->status) == 'Main' ? 'selected' : '' }}>Main
                </option>
                <option value="Sub AP" {{ old('status', $associate->status) == 'Sub AP' ? 'selected' : '' }}>Sub AP
                </option>
                <option value="Agency" {{ old('status', $associate->status) == 'Agency' ? 'selected' : '' }}>Agency
                </option>
            </select>
            @error('status')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="linked_associate_partner">Linked Associate Partner Name </label>
            <select class="form-control select2" id="linked_associate_partner" name="linked_associate_partner"
                data-toggle="select2" onchange="setLinkedAssociatePartnerId()">
                <option value="">Select Associate Partner</option>
                @foreach ($associates as $row)
                    <option value="{{ $row->id }}"
                        {{ old('linked_associate_partner', $associate->linked_associate_partner) == $row->id ? 'selected' : '' }}
                        data-id="{{ $row->associate_partner_id }}">
                        [<strong>Name: </strong>{{ $row->firstname }}{{ $row->lastname }}]
                        [<strong>UID: </strong>{{ $row->associate_partner_id }}]
                        [<strong>City: </strong>{{ $row->city }}]
                        [<strong>State: </strong>{{ $row->state }}]
                    </option>
                @endforeach
            </select>
            @error('linked_associate_partner')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="linked_associate_partner_id">Linked Associate Partner ID </label>
            <input type="text" class="form-control" id="linked_associate_partner_id"
                name="linked_associate_partner_id" placeholder="Enter linked associate partner ID"
                value="{{ old('linked_associate_partner_id', $associate->linked_associate_partner_id) }}">
            @error('linked_associate_partner_id')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="assigned_employee">Assigned To Employee Name <span class="text-danger">*</span></label>
            <select class="form-control select2" id="assigned_employee" name="assigned_employee"
                data-toggle="select2" onchange="setAssignedEmployeeId()">
                <option value="">Select Assigned To Employee</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('assigned_employee', $associate->assigned_employee) == $user->id ? 'selected' : '' }}
                        data-id="{{ $user->employee_code }}">
                        [<strong>Name: </strong>{{ $user->firstname }}{{ $user->lastname }}]
                                                [<strong>UID: </strong>{{ $user->employee_code }}]
                                                [<strong>Department: </strong>{{ $user->department }}]</option>
                @endforeach
            </select>
            @error('assigned_employee')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="assigned_employee_id">Assigned To Employee ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="assigned_employee_id" name="assigned_employee_id"
                placeholder="Enter assigned to employee ID"
                value="{{ old('assigned_employee_id', $associate->assigned_employee_id) }}">
            @error('assigned_employee_id')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="linked_employee">Linked With Employee Name <span class="text-danger">*</span></label>
            <select class="form-control select2" id="linked_employee" name="linked_employee" data-toggle="select2"
                onchange="setLinkedWithEmployeeId()">
                <option value="">Select Linked With Employee</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('linked_employee', $associate->linked_employee) == $user->id ? 'selected' : '' }}
                        data-id="{{ $user->employee_code }}">
                        [<strong>Name: </strong>{{ $user->firstname }}{{ $user->lastname }}]
                                                [<strong>UID: </strong>{{ $user->employee_code }}]
                                                [<strong>Department: </strong>{{ $user->department }}]</option>
                @endforeach
            </select>
            @error('linked_employee')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="linked_employee_id">Linked With Employee ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="linked_employee_id" name="linked_employee_id"
                placeholder="Enter linked with employee ID"
                value="{{ old('linked_employee_id', $associate->linked_employee_id) }}">
            @error('linked_employee_id')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="mou">Associate Partner MOU <span class="text-danger">*</span></label>
            <div class="input-group">
                <select class="form-select" id="mou" name="mou">
                    <option value="">Select Status</option>
                    <option value="yes" {{ old('mou', $associate->mou) == 'yes' ? 'selected' : '' }}>Yes
                    </option>
                    <option value="no" {{ old('mou', $associate->mou) == 'no' ? 'selected' : '' }}>No
                    </option>
                </select>
                 @isset($associate->moufile)
                        <a href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->moufile) }}" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                    @endisset
                    <input type="file" name="moufile" hidden id="moufile"  />
                    <label for="moufile" class="btn btn-primary upload-label"><i class="mdi mdi-upload"></i></label>
            </div>
            @error('mou')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
            @error('moufile')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="agreement_start_date">Associate Partner Agreement Start Date <span
                    class="text-danger">*</span></label>
            <div class="input-group">
                <input type="date" class="form-control" id="agreement_start_date" name="agreement_start_date"
                    placeholder="Associate partner agreement start date"
                    value="{{ old('agreement_start_date', $associate->agreement_start_date) }}">
                    @isset($associate->agreementfile)
                        <a href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->agreementfile) }}" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                    @endisset
                    <input type="file" name="agreementfile" id="agreementfile" hidden />
                    <label for="agreementfile" class="btn btn-primary upload-label"><i class="mdi mdi-upload"></i></label>

            </div>
            @error('agreement_start_date')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="agreement_end_date">Associate Partner Agreement End Date <span
                    class="text-danger">*</span></label>
            <input type="date" class="form-control" id="agreement_end_date" name="agreement_end_date"
                placeholder="Associate partner agreement end date"
                value="{{ old('agreement_end_date', $associate->agreement_end_date) }}">
            @error('agreement_end_date')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="contact_person">Associate Partner Contact Person's Name <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="contact_person" name="contact_person"
                placeholder="Associate partner contact person's name"
                value="{{ old('contact_person', $associate->contact_person) }}">
            @error('contact_person')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="contact_person_phone">Associate Partner Contact Person's Mobile No. <span
                    class="text-danger">*</span></label>
                    <div class="input-group">
                        <label class="input-group-text" for="contact_person_phone">+91</label>
            <input type="text" class="form-control" id="contact_person_phone" name="contact_person_phone"
                placeholder="Associate partner contact person's mobile no."
                value="{{ old('contact_person_phone', $associate->contact_person_phone) }}">
                    </div>
            @error('contact_person_phone')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="contact_person_email">Associate Partner Contact Person's email ID. <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="contact_person_email" name="contact_person_email"
                placeholder="Associate partner contact person's email ID."
                value="{{ old('contact_person_email', $associate->contact_person_email) }}">
            @error('contact_person_email')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <label for="address">Hospital Bank Details <span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="bank_name" name="bank_name"
                placeholder="Bank Name" value="{{ old('bank_name', $associate->bank_name) }}">
            @error('bank_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="bank_address" name="bank_address"
                placeholder="Bank Address" value="{{ old('bank_address', $associate->bank_address) }}">
            @error('bank_address')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-2">
            <select class="form-select" id="cancel_cheque" name="cancel_cheque">
                <option value="">Cancel Cheque</option>
                <option value="Yes" {{ old('cancel_cheque', $associate->cancel_cheque) == 'Yes' ? 'selected' : '' }}>Yes
                </option>
                <option value="No"
                    {{ old('cancel_cheque', $associate->cancel_cheque) == 'No' ? 'selected' : '' }}>No
                </option>
            </select>

            @error('cancel_cheque')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-1 mt-2">
                <input type="file" name="cancel_cheque_file" id="cupload" hidden />
                <label for="cupload" class="btn btn-primary upload-label"><i
                        class="mdi mdi-upload"></i></label>
            @error('cancel_cheque_file')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 mt-3">
            <input type="number" class="form-control" id="bank_account_no" name="bank_account_no"
                placeholder="Bank Account No." value="{{ old('bank_account_no', $associate->bank_account_no) }}">
            @error('bank_account_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <input type="text" class="form-control" id="bank_ifs_code" name="bank_ifs_code"
                placeholder="Bank IFSC Code" value="{{ old('bank_ifs_code', $associate->bank_ifs_code) }}">
            @error('bank_ifs_code')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <label for="comments">Associate Partner Comments </label>
            <textarea class="form-control" id="comments" name="comments" maxlength="250" placeholder="Comments" rows="4">{{ old('comments', $associate->comments) }}</textarea>
            @error('comments')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 text-end mt-3">
            <button type="submit" class="btn btn-success" form="associate-partner-form">Update
                Associate Partner</button>
        </div>
    </div>
</form>
