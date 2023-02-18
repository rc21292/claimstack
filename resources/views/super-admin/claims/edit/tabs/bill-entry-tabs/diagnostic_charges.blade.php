<div class="form-group row">

    <h5 class="mt-3">Diagnostic</h5>

    <div class="col-md-3 mt-1">
        <label for="diagnostic_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="diagnostic_charges_date" name="diagnostic_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('diagnostic_charges_date', $bill_entry->diagnostic_charges_date) }}">
        @error('diagnostic_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="diagnostic_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="diagnostic_charges_from" name="diagnostic_charges_from" maxlength="30"
        placeholder="From" value="{{ old('diagnostic_charges_from', $bill_entry->diagnostic_charges_from) }}">
        @error('diagnostic_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="diagnostic_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="diagnostic_charges_to" name="diagnostic_charges_to" placeholder="To" value="{{ old('diagnostic_charges_to', $bill_entry->diagnostic_charges_to) }}">
        @error('diagnostic_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="diagnostic_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="diagnostic_charges_total_days" name="diagnostic_charges_total_days" placeholder="Total Days" value="{{ old('diagnostic_charges_total_days', $bill_entry->diagnostic_charges_total_days) }}">
        @error('diagnostic_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="diagnostic_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="diagnostic_charges_amount" name="diagnostic_charges_amount" placeholder="Amount" value="{{ old('diagnostic_charges_amount', $bill_entry->diagnostic_charges_amount) }}">
        @error('diagnostic_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="diagnostic_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="diagnostic_charges_total_amount" name="diagnostic_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('diagnostic_charges_total_amount', $bill_entry->diagnostic_charges_total_amount) }}">
        @error('diagnostic_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="diagnostic_charges_file" id="diagnostic_charges_file" hidden />
        <label for="diagnostic_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('diagnostic_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Lab Tests</h5>

    <div class="col-md-3 mt-1">
        <label for="lab_tests_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="lab_tests_date" name="lab_tests_date" maxlength="15"
        placeholder="Date" value="{{ old('lab_tests_date', $bill_entry->lab_tests_date) }}">
        @error('lab_tests_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="lab_tests_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="lab_tests_from" name="lab_tests_from" maxlength="30"
        placeholder="From" value="{{ old('lab_tests_from', $bill_entry->lab_tests_from) }}">
        @error('lab_tests_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="lab_tests_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="lab_tests_to" name="lab_tests_to" placeholder="To" value="{{ old('lab_tests_to', $bill_entry->lab_tests_to) }}">
        @error('lab_tests_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="lab_tests_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="lab_tests_total_days" name="lab_tests_total_days" placeholder="Total Days" value="{{ old('lab_tests_total_days', $bill_entry->lab_tests_total_days) }}">
        @error('lab_tests_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="lab_tests_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="lab_tests_amount" name="lab_tests_amount" placeholder="Amount" value="{{ old('lab_tests_amount', $bill_entry->lab_tests_amount) }}">
        @error('lab_tests_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="lab_tests_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="lab_tests_total_amount" name="lab_tests_total_amount" placeholder="Total Days * Amount" value="{{ old('lab_tests_total_amount', $bill_entry->lab_tests_total_amount) }}">
        @error('lab_tests_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="lab_tests_file" id="lab_tests_file" hidden />
        <label for="lab_tests_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('lab_tests_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Investigation</h5>

    <div class="col-md-3 mt-1">
        <label for="investigation_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="investigation_date" name="investigation_date" maxlength="15"
        placeholder="Date" value="{{ old('investigation_date', $bill_entry->investigation_date) }}">
        @error('investigation_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="investigation_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="investigation_from" name="investigation_from" maxlength="30"
        placeholder="From" value="{{ old('investigation_from', $bill_entry->investigation_from) }}">
        @error('investigation_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="investigation_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="investigation_to" name="investigation_to" placeholder="To" value="{{ old('investigation_to', $bill_entry->investigation_to) }}">
        @error('investigation_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="investigation_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="investigation_total_days" name="investigation_total_days" placeholder="Total Days" value="{{ old('investigation_total_days', $bill_entry->investigation_total_days) }}">
        @error('investigation_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="investigation_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="investigation_amount" name="investigation_amount" placeholder="Amount" value="{{ old('investigation_amount', $bill_entry->investigation_amount) }}">
        @error('investigation_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="investigation_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="investigation_total_amount" name="investigation_total_amount" placeholder="Total Days * Amount" value="{{ old('investigation_total_amount', $bill_entry->investigation_total_amount) }}">
        @error('investigation_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="investigation_file" id="investigation_file" hidden />
        <label for="investigation_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('investigation_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Imaging Investigation</h5>

    <div class="col-md-3 mt-1">
        <label for="imaging_investigation_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="imaging_investigation_date" name="imaging_investigation_date" maxlength="15"
        placeholder="Date" value="{{ old('imaging_investigation_date', $bill_entry->imaging_investigation_date) }}">
        @error('imaging_investigation_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="imaging_investigation_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="imaging_investigation_from" name="imaging_investigation_from" maxlength="30"
        placeholder="From" value="{{ old('imaging_investigation_from', $bill_entry->imaging_investigation_from) }}">
        @error('imaging_investigation_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="imaging_investigation_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="imaging_investigation_to" name="imaging_investigation_to" placeholder="To" value="{{ old('imaging_investigation_to', $bill_entry->imaging_investigation_to) }}">
        @error('imaging_investigation_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="imaging_investigation_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="imaging_investigation_total_days" name="imaging_investigation_total_days" placeholder="Total Days" value="{{ old('imaging_investigation_total_days', $bill_entry->imaging_investigation_total_days) }}">
        @error('imaging_investigation_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="imaging_investigation_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="imaging_investigation_amount" name="imaging_investigation_amount" placeholder="Amount" value="{{ old('imaging_investigation_amount', $bill_entry->imaging_investigation_amount) }}">
        @error('imaging_investigation_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="imaging_investigation_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="imaging_investigation_total_amount" name="imaging_investigation_total_amount" placeholder="Total Days * Amount" value="{{ old('imaging_investigation_total_amount', $bill_entry->imaging_investigation_total_amount) }}">
        @error('imaging_investigation_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="imaging_investigation_file" id="imaging_investigation_file" hidden />
        <label for="imaging_investigation_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('imaging_investigation_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>