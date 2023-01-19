<form action="{{ route('admin.associate-partners.sales-services', $associate->id) }}" method="post"
    id="sales-partner-service-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <div class="col-md-12">
            <label for="consulting">Consulting <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="consulting" name="consulting">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('consulting', isset($associate->service) ? $associate->service->consulting : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('consulting', isset($associate->service) ? $associate->service->consulting : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('consulting', isset($associate->service) ? $associate->service->consulting : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('consulting')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="consulting_charge" name="consulting_charge"
                placeholder="Charge by BHC"
                value="{{ old('consulting_charge', isset($associate->service) ? $associate->service->consulting_charge : '') }}">
            @error('consulting_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="dealer_distributor">Dealer / Distributor (Hospital) <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="dealer_distributor" name="dealer_distributor">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('dealer_distributor', isset($associate->service) ? $associate->service->dealer_distributor : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('dealer_distributor', isset($associate->service) ? $associate->service->dealer_distributor : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('dealer_distributor', isset($associate->service) ? $associate->service->dealer_distributor : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('dealer_distributor')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="dealer_distributor_charge" name="dealer_distributor_charge"
                placeholder="Charge by BHC"
                value="{{ old('dealer_distributor_charge', isset($associate->service) ? $associate->service->dealer_distributor_charge : '') }}">
            @error('dealer_distributor_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="hospital_empanelment_agent">Hospital Empanelment - Agent<span
                    class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="hospital_empanelment_agent" name="hospital_empanelment_agent">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('hospital_empanelment_agent', isset($associate->service) ? $associate->service->hospital_empanelment_agent : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('hospital_empanelment_agent', isset($associate->service) ? $associate->service->hospital_empanelment_agent : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('hospital_empanelment_agent', isset($associate->service) ? $associate->service->hospital_empanelment_agent : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('hospital_empanelment_agent')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="hospital_empanelment_agent_charge"
                name="hospital_empanelment_agent_charge" placeholder="Charge by BHC"
                value="{{ old('hospital_empanelment_agent_charge', isset($associate->service) ? $associate->service->hospital_empanelment_agent_charge : '') }}">
            @error('hospital_empanelment_agent_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="software_sales">Software Sales<span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="software_sales" name="software_sales">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('software_sales', isset($associate->service) ? $associate->service->software_sales : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('software_sales', isset($associate->service) ? $associate->service->software_sales : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('software_sales', isset($associate->service) ? $associate->service->software_sales : '') == 'NA' ? 'selected' : '' }}>NA
                </option>
            </select>
            @error('software_sales')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="software_sales_charge" name="software_sales_charge"
                placeholder="Charge by BHC"
                value="{{ old('software_sales_charge', isset($associate->service) ? $associate->service->software_sales_charge : '') }}">
            @error('software_sales_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="others">Others <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="others" name="others">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('others', isset($associate->service) ? $associate->service->others : '') == 'Bharat Claims' ? 'selected' : '' }}>Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('others', isset($associate->service) ? $associate->service->others : '') == 'Vendor Partner' ? 'selected' : '' }}>Vendor
                    Partner
                </option>
                <option value="NA" {{ old('others', isset($associate->service) ? $associate->service->others : '') == 'NA' ? 'selected' : '' }}>NA
                </option>
            </select>
            @error('others')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="others_charge" name="others_charge"
                placeholder="Charge by BHC" value="{{ old('others_charge', isset($associate->service) ? $associate->service->others_charge : '') }}">
            @error('others_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <label for="sales_partner_comments">Sales Partner Comments </label>
            <textarea class="form-control" id="sales_partner_comments" name="sales_partner_comments" placeholder="Comments" rows="4">{{ old('sales_partner_comments', isset($associate->service) ? $associate->service->sales_partner_comments : '') }}</textarea>
            @error('sales_partner_comments')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 text-end mt-3">
            <button type="submit" class="btn btn-success" form="sales-partner-service-form">Update</button>
        </div>
    </div>
</form>
