<div class="form-group row">

    <h5 class="mt-4">Package Charges</h5>

    <div class="col-md-3 mt-2">
        <label for="package_charges_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="package_charges_date" name="package_charges_date" maxlength="15"
        placeholder="Date" value="{{ old('package_charges_date') }}">
        @error('package_charges_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="package_charges_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="package_charges_from" name="package_charges_from" maxlength="30"
        placeholder="From" value="{{ old('package_charges_from') }}">
        @error('package_charges_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="package_charges_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="package_charges_to" name="package_charges_to" placeholder="To" value="{{ old('package_charges_to') }}">
        @error('package_charges_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="package_charges_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="package_charges_total_days" name="package_charges_total_days" placeholder="Total Days" value="{{ old('package_charges_total_days') }}">
        @error('package_charges_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="package_charges_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="package_charges_amount" name="package_charges_amount" placeholder="Amount" value="{{ old('package_charges_amount') }}">
        @error('package_charges_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="package_charges_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="package_charges_total_amount" name="package_charges_total_amount" placeholder="Total Days * Amount" value="{{ old('package_charges_total_amount') }}">
        @error('package_charges_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="package_charges_file" id="package_charges_file" hidden />
        <label for="package_charges_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('package_charges_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-2">GIPSA PPN Packages</h5>

    <div class="col-md-3 mt-2">
        <label for="gipsa_ppn_packages_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="gipsa_ppn_packages_date" name="gipsa_ppn_packages_date" maxlength="15"
        placeholder="Date" value="{{ old('gipsa_ppn_packages_date') }}">
        @error('gipsa_ppn_packages_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="gipsa_ppn_packages_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="gipsa_ppn_packages_from" name="gipsa_ppn_packages_from" maxlength="30"
        placeholder="From" value="{{ old('gipsa_ppn_packages_from') }}">
        @error('gipsa_ppn_packages_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="gipsa_ppn_packages_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="gipsa_ppn_packages_to" name="gipsa_ppn_packages_to" placeholder="To" value="{{ old('gipsa_ppn_packages_to') }}">
        @error('gipsa_ppn_packages_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="gipsa_ppn_packages_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="gipsa_ppn_packages_total_days" name="gipsa_ppn_packages_total_days" placeholder="Total Days" value="{{ old('gipsa_ppn_packages_total_days') }}">
        @error('gipsa_ppn_packages_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="gipsa_ppn_packages_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="gipsa_ppn_packages_amount" name="gipsa_ppn_packages_amount" placeholder="Amount" value="{{ old('gipsa_ppn_packages_amount') }}">
        @error('gipsa_ppn_packages_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="gipsa_ppn_packages_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="gipsa_ppn_packages_total_amount" name="gipsa_ppn_packages_total_amount" placeholder="Total Days * Amount" value="{{ old('gipsa_ppn_packages_total_amount') }}">
        @error('gipsa_ppn_packages_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="gipsa_ppn_packages_file" id="gipsa_ppn_packages_file" hidden />
        <label for="gipsa_ppn_packages_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('gipsa_ppn_packages_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-2">BHC Packages</h5>

    <div class="col-md-3 mt-2">
        <label for="bhc_packages_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="bhc_packages_date" name="bhc_packages_date" maxlength="15"
        placeholder="Date" value="{{ old('bhc_packages_date') }}">
        @error('bhc_packages_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="bhc_packages_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="bhc_packages_from" name="bhc_packages_from" maxlength="30"
        placeholder="From" value="{{ old('bhc_packages_from') }}">
        @error('bhc_packages_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="bhc_packages_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="bhc_packages_to" name="bhc_packages_to" placeholder="To" value="{{ old('bhc_packages_to') }}">
        @error('bhc_packages_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="bhc_packages_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="bhc_packages_total_days" name="bhc_packages_total_days" placeholder="Total Days" value="{{ old('bhc_packages_total_days') }}">
        @error('bhc_packages_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="bhc_packages_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="bhc_packages_amount" name="bhc_packages_amount" placeholder="Amount" value="{{ old('bhc_packages_amount') }}">
        @error('bhc_packages_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="bhc_packages_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="bhc_packages_total_amount" name="bhc_packages_total_amount" placeholder="Total Days * Amount" value="{{ old('bhc_packages_total_amount') }}">
        @error('bhc_packages_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="bhc_packages_file" id="bhc_packages_file" hidden />
        <label for="bhc_packages_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('bhc_packages_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-2">Other</h5>

    <div class="col-md-3 mt-2">
        <label for="other_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_date" name="other_date" maxlength="15"
        placeholder="Date" value="{{ old('other_date') }}">
        @error('other_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="other_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_from" name="other_from" maxlength="30"
        placeholder="From" value="{{ old('other_from') }}">
        @error('other_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="other_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_to" name="other_to" placeholder="To" value="{{ old('other_to') }}">
        @error('other_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="other_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_total_days" name="other_total_days" placeholder="Total Days" value="{{ old('other_total_days') }}">
        @error('other_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="other_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_amount" name="other_amount" placeholder="Amount" value="{{ old('other_amount') }}">
        @error('other_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="other_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_total_amount" name="other_total_amount" placeholder="Total Days * Amount" value="{{ old('other_total_amount') }}">
        @error('other_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="other_file" id="other_file" hidden />
        <label for="other_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('other_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


