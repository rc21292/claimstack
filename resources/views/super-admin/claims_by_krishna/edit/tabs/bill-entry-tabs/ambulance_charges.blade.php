<div class="form-group row">

    <h5 class="mt-4">Ambulance Charges</h5>

    <div class="col-md-3 mt-2">
        <label for="ambulance_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="ambulance_charges_date" name="ambulance_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('ambulance_charges_date', $bill_entry->ambulance_charges_date) }}">
        @error('ambulance_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="ambulance_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="ambulance_charges_from" name="ambulance_charges_from" maxlength="30"
        placeholder="From" value="{{ old('ambulance_charges_from', $bill_entry->ambulance_charges_from) }}">
        @error('ambulance_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="ambulance_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="ambulance_charges_to" name="ambulance_charges_to" placeholder="To" value="{{ old('ambulance_charges_to', $bill_entry->ambulance_charges_to) }}">
        @error('ambulance_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="ambulance_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="ambulance_charges_total_days" name="ambulance_charges_total_days" placeholder="Total Days" value="{{ old('ambulance_charges_total_days', $bill_entry->ambulance_charges_total_days) }}">
        @error('ambulance_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="ambulance_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="ambulance_charges_amount" name="ambulance_charges_amount" placeholder="Amount" value="{{ old('ambulance_charges_amount', $bill_entry->ambulance_charges_amount) }}">
        @error('ambulance_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="ambulance_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="ambulance_charges_total_amount" name="ambulance_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('ambulance_charges_total_amount', $bill_entry->ambulance_charges_total_amount) }}">
        @error('ambulance_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="ambulance_charges_file" id="ambulance_charges_file" hidden />
        <label for="ambulance_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('ambulance_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>