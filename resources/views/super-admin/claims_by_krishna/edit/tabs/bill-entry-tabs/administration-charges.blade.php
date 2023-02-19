<div class="form-group row">

    <h5 class="mt-3">Administration Charges</h5>

    <div class="col-md-3 mt-1">
        <label for="administration_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="administration_charges_date" name="administration_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('administration_charges_date',$bill_entry->administration_charges_date) }}">
        @error('administration_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="administration_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="administration_charges_from" name="administration_charges_from" maxlength="30"
        placeholder="From" value="{{ old('administration_charges_from',$bill_entry->administration_charges_from) }}">
        @error('administration_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="administration_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="administration_charges_to" name="administration_charges_to" placeholder="To" value="{{ old('administration_charges_to',$bill_entry->administration_charges_to) }}">
        @error('administration_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="administration_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="administration_charges_total_days" name="administration_charges_total_days" placeholder="Total Days" value="{{ old('administration_charges_total_days',$bill_entry->administration_charges_total_days) }}">
        @error('administration_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="administration_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="administration_charges_amount" name="administration_charges_amount" placeholder="Amount" value="{{ old('administration_charges_amount',$bill_entry->administration_charges_amount) }}">
        @error('administration_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="administration_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="administration_charges_total_amount" name="administration_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('administration_charges_total_amount',$bill_entry->administration_charges_total_amount) }}">
        @error('administration_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="administration_charges_file" id="administration_charges_file" hidden />
        <label for="administration_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('administration_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">IV Fluids</h5>

    <div class="col-md-3 mt-1">
        <label for="iv_fluids_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="iv_fluids_date" name="iv_fluids_date" maxlength="15"
        placeholder="Date" value="{{ old('iv_fluids_date',$bill_entry->iv_fluids_date) }}">
        @error('iv_fluids_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="iv_fluids_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="iv_fluids_from" name="iv_fluids_from" maxlength="30"
        placeholder="From" value="{{ old('iv_fluids_from',$bill_entry->iv_fluids_from) }}">
        @error('iv_fluids_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="iv_fluids_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="iv_fluids_to" name="iv_fluids_to" placeholder="To" value="{{ old('iv_fluids_to',$bill_entry->iv_fluids_to) }}">
        @error('iv_fluids_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="iv_fluids_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="iv_fluids_total_days" name="iv_fluids_total_days" placeholder="Total Days" value="{{ old('iv_fluids_total_days',$bill_entry->iv_fluids_total_days) }}">
        @error('iv_fluids_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="iv_fluids_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="iv_fluids_amount" name="iv_fluids_amount" placeholder="Amount" value="{{ old('iv_fluids_amount',$bill_entry->iv_fluids_amount) }}">
        @error('iv_fluids_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="iv_fluids_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="iv_fluids_total_amount" name="iv_fluids_total_amount" placeholder="Total Days * Amount" value="{{ old('iv_fluids_total_amount',$bill_entry->iv_fluids_total_amount) }}">
        @error('iv_fluids_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="iv_fluids_file" id="iv_fluids_file" hidden />
        <label for="iv_fluids_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('iv_fluids_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Blood transfusion</h5>

    <div class="col-md-3 mt-1">
        <label for="blood_transfusion_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="blood_transfusion_date" name="blood_transfusion_date" maxlength="15"
        placeholder="Date" value="{{ old('blood_transfusion_date',$bill_entry->blood_transfusion_date) }}">
        @error('blood_transfusion_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="blood_transfusion_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="blood_transfusion_from" name="blood_transfusion_from" maxlength="30"
        placeholder="From" value="{{ old('blood_transfusion_from',$bill_entry->blood_transfusion_from) }}">
        @error('blood_transfusion_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="blood_transfusion_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="blood_transfusion_to" name="blood_transfusion_to" placeholder="To" value="{{ old('blood_transfusion_to',$bill_entry->blood_transfusion_to) }}">
        @error('blood_transfusion_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="blood_transfusion_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="blood_transfusion_total_days" name="blood_transfusion_total_days" placeholder="Total Days" value="{{ old('blood_transfusion_total_days',$bill_entry->blood_transfusion_total_days) }}">
        @error('blood_transfusion_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="blood_transfusion_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="blood_transfusion_amount" name="blood_transfusion_amount" placeholder="Amount" value="{{ old('blood_transfusion_amount',$bill_entry->blood_transfusion_amount) }}">
        @error('blood_transfusion_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="blood_transfusion_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="blood_transfusion_total_amount" name="blood_transfusion_total_amount" placeholder="Total Days * Amount" value="{{ old('blood_transfusion_total_amount',$bill_entry->blood_transfusion_total_amount) }}">
        @error('blood_transfusion_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="blood_transfusion_file" id="blood_transfusion_file" hidden />
        <label for="blood_transfusion_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('blood_transfusion_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Injection</h5>

    <div class="col-md-3 mt-1">
        <label for="injection_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="injection_date" name="injection_date" maxlength="15"
        placeholder="Date" value="{{ old('injection_date',$bill_entry->injection_date) }}">
        @error('injection_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="injection_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="injection_from" name="injection_from" maxlength="30"
        placeholder="From" value="{{ old('injection_from',$bill_entry->injection_from) }}">
        @error('injection_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="injection_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="injection_to" name="injection_to" placeholder="To" value="{{ old('injection_to',$bill_entry->injection_to) }}">
        @error('injection_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="injection_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="injection_total_days" name="injection_total_days" placeholder="Total Days" value="{{ old('injection_total_days',$bill_entry->injection_total_days) }}">
        @error('injection_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="injection_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="injection_amount" name="injection_amount" placeholder="Amount" value="{{ old('injection_amount',$bill_entry->injection_amount) }}">
        @error('injection_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="injection_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="injection_total_amount" name="injection_total_amount" placeholder="Total Days * Amount" value="{{ old('injection_total_amount',$bill_entry->injection_total_amount) }}">
        @error('injection_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="injection_file" id="injection_file" hidden />
        <label for="injection_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('injection_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


