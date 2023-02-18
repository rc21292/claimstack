<div class="form-group row">

    <h5 class="mt-3">Other Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="other_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_charges_date" name="other_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('other_charges_date', $bill_entry->other_charges_date) }}">
        @error('other_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_charges_from" name="other_charges_from" maxlength="30"
        placeholder="From" value="{{ old('other_charges_from', $bill_entry->other_charges_from) }}">
        @error('other_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_charges_to" name="other_charges_to" placeholder="To" value="{{ old('other_charges_to', $bill_entry->other_charges_to) }}">
        @error('other_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="other_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_charges_total_days" name="other_charges_total_days" placeholder="Total Days" value="{{ old('other_charges_total_days', $bill_entry->other_charges_total_days) }}">
        @error('other_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="other_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_charges_amount" name="other_charges_amount" placeholder="Amount" value="{{ old('other_charges_amount', $bill_entry->other_charges_amount) }}">
        @error('other_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="other_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_charges_total_amount" name="other_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('other_charges_total_amount', $bill_entry->other_charges_total_amount) }}">
        @error('other_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="other_charges_file" id="other_charges_file" hidden />
        <label for="other_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('other_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Anaesthesia</h5>

    <div class="col-md-3 mt-1">
        <label for="anaesthesia_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="anaesthesia_date" name="anaesthesia_date" maxlength="15"
        placeholder="Date" value="{{ old('anaesthesia_date', $bill_entry->anaesthesia_date) }}">
        @error('anaesthesia_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="anaesthesia_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="anaesthesia_from" name="anaesthesia_from" maxlength="30"
        placeholder="From" value="{{ old('anaesthesia_from', $bill_entry->anaesthesia_from) }}">
        @error('anaesthesia_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="anaesthesia_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="anaesthesia_to" name="anaesthesia_to" placeholder="To" value="{{ old('anaesthesia_to', $bill_entry->anaesthesia_to) }}">
        @error('anaesthesia_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="anaesthesia_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="anaesthesia_total_days" name="anaesthesia_total_days" placeholder="Total Days" value="{{ old('anaesthesia_total_days', $bill_entry->anaesthesia_total_days) }}">
        @error('anaesthesia_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="anaesthesia_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="anaesthesia_amount" name="anaesthesia_amount" placeholder="Amount" value="{{ old('anaesthesia_amount', $bill_entry->anaesthesia_amount) }}">
        @error('anaesthesia_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="anaesthesia_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="anaesthesia_total_amount" name="anaesthesia_total_amount" placeholder="Total Days * Amount" value="{{ old('anaesthesia_total_amount', $bill_entry->anaesthesia_total_amount) }}">
        @error('anaesthesia_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="anaesthesia_file" id="anaesthesia_file" hidden />
        <label for="anaesthesia_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('anaesthesia_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Blood</h5>

    <div class="col-md-3 mt-1">
        <label for="blood_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="blood_date" name="blood_date" maxlength="15"
        placeholder="Date" value="{{ old('blood_date', $bill_entry->blood_date) }}">
        @error('blood_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="blood_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="blood_from" name="blood_from" maxlength="30"
        placeholder="From" value="{{ old('blood_from', $bill_entry->blood_from) }}">
        @error('blood_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="blood_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="blood_to" name="blood_to" placeholder="To" value="{{ old('blood_to', $bill_entry->blood_to) }}">
        @error('blood_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="blood_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="blood_total_days" name="blood_total_days" placeholder="Total Days" value="{{ old('blood_total_days', $bill_entry->blood_total_days) }}">
        @error('blood_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="blood_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="blood_amount" name="blood_amount" placeholder="Amount" value="{{ old('blood_amount', $bill_entry->blood_amount) }}">
        @error('blood_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="blood_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="blood_total_amount" name="blood_total_amount" placeholder="Total Days * Amount" value="{{ old('blood_total_amount', $bill_entry->blood_total_amount) }}">
        @error('blood_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="blood_file" id="blood_file" hidden />
        <label for="blood_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('blood_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Oxygen</h5>

    <div class="col-md-3 mt-1">
        <label for="oxygen_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="oxygen_date" name="oxygen_date" maxlength="15"
        placeholder="Date" value="{{ old('oxygen_date', $bill_entry->oxygen_date) }}">
        @error('oxygen_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="oxygen_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="oxygen_from" name="oxygen_from" maxlength="30"
        placeholder="From" value="{{ old('oxygen_from', $bill_entry->oxygen_from) }}">
        @error('oxygen_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="oxygen_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="oxygen_to" name="oxygen_to" placeholder="To" value="{{ old('oxygen_to', $bill_entry->oxygen_to) }}">
        @error('oxygen_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="oxygen_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="oxygen_total_days" name="oxygen_total_days" placeholder="Total Days" value="{{ old('oxygen_total_days', $bill_entry->oxygen_total_days) }}">
        @error('oxygen_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="oxygen_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="oxygen_amount" name="oxygen_amount" placeholder="Amount" value="{{ old('oxygen_amount', $bill_entry->oxygen_amount) }}">
        @error('oxygen_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="oxygen_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="oxygen_total_amount" name="oxygen_total_amount" placeholder="Total Days * Amount" value="{{ old('oxygen_total_amount', $bill_entry->oxygen_total_amount) }}">
        @error('oxygen_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="oxygen_file" id="oxygen_file" hidden />
        <label for="oxygen_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('oxygen_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Operation Theatre Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="operation_theatre_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="operation_theatre_charges_date" name="operation_theatre_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('operation_theatre_charges_date', $bill_entry->operation_theatre_charges_date) }}">
        @error('operation_theatre_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="operation_theatre_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="operation_theatre_charges_from" name="operation_theatre_charges_from" maxlength="30"
        placeholder="From" value="{{ old('operation_theatre_charges_from', $bill_entry->operation_theatre_charges_from) }}">
        @error('operation_theatre_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="operation_theatre_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="operation_theatre_charges_to" name="operation_theatre_charges_to" placeholder="To" value="{{ old('operation_theatre_charges_to', $bill_entry->operation_theatre_charges_to) }}">
        @error('operation_theatre_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="operation_theatre_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="operation_theatre_charges_total_days" name="operation_theatre_charges_total_days" placeholder="Total Days" value="{{ old('operation_theatre_charges_total_days', $bill_entry->operation_theatre_charges_total_days) }}">
        @error('operation_theatre_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="operation_theatre_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="operation_theatre_charges_amount" name="operation_theatre_charges_amount" placeholder="Amount" value="{{ old('operation_theatre_charges_amount', $bill_entry->operation_theatre_charges_amount) }}">
        @error('operation_theatre_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="operation_theatre_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="operation_theatre_charges_total_amount" name="operation_theatre_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('operation_theatre_charges_total_amount', $bill_entry->operation_theatre_charges_total_amount) }}">
        @error('operation_theatre_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="operation_theatre_charges_file" id="operation_theatre_charges_file" hidden />
        <label for="operation_theatre_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('operation_theatre_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Surgical Appliances Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="surgical_appliances_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="surgical_appliances_charges_date" name="surgical_appliances_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('surgical_appliances_charges_date', $bill_entry->surgical_appliances_charges_date) }}">
        @error('surgical_appliances_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="surgical_appliances_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="surgical_appliances_charges_from" name="surgical_appliances_charges_from" maxlength="30"
        placeholder="From" value="{{ old('surgical_appliances_charges_from', $bill_entry->surgical_appliances_charges_from) }}">
        @error('surgical_appliances_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="surgical_appliances_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="surgical_appliances_charges_to" name="surgical_appliances_charges_to" placeholder="To" value="{{ old('surgical_appliances_charges_to', $bill_entry->surgical_appliances_charges_to) }}">
        @error('surgical_appliances_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="surgical_appliances_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="surgical_appliances_charges_total_days" name="surgical_appliances_charges_total_days" placeholder="Total Days" value="{{ old('surgical_appliances_charges_total_days', $bill_entry->surgical_appliances_charges_total_days) }}">
        @error('surgical_appliances_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="surgical_appliances_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="surgical_appliances_charges_amount" name="surgical_appliances_charges_amount" placeholder="Amount" value="{{ old('surgical_appliances_charges_amount', $bill_entry->surgical_appliances_charges_amount) }}">
        @error('surgical_appliances_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="surgical_appliances_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="surgical_appliances_charges_total_amount" name="surgical_appliances_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('surgical_appliances_charges_total_amount', $bill_entry->surgical_appliances_charges_total_amount) }}">
        @error('surgical_appliances_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="surgical_appliances_charges_file" id="surgical_appliances_charges_file" hidden />
        <label for="surgical_appliances_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('surgical_appliances_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


