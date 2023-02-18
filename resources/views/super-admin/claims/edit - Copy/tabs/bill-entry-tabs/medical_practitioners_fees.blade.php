<div class="form-group row">

    <h5 class="mt-3">Medical Practitioner’s Fees</h5>

    <div class="col-md-3 mt-1">
        <label for="medical_practitioners_fees_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="medical_practitioners_fees_date" name="medical_practitioners_fees_date" maxlength="15"
        placeholder="Date" value="{{ old('medical_practitioners_fees_date') }}">
        @error('medical_practitioners_fees_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="medical_practitioners_fees_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="medical_practitioners_fees_from" name="medical_practitioners_fees_from" maxlength="30"
        placeholder="From" value="{{ old('medical_practitioners_fees_from') }}">
        @error('medical_practitioners_fees_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="medical_practitioners_fees_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="medical_practitioners_fees_to" name="medical_practitioners_fees_to" placeholder="To" value="{{ old('medical_practitioners_fees_to') }}">
        @error('medical_practitioners_fees_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="medical_practitioners_fees_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="medical_practitioners_fees_total_days" name="medical_practitioners_fees_total_days" placeholder="Total Days" value="{{ old('medical_practitioners_fees_total_days') }}">
        @error('medical_practitioners_fees_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="medical_practitioners_fees_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="medical_practitioners_fees_amount" name="medical_practitioners_fees_amount" placeholder="Amount" value="{{ old('medical_practitioners_fees_amount') }}">
        @error('medical_practitioners_fees_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="medical_practitioners_fees_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="medical_practitioners_fees_total_amount" name="medical_practitioners_fees_total_amount" placeholder="Total Days * Amount" value="{{ old('medical_practitioners_fees_total_amount') }}">
        @error('medical_practitioners_fees_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="medical_practitioners_fees_file" id="medical_practitioners_fees_file" hidden />
        <label for="medical_practitioners_fees_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('medical_practitioners_fees_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Specialists Visti</h5>

    <div class="col-md-3 mt-1">
        <label for="specialists_visit_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="specialists_visit_date" name="specialists_visit_date" maxlength="15"
        placeholder="Date" value="{{ old('specialists_visit_date') }}">
        @error('specialists_visit_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="specialists_visit_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="specialists_visit_from" name="specialists_visit_from" maxlength="30"
        placeholder="From" value="{{ old('specialists_visit_from') }}">
        @error('specialists_visit_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="specialists_visit_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="specialists_visit_to" name="specialists_visit_to" placeholder="To" value="{{ old('specialists_visit_to') }}">
        @error('specialists_visit_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="specialists_visit_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="specialists_visit_total_days" name="specialists_visit_total_days" placeholder="Total Days" value="{{ old('specialists_visit_total_days') }}">
        @error('specialists_visit_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="specialists_visit_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="specialists_visit_amount" name="specialists_visit_amount" placeholder="Amount" value="{{ old('specialists_visit_amount') }}">
        @error('specialists_visit_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="specialists_visit_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="specialists_visit_total_amount" name="specialists_visit_total_amount" placeholder="Total Days * Amount" value="{{ old('specialists_visit_total_amount') }}">
        @error('specialists_visit_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="specialists_visit_file" id="specialists_visit_file" hidden />
        <label for="specialists_visit_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('specialists_visit_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Consultants Visit</h5>

    <div class="col-md-3 mt-1">
        <label for="consultants_visit_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="consultants_visit_date" name="consultants_visit_date" maxlength="15"
        placeholder="Date" value="{{ old('consultants_visit_date') }}">
        @error('consultants_visit_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="consultants_visit_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="consultants_visit_from" name="consultants_visit_from" maxlength="30"
        placeholder="From" value="{{ old('consultants_visit_from') }}">
        @error('consultants_visit_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="consultants_visit_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="consultants_visit_to" name="consultants_visit_to" placeholder="To" value="{{ old('consultants_visit_to') }}">
        @error('consultants_visit_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="consultants_visit_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="consultants_visit_total_days" name="consultants_visit_total_days" placeholder="Total Days" value="{{ old('consultants_visit_total_days') }}">
        @error('consultants_visit_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="consultants_visit_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="consultants_visit_amount" name="consultants_visit_amount" placeholder="Amount" value="{{ old('consultants_visit_amount') }}">
        @error('consultants_visit_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="consultants_visit_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="consultants_visit_total_amount" name="consultants_visit_total_amount" placeholder="Total Days * Amount" value="{{ old('consultants_visit_total_amount') }}">
        @error('consultants_visit_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="consultants_visit_file" id="consultants_visit_file" hidden />
        <label for="consultants_visit_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('consultants_visit_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Surgeon fees Visit</h5>

    <div class="col-md-3 mt-1">
        <label for="surgeon_fees_visit_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="surgeon_fees_visit_date" name="surgeon_fees_visit_date" maxlength="15"
        placeholder="Date" value="{{ old('surgeon_fees_visit_date') }}">
        @error('surgeon_fees_visit_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="surgeon_fees_visit_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="surgeon_fees_visit_from" name="surgeon_fees_visit_from" maxlength="30"
        placeholder="From" value="{{ old('surgeon_fees_visit_from') }}">
        @error('surgeon_fees_visit_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="surgeon_fees_visit_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="surgeon_fees_visit_to" name="surgeon_fees_visit_to" placeholder="To" value="{{ old('surgeon_fees_visit_to') }}">
        @error('surgeon_fees_visit_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="surgeon_fees_visit_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="surgeon_fees_visit_total_days" name="surgeon_fees_visit_total_days" placeholder="Total Days" value="{{ old('surgeon_fees_visit_total_days') }}">
        @error('surgeon_fees_visit_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="surgeon_fees_visit_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="surgeon_fees_visit_amount" name="surgeon_fees_visit_amount" placeholder="Amount" value="{{ old('surgeon_fees_visit_amount') }}">
        @error('surgeon_fees_visit_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="surgeon_fees_visit_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="surgeon_fees_visit_total_amount" name="surgeon_fees_visit_total_amount" placeholder="Total Days * Amount" value="{{ old('surgeon_fees_visit_total_amount') }}">
        @error('surgeon_fees_visit_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="surgeon_fees_visit_file" id="surgeon_fees_visit_file" hidden />
        <label for="surgeon_fees_visit_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('surgeon_fees_visit_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Anaesthetist</h5>

    <div class="col-md-3 mt-1">
        <label for="anaesthetist_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="anaesthetist_date" name="anaesthetist_date" maxlength="15"
        placeholder="Date" value="{{ old('anaesthetist_date') }}">
        @error('anaesthetist_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="anaesthetist_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="anaesthetist_from" name="anaesthetist_from" maxlength="30"
        placeholder="From" value="{{ old('anaesthetist_from') }}">
        @error('anaesthetist_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="anaesthetist_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="anaesthetist_to" name="anaesthetist_to" placeholder="To" value="{{ old('anaesthetist_to') }}">
        @error('anaesthetist_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="anaesthetist_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="anaesthetist_total_days" name="anaesthetist_total_days" placeholder="Total Days" value="{{ old('anaesthetist_total_days') }}">
        @error('anaesthetist_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="anaesthetist_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="anaesthetist_amount" name="anaesthetist_amount" placeholder="Amount" value="{{ old('anaesthetist_amount') }}">
        @error('anaesthetist_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="anaesthetist_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="anaesthetist_total_amount" name="anaesthetist_total_amount" placeholder="Total Days * Amount" value="{{ old('anaesthetist_total_amount') }}">
        @error('anaesthetist_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="anaesthetist_file" id="anaesthetist_file" hidden />
        <label for="anaesthetist_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('anaesthetist_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">OT Assistant</h5>

    <div class="col-md-3 mt-1">
        <label for="ot_assistant_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="ot_assistant_date" name="ot_assistant_date" maxlength="15"
        placeholder="Date" value="{{ old('ot_assistant_date') }}">
        @error('ot_assistant_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="ot_assistant_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="ot_assistant_from" name="ot_assistant_from" maxlength="30"
        placeholder="From" value="{{ old('ot_assistant_from') }}">
        @error('ot_assistant_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="ot_assistant_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="ot_assistant_to" name="ot_assistant_to" placeholder="To" value="{{ old('ot_assistant_to') }}">
        @error('ot_assistant_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="ot_assistant_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="ot_assistant_total_days" name="ot_assistant_total_days" placeholder="Total Days" value="{{ old('ot_assistant_total_days') }}">
        @error('ot_assistant_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="ot_assistant_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="ot_assistant_amount" name="ot_assistant_amount" placeholder="Amount" value="{{ old('ot_assistant_amount') }}">
        @error('ot_assistant_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="ot_assistant_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="ot_assistant_total_amount" name="ot_assistant_total_amount" placeholder="Total Days * Amount" value="{{ old('ot_assistant_total_amount') }}">
        @error('ot_assistant_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="ot_assistant_file" id="ot_assistant_file" hidden />
        <label for="ot_assistant_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('ot_assistant_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-1">Physiotherapy</h5>

    <div class="col-md-3 mt-1">
        <label for="physiotherapy_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="physiotherapy_date" name="physiotherapy_date" maxlength="15"
        placeholder="Date" value="{{ old('physiotherapy_date') }}">
        @error('physiotherapy_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="physiotherapy_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="physiotherapy_from" name="physiotherapy_from" maxlength="30"
        placeholder="From" value="{{ old('physiotherapy_from') }}">
        @error('physiotherapy_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="physiotherapy_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="physiotherapy_to" name="physiotherapy_to" placeholder="To" value="{{ old('physiotherapy_to') }}">
        @error('physiotherapy_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-1">
        <label for="physiotherapy_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="physiotherapy_total_days" name="physiotherapy_total_days" placeholder="Total Days" value="{{ old('physiotherapy_total_days') }}">
        @error('physiotherapy_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-1">
        <label for="physiotherapy_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="physiotherapy_amount" name="physiotherapy_amount" placeholder="Amount" value="{{ old('physiotherapy_amount') }}">
        @error('physiotherapy_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-1">
        <label for="physiotherapy_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="physiotherapy_total_amount" name="physiotherapy_total_amount" placeholder="Total Days * Amount" value="{{ old('physiotherapy_total_amount') }}">
        @error('physiotherapy_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">
        <input type="file" name="physiotherapy_file" id="physiotherapy_file" hidden />
        <label for="physiotherapy_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('physiotherapy_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


