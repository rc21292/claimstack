<div class="form-group row">

    <h5 class="mt-4">Other Consumable Items</h5>

    <div class="col-md-3 mt-2">
        <label for="other_consumable_items_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_consumable_items_date" name="other_consumable_items_date" maxlength="15"
        placeholder="Date" value="{{ old('other_consumable_items_date', $bill_entry->other_consumable_items_date) }}">
        @error('other_consumable_items_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="other_consumable_items_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_consumable_items_from" name="other_consumable_items_from" maxlength="30"
        placeholder="From" value="{{ old('other_consumable_items_from', $bill_entry->other_consumable_items_from) }}">
        @error('other_consumable_items_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="other_consumable_items_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="other_consumable_items_to" name="other_consumable_items_to" placeholder="To" value="{{ old('other_consumable_items_to', $bill_entry->other_consumable_items_to) }}">
        @error('other_consumable_items_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="other_consumable_items_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_consumable_items_total_days" name="other_consumable_items_total_days" placeholder="Total Days" value="{{ old('other_consumable_items_total_days', $bill_entry->other_consumable_items_total_days) }}">
        @error('other_consumable_items_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="other_consumable_items_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_consumable_items_amount" name="other_consumable_items_amount" placeholder="Amount" value="{{ old('other_consumable_items_amount', $bill_entry->other_consumable_items_amount) }}">
        @error('other_consumable_items_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="other_consumable_items_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="other_consumable_items_total_amount" name="other_consumable_items_total_amount" placeholder="Total Days * Amount" value="{{ old('other_consumable_items_total_amount', $bill_entry->other_consumable_items_total_amount) }}">
        @error('other_consumable_items_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="other_consumable_items_file" id="other_consumable_items_file" hidden />
        <label for="other_consumable_items_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('other_consumable_items_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-2">Payable Consumables</h5>

    <div class="col-md-3 mt-2">
        <label for="payable_consumables_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="payable_consumables_date" name="payable_consumables_date" maxlength="15"
        placeholder="Date" value="{{ old('payable_consumables_date', $bill_entry->payable_consumables_date) }}">
        @error('payable_consumables_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="payable_consumables_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="payable_consumables_from" name="payable_consumables_from" maxlength="30"
        placeholder="From" value="{{ old('payable_consumables_from', $bill_entry->payable_consumables_from) }}">
        @error('payable_consumables_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="payable_consumables_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="payable_consumables_to" name="payable_consumables_to" placeholder="To" value="{{ old('payable_consumables_to', $bill_entry->payable_consumables_to) }}">
        @error('payable_consumables_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="payable_consumables_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="payable_consumables_total_days" name="payable_consumables_total_days" placeholder="Total Days" value="{{ old('payable_consumables_total_days', $bill_entry->payable_consumables_total_days) }}">
        @error('payable_consumables_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="payable_consumables_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="payable_consumables_amount" name="payable_consumables_amount" placeholder="Amount" value="{{ old('payable_consumables_amount', $bill_entry->payable_consumables_amount) }}">
        @error('payable_consumables_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="payable_consumables_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="payable_consumables_total_amount" name="payable_consumables_total_amount" placeholder="Total Days * Amount" value="{{ old('payable_consumables_total_amount', $bill_entry->payable_consumables_total_amount) }}">
        @error('payable_consumables_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="payable_consumables_file" id="payable_consumables_file" hidden />
        <label for="payable_consumables_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('payable_consumables_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>


<div class="form-group row">

    <h5 class="mt-2">Non-payable Consumables</h5>

    <div class="col-md-3 mt-2">
        <label for="non_payable_consumables_date">Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="non_payable_consumables_date" name="non_payable_consumables_date" maxlength="15"
        placeholder="Date" value="{{ old('non_payable_consumables_date', $bill_entry->non_payable_consumables_date) }}">
        @error('non_payable_consumables_date')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="non_payable_consumables_from">From <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="non_payable_consumables_from" name="non_payable_consumables_from" maxlength="30"
        placeholder="From" value="{{ old('non_payable_consumables_from', $bill_entry->non_payable_consumables_from) }}">
        @error('non_payable_consumables_from')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="non_payable_consumables_to">To <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="non_payable_consumables_to" name="non_payable_consumables_to" placeholder="To" value="{{ old('non_payable_consumables_to', $bill_entry->non_payable_consumables_to) }}">
        @error('non_payable_consumables_to')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-3 mt-2">
        <label for="non_payable_consumables_total_days">Total Days <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="non_payable_consumables_total_days" name="non_payable_consumables_total_days" placeholder="Total Days" value="{{ old('non_payable_consumables_total_days', $bill_entry->non_payable_consumables_total_days) }}">
        @error('non_payable_consumables_total_days')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4 mt-2">
        <label for="non_payable_consumables_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="non_payable_consumables_amount" name="non_payable_consumables_amount" placeholder="Amount" value="{{ old('non_payable_consumables_amount', $bill_entry->non_payable_consumables_amount) }}">
        @error('non_payable_consumables_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-4 mt-2">
        <label for="non_payable_consumables_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="non_payable_consumables_total_amount" name="non_payable_consumables_total_amount" placeholder="Total Days * Amount" value="{{ old('non_payable_consumables_total_amount', $bill_entry->non_payable_consumables_total_amount) }}">
        @error('non_payable_consumables_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-1 mt-1"></div>

    <div class="col-md-2 mt-2" style="margin-top: 31px !important;">
        <input type="file" name="non_payable_consumables_file" id="non_payable_consumables_file" hidden />
        <label for="non_payable_consumables_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('non_payable_consumables_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                
</div>

