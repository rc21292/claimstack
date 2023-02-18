<div class="form-group row">

    <h5 class="mt-3">Hospital Amount</h5>

    <div class="col-md-4 mt-1">
        <label for="hospital_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="hospital_amount" name="hospital_amount" placeholder="Total Days * Amount" value="{{ old('hospital_amount') }}">
        @error('hospital_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-2">  </div>   

    <div class="col-md-2 mt-1" style="margin-top: 31px !important;">    
        <input type="file" name="hospital_amount_file" id="hospital_amount_file" hidden />
        <label for="hospital_amount_file" class="btn btn-primary upload-label">
            Upload <i class="mdi mdi-upload"></i>
        </label>
        @error('hospital_amount_file')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <hr class="mt-2">                                

 <h5 class="mt-1">BHC Amount</h5>

    <div class="col-md-4 mt-1">
        <label for="bhc_amount">Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="bhc_amount" name="bhc_amount" placeholder="Amount" value="{{ old('bhc_amount') }}">
        @error('bhc_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-2">  </div>   

    <div class="col-md-4 mt-1"> 
        <label for="bhc_total_amount">Total Amount <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="bhc_total_amount" name="bhc_total_amount" placeholder="Total Days * Amount" value="{{ old('bhc_total_amount') }}">
        @error('bhc_total_amount')
        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

</div>




