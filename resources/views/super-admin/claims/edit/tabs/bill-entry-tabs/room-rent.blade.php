<div class="form-group row">

    <h5 class="mt-3">Room Rent</h5>

    <div class="col-md-3 mt-1">
        <label for="room_rent_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="room_rent_date" name="room_rent_date" maxlength="15"
        placeholder="Date" value="{{ old('room_rent_date', $bill_entry->room_rent_date) }}">
        @error('room_rent_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="room_rent_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="room_rent_from" name="room_rent_from" maxlength="30"
        placeholder="From" value="{{ old('room_rent_from', $bill_entry->room_rent_from) }}">
        @error('room_rent_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="room_rent_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="room_rent_to" name="room_rent_to" placeholder="To" value="{{ old('room_rent_to', $bill_entry->room_rent_to) }}">
        @error('room_rent_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="room_rent_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="room_rent_total_days" name="room_rent_total_days" placeholder="Total Days" value="{{ old('room_rent_total_days', $bill_entry->room_rent_total_days) }}">
        @error('room_rent_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="room_rent_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="room_rent_amount" name="room_rent_amount" placeholder="Amount" value="{{ old('room_rent_amount', $bill_entry->room_rent_amount) }}">
        @error('room_rent_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="room_rent_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="room_rent_total_amount" name="room_rent_total_amount" placeholder="Total Days * Amount" value="{{ old('room_rent_total_amount', $bill_entry->room_rent_total_amount) }}">
        @error('room_rent_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="room_rent_file" id="room_rent_file" hidden />
        <label for="room_rent_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('room_rent_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">ICU Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="icu_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="icu_charges_date" name="icu_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('icu_charges_date', $bill_entry->icu_charges_date) }}">
        @error('icu_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="icu_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="icu_charges_from" name="icu_charges_from" maxlength="30"
        placeholder="From" value="{{ old('icu_charges_from', $bill_entry->icu_charges_from) }}">
        @error('icu_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="icu_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="icu_charges_to" name="icu_charges_to" placeholder="To" value="{{ old('icu_charges_to', $bill_entry->icu_charges_to) }}">
        @error('icu_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="icu_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="icu_charges_total_days" name="icu_charges_total_days" placeholder="Total Days" value="{{ old('icu_charges_total_days', $bill_entry->icu_charges_total_days) }}">
        @error('icu_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="icu_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="icu_charges_amount" name="icu_charges_amount" placeholder="Amount" value="{{ old('icu_charges_amount', $bill_entry->icu_charges_amount) }}">
        @error('icu_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="icu_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="icu_charges_total_amount" name="icu_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('icu_charges_total_amount', $bill_entry->icu_charges_total_amount) }}">
        @error('icu_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="icu_charges_file" id="icu_charges_file" hidden />
        <label for="icu_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('icu_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Nursing Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="nursing_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="nursing_charges_date" name="nursing_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('nursing_charges_date', $bill_entry->nursing_charges_date) }}">
        @error('nursing_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="nursing_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="nursing_charges_from" name="nursing_charges_from" maxlength="30"
        placeholder="From" value="{{ old('nursing_charges_from', $bill_entry->nursing_charges_from) }}">
        @error('nursing_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="nursing_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="nursing_charges_to" name="nursing_charges_to" placeholder="To" value="{{ old('nursing_charges_to', $bill_entry->nursing_charges_to) }}">
        @error('nursing_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="nursing_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="nursing_charges_total_days" name="nursing_charges_total_days" placeholder="Total Days" value="{{ old('nursing_charges_total_days', $bill_entry->nursing_charges_total_days) }}">
        @error('nursing_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="nursing_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="nursing_charges_amount" name="nursing_charges_amount" placeholder="Amount" value="{{ old('nursing_charges_amount', $bill_entry->nursing_charges_amount) }}">
        @error('nursing_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="nursing_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="nursing_charges_total_amount" name="nursing_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('nursing_charges_total_amount', $bill_entry->nursing_charges_total_amount) }}">
        @error('nursing_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="nursing_charges_file" id="nursing_charges_file" hidden />
        <label for="nursing_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('nursing_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Diet Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="diet_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="diet_charges_date" name="diet_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('diet_charges_date', $bill_entry->diet_charges_date) }}">
        @error('diet_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="diet_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="diet_charges_from" name="diet_charges_from" maxlength="30"
        placeholder="From" value="{{ old('diet_charges_from', $bill_entry->diet_charges_from) }}">
        @error('diet_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="diet_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="diet_charges_to" name="diet_charges_to" placeholder="To" value="{{ old('diet_charges_to', $bill_entry->diet_charges_to) }}">
        @error('diet_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="diet_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="diet_charges_total_days" name="diet_charges_total_days" placeholder="Total Days" value="{{ old('diet_charges_total_days', $bill_entry->diet_charges_total_days) }}">
        @error('diet_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="diet_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="diet_charges_amount" name="diet_charges_amount" placeholder="Amount" value="{{ old('diet_charges_amount', $bill_entry->diet_charges_amount) }}">
        @error('diet_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="diet_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="diet_charges_total_amount" name="diet_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('diet_charges_total_amount', $bill_entry->diet_charges_total_amount) }}">
        @error('diet_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="diet_charges_file" id="diet_charges_file" hidden />
        <label for="diet_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('diet_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>

<div class="form-group row">

    <h5 class="mt-1">RMO Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="rmo_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="rmo_charges_date" name="rmo_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('rmo_charges_date', $bill_entry->rmo_charges_date) }}">
        @error('rmo_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="rmo_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="rmo_charges_from" name="rmo_charges_from" maxlength="30"
        placeholder="From" value="{{ old('rmo_charges_from', $bill_entry->rmo_charges_from) }}">
        @error('rmo_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="rmo_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="rmo_charges_to" name="rmo_charges_to" placeholder="To" value="{{ old('rmo_charges_to', $bill_entry->rmo_charges_to) }}">
        @error('rmo_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="rmo_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="rmo_charges_total_days" name="rmo_charges_total_days" placeholder="Total Days" value="{{ old('rmo_charges_total_days', $bill_entry->rmo_charges_total_days) }}">
        @error('rmo_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="rmo_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="rmo_charges_amount" name="rmo_charges_amount" placeholder="Amount" value="{{ old('rmo_charges_amount', $bill_entry->rmo_charges_amount) }}">
        @error('rmo_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="rmo_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="rmo_charges_total_amount" name="rmo_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('rmo_charges_total_amount', $bill_entry->rmo_charges_total_amount) }}">
        @error('rmo_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="rmo_charges_file" id="rmo_charges_file" hidden />
        <label for="rmo_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('rmo_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


