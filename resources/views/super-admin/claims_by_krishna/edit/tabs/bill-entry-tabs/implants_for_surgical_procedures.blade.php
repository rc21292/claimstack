<div class="form-group row">

    <h5 class="mt-3">Implants for Surgical Procedures</h5>

    <div class="col-md-3 mt-1">
        <label for="implants_for_surgical_procedures_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="implants_for_surgical_procedures_date" name="implants_for_surgical_procedures_date" maxlength="15"
        placeholder="Date" value="{{ old('implants_for_surgical_procedures_date', $bill_entry->implants_for_surgical_procedures_date) }}">
        @error('implants_for_surgical_procedures_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="implants_for_surgical_procedures_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="implants_for_surgical_procedures_from" name="implants_for_surgical_procedures_from" maxlength="30"
        placeholder="From" value="{{ old('implants_for_surgical_procedures_from', $bill_entry->implants_for_surgical_procedures_from) }}">
        @error('implants_for_surgical_procedures_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="implants_for_surgical_procedures_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="implants_for_surgical_procedures_to" name="implants_for_surgical_procedures_to" placeholder="To" value="{{ old('implants_for_surgical_procedures_to', $bill_entry->implants_for_surgical_procedures_to) }}">
        @error('implants_for_surgical_procedures_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="implants_for_surgical_procedures_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="implants_for_surgical_procedures_total_days" name="implants_for_surgical_procedures_total_days" placeholder="Total Days" value="{{ old('implants_for_surgical_procedures_total_days', $bill_entry->implants_for_surgical_procedures_total_days) }}">
        @error('implants_for_surgical_procedures_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="implants_for_surgical_procedures_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="implants_for_surgical_procedures_amount" name="implants_for_surgical_procedures_amount" placeholder="Amount" value="{{ old('implants_for_surgical_procedures_amount', $bill_entry->implants_for_surgical_procedures_amount) }}">
        @error('implants_for_surgical_procedures_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="implants_for_surgical_procedures_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="implants_for_surgical_procedures_total_amount" name="implants_for_surgical_procedures_total_amount" placeholder="Total Days * Amount" value="{{ old('implants_for_surgical_procedures_total_amount', $bill_entry->implants_for_surgical_procedures_total_amount) }}">
        @error('implants_for_surgical_procedures_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="implants_for_surgical_procedures_file" id="implants_for_surgical_procedures_file" hidden />
        <label for="implants_for_surgical_procedures_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('implants_for_surgical_procedures_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Prosthetics Devices</h5>

    <div class="col-md-3 mt-1">
        <label for="prosthetics_devices_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="prosthetics_devices_date" name="prosthetics_devices_date" maxlength="15"
        placeholder="Date" value="{{ old('prosthetics_devices_date', $bill_entry->prosthetics_devices_date) }}">
        @error('prosthetics_devices_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="prosthetics_devices_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="prosthetics_devices_from" name="prosthetics_devices_from" maxlength="30"
        placeholder="From" value="{{ old('prosthetics_devices_from', $bill_entry->prosthetics_devices_from) }}">
        @error('prosthetics_devices_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="prosthetics_devices_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="prosthetics_devices_to" name="prosthetics_devices_to" placeholder="To" value="{{ old('prosthetics_devices_to', $bill_entry->prosthetics_devices_to) }}">
        @error('prosthetics_devices_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="prosthetics_devices_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="prosthetics_devices_total_days" name="prosthetics_devices_total_days" placeholder="Total Days" value="{{ old('prosthetics_devices_total_days', $bill_entry->prosthetics_devices_total_days) }}">
        @error('prosthetics_devices_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="prosthetics_devices_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="prosthetics_devices_amount" name="prosthetics_devices_amount" placeholder="Amount" value="{{ old('prosthetics_devices_amount', $bill_entry->prosthetics_devices_amount) }}">
        @error('prosthetics_devices_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="prosthetics_devices_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="prosthetics_devices_total_amount" name="prosthetics_devices_total_amount" placeholder="Total Days * Amount" value="{{ old('prosthetics_devices_total_amount', $bill_entry->prosthetics_devices_total_amount) }}">
        @error('prosthetics_devices_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="prosthetics_devices_file" id="prosthetics_devices_file" hidden />
        <label for="prosthetics_devices_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('prosthetics_devices_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Other Devices</h5>

    <div class="col-md-3 mt-1">
        <label for="other_devices_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_devices_date" name="other_devices_date" maxlength="15"
        placeholder="Date" value="{{ old('other_devices_date', $bill_entry->other_devices_date) }}">
        @error('other_devices_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_devices_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_devices_from" name="other_devices_from" maxlength="30"
        placeholder="From" value="{{ old('other_devices_from', $bill_entry->other_devices_from) }}">
        @error('other_devices_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_devices_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_devices_to" name="other_devices_to" placeholder="To" value="{{ old('other_devices_to', $bill_entry->other_devices_to) }}">
        @error('other_devices_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_devices_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_devices_total_days" name="other_devices_total_days" placeholder="Total Days" value="{{ old('other_devices_total_days', $bill_entry->other_devices_total_days) }}">
        @error('other_devices_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="other_devices_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_devices_amount" name="other_devices_amount" placeholder="Amount" value="{{ old('other_devices_amount', $bill_entry->other_devices_amount) }}">
        @error('other_devices_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="other_devices_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_devices_total_amount" name="other_devices_total_amount" placeholder="Total Days * Amount" value="{{ old('other_devices_total_amount', $bill_entry->other_devices_total_amount) }}">
        @error('other_devices_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="other_devices_file" id="other_devices_file" hidden />
        <label for="other_devices_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('other_devices_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Implant Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="other_devices_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_devices_date" name="other_devices_date" maxlength="15"
        placeholder="Date" value="{{ old('other_devices_date', $bill_entry->other_devices_date) }}">
        @error('other_devices_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_devices_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_devices_from" name="other_devices_from" maxlength="30"
        placeholder="From" value="{{ old('other_devices_from', $bill_entry->other_devices_from) }}">
        @error('other_devices_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_devices_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_devices_to" name="other_devices_to" placeholder="To" value="{{ old('other_devices_to', $bill_entry->other_devices_to) }}">
        @error('other_devices_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_devices_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_devices_total_days" name="other_devices_total_days" placeholder="Total Days" value="{{ old('other_devices_total_days', $bill_entry->other_devices_total_days) }}">
        @error('other_devices_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="other_devices_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_devices_amount" name="other_devices_amount" placeholder="Amount" value="{{ old('other_devices_amount', $bill_entry->other_devices_amount) }}">
        @error('other_devices_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="other_devices_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_devices_total_amount" name="other_devices_total_amount" placeholder="Total Days * Amount" value="{{ old('other_devices_total_amount', $bill_entry->other_devices_total_amount) }}">
        @error('other_devices_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="other_devices_file" id="other_devices_file" hidden />
        <label for="other_devices_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('other_devices_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


