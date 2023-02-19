<div class="form-group row">

    <h5 class="mt-4">OPD</h5>

    <div class="col-md-3 mt-2">
        <label for="opd_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="opd_charges_date" name="opd_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('opd_charges_date') }}">
        @error('opd_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="opd_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="opd_charges_from" name="opd_charges_from" maxlength="30"
        placeholder="From" value="{{ old('opd_charges_from') }}">
        @error('opd_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="opd_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="opd_charges_to" name="opd_charges_to" placeholder="To" value="{{ old('opd_charges_to') }}">
        @error('opd_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="opd_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="opd_charges_total_days" name="opd_charges_total_days" placeholder="Total Days" value="{{ old('opd_charges_total_days') }}">
        @error('opd_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="opd_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="opd_charges_amount" name="opd_charges_amount" placeholder="Amount" value="{{ old('opd_charges_amount') }}">
        @error('opd_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="opd_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="opd_charges_total_amount" name="opd_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('opd_charges_total_amount') }}">
        @error('opd_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="opd_charges_file" id="opd_charges_file" hidden />
        <label for="opd_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('opd_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-2">Wellness</h5>

    <div class="col-md-3 mt-2">
        <label for="wellness_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="wellness_date" name="wellness_date" maxlength="15"
        placeholder="Date" value="{{ old('wellness_date') }}">
        @error('wellness_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="wellness_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="wellness_from" name="wellness_from" maxlength="30"
        placeholder="From" value="{{ old('wellness_from') }}">
        @error('wellness_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="wellness_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="wellness_to" name="wellness_to" placeholder="To" value="{{ old('wellness_to') }}">
        @error('wellness_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="wellness_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="wellness_total_days" name="wellness_total_days" placeholder="Total Days" value="{{ old('wellness_total_days') }}">
        @error('wellness_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="wellness_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="wellness_amount" name="wellness_amount" placeholder="Amount" value="{{ old('wellness_amount') }}">
        @error('wellness_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="wellness_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="wellness_total_amount" name="wellness_total_amount" placeholder="Total Days * Amount" value="{{ old('wellness_total_amount') }}">
        @error('wellness_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="wellness_file" id="wellness_file" hidden />
        <label for="wellness_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('wellness_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


