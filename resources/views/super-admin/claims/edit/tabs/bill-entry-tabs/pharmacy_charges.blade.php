<div class="form-group row">

    <h5 class="mt-3">Pharmacy Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="pharmacy_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="pharmacy_charges_date" name="pharmacy_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('pharmacy_charges_date', $bill_entry->pharmacy_charges_date) }}">
        @error('pharmacy_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="pharmacy_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="pharmacy_charges_from" name="pharmacy_charges_from" maxlength="30"
        placeholder="From" value="{{ old('pharmacy_charges_from', $bill_entry->pharmacy_charges_from) }}">
        @error('pharmacy_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="pharmacy_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="pharmacy_charges_to" name="pharmacy_charges_to" placeholder="To" value="{{ old('pharmacy_charges_to', $bill_entry->pharmacy_charges_to) }}">
        @error('pharmacy_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="pharmacy_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="pharmacy_charges_total_days" name="pharmacy_charges_total_days" placeholder="Total Days" value="{{ old('pharmacy_charges_total_days', $bill_entry->pharmacy_charges_total_days) }}">
        @error('pharmacy_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="pharmacy_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="pharmacy_charges_amount" name="pharmacy_charges_amount" placeholder="Amount" value="{{ old('pharmacy_charges_amount', $bill_entry->pharmacy_charges_amount) }}">
        @error('pharmacy_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="pharmacy_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="pharmacy_charges_total_amount" name="pharmacy_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('pharmacy_charges_total_amount', $bill_entry->pharmacy_charges_total_amount) }}">
        @error('pharmacy_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="pharmacy_charges_file" id="pharmacy_charges_file" hidden />
        <label for="pharmacy_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('pharmacy_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                     
</div>


<div class="form-group row">

    <h5 class="mt-">Medicines</h5>

    <div class="col-md-3 mt-1">
        <label for="medicines_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="medicines_date" name="medicines_date" maxlength="15"
        placeholder="Date" value="{{ old('medicines_date', $bill_entry->medicines_date) }}">
        @error('medicines_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="medicines_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="medicines_from" name="medicines_from" maxlength="30"
        placeholder="From" value="{{ old('medicines_from', $bill_entry->medicines_from) }}">
        @error('medicines_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="medicines_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="medicines_to" name="medicines_to" placeholder="To" value="{{ old('medicines_to', $bill_entry->medicines_to) }}">
        @error('medicines_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="medicines_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="medicines_total_days" name="medicines_total_days" placeholder="Total Days" value="{{ old('medicines_total_days', $bill_entry->medicines_total_days) }}">
        @error('medicines_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="medicines_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="medicines_amount" name="medicines_amount" placeholder="Amount" value="{{ old('medicines_amount', $bill_entry->medicines_amount) }}">
        @error('medicines_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="medicines_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="medicines_total_amount" name="medicines_total_amount" placeholder="Total Days * Amount" value="{{ old('medicines_total_amount', $bill_entry->medicines_total_amount) }}">
        @error('medicines_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="medicines_file" id="medicines_file" hidden />
        <label for="medicines_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('medicines_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Drugs</h5>

    <div class="col-md-3 mt-1">
        <label for="drugs_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="drugs_date" name="drugs_date" maxlength="15"
        placeholder="Date" value="{{ old('drugs_date', $bill_entry->drugs_date) }}">
        @error('drugs_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="drugs_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="drugs_from" name="drugs_from" maxlength="30"
        placeholder="From" value="{{ old('drugs_from', $bill_entry->drugs_from) }}">
        @error('drugs_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="drugs_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="drugs_to" name="drugs_to" placeholder="To" value="{{ old('drugs_to', $bill_entry->drugs_to) }}">
        @error('drugs_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="drugs_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="drugs_total_days" name="drugs_total_days" placeholder="Total Days" value="{{ old('drugs_total_days', $bill_entry->drugs_total_days) }}">
        @error('drugs_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="drugs_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="drugs_amount" name="drugs_amount" placeholder="Amount" value="{{ old('drugs_amount', $bill_entry->drugs_amount) }}">
        @error('drugs_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="drugs_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="drugs_total_amount" name="drugs_total_amount" placeholder="Total Days * Amount" value="{{ old('drugs_total_amount', $bill_entry->drugs_total_amount) }}">
        @error('drugs_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="drugs_file" id="drugs_file" hidden />
        <label for="drugs_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('drugs_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


