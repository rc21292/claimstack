<form action="{{ route('super-admin.associate-partners.vendor-services', $associate->id) }}" method="post"
    id="vendor-partner-service-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <div class="col-md-12">
            <label for="cashless_claims_management">Cashless Claims Management <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="cashless_claims_management" name="cashless_claims_management">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('cashless_claims_management',  isset($associate->service) ? $associate->service->cashless_claims_management : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('cashless_claims_management', isset($associate->service) ? $associate->service->cashless_claims_management : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('cashless_claims_management', isset($associate->service) ? $associate->service->cashless_claims_management : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('cashless_claims_management')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="cashless_claims_management_charge"
                name="cashless_claims_management_charge" placeholder="Charge by BHC"
                value="{{ old('cashless_claims_management_charge', isset($associate->service) ? $associate->service->cashless_claims_management_charge : '') }}">
            @error('cashless_claims_management_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="cashless_helpdesk">Cashless Help Desk <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="cashless_helpdesk" name="cashless_helpdesk">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('cashless_helpdesk', isset($associate->service) ? $associate->service->cashless_helpdesk : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('cashless_helpdesk', isset($associate->service) ? $associate->service->cashless_helpdesk : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('cashless_helpdesk', isset($associate->service) ? $associate->service->cashless_helpdesk : '') == 'NA' ? 'selected' : '' }}>NA
                </option>
            </select>
            @error('cashless_helpdesk')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="cashless_helpdesk_charge" name="cashless_helpdesk_charge"
                placeholder="Charge by BHC"
                value="{{ old('cashless_helpdesk_charge', isset($associate->service) ? $associate->service->cashless_helpdesk_charge : '') }}">
            @error('cashless_helpdesk_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="claims_assessment">Claims Assessment<span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="claims_assessment" name="claims_assessment">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('claims_assessment', isset($associate->service) ? $associate->service->claims_assessment : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('claims_assessment', isset($associate->service) ? $associate->service->claims_assessment : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('claims_assessment', isset($associate->service) ? $associate->service->claims_assessment : '') == 'NA' ? 'selected' : '' }}>NA
                </option>
            </select>
            @error('claims_assessment')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="claims_assessment_charge" name="claims_assessment_charge"
                placeholder="Charge by BHC"
                value="{{ old('claims_assessment_charge', isset($associate->service) ? $associate->service->claims_assessment_charge : '') }}">
            @error('claims_assessment_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="claims_bill_entry">Claims Bill Entry<span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="claims_bill_entry" name="claims_bill_entry">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('claims_bill_entry', isset($associate->service) ? $associate->service->claims_bill_entry : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('claims_bill_entry', isset($associate->service) ? $associate->service->claims_bill_entry : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('claims_bill_entry', isset($associate->service) ? $associate->service->claims_bill_entry : '') == 'NA' ? 'selected' : '' }}>NA
                </option>
            </select>
            @error('claims_bill_entry')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="claims_bill_entry_charge" name="claims_bill_entry_charge"
                placeholder="Charge by BHC"
                value="{{ old('claims_bill_entry_charge', isset($associate->service) ? $associate->service->claims_bill_entry_charge : '') }}">
            @error('claims_bill_entry_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="claims_reimbursement">Claims Reimbursement - Insured <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="claims_reimbursement" name="claims_reimbursement">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('claims_reimbursement', isset($associate->service) ? $associate->service->claims_reimbursement : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('claims_reimbursement', isset($associate->service) ? $associate->service->claims_reimbursement : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('claims_reimbursement', isset($associate->service) ? $associate->service->claims_reimbursement : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('claims_reimbursement')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="claims_reimbursement_charge"
                name="claims_reimbursement_charge" placeholder="Charge by BHC"
                value="{{ old('claims_reimbursement_charge', isset($associate->service) ? $associate->service->claims_reimbursement_charge : '') }}">
            @error('claims_reimbursement_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="doctor_claim_process">Doctor (Claim Processing) <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="doctor_claim_process" name="doctor_claim_process">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('doctor_claim_process', isset($associate->service) ? $associate->service->doctor_claim_process : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('doctor_claim_process', isset($associate->service) ? $associate->service->doctor_claim_process : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('doctor_claim_process', isset($associate->service) ? $associate->service->doctor_claim_process : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('doctor_claim_process')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="doctor_claim_process_charge"
                name="doctor_claim_process_charge" placeholder="Charge by BHC"
                value="{{ old('doctor_claim_process_charge', isset($associate->service) ? $associate->service->doctor_claim_process_charge : '') }}">
            @error('doctor_claim_process_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="doctor_honorary_panel">Doctor (Honorary/Panel) <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="doctor_honorary_panel" name="doctor_honorary_panel">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('doctor_honorary_panel', isset($associate->service) ? $associate->service->doctor_honorary_panel : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('doctor_honorary_panel', isset($associate->service) ? $associate->service->doctor_honorary_panel : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('doctor_honorary_panel', isset($associate->service) ? $associate->service->doctor_honorary_panel : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('doctor_honorary_panel')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="doctor_honorary_panel_charge"
                name="doctor_honorary_panel_charge" placeholder="Charge by BHC"
                value="{{ old('doctor_honorary_panel_charge', isset($associate->service) ? $associate->service->doctor_honorary_panel_charge : '') }}">
            @error('doctor_honorary_panel_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="doctor_tele_consultation">Doctor (Tele Consultation) <span
                    class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="doctor_tele_consultation" name="doctor_tele_consultation">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('doctor_tele_consultation', isset($associate->service) ? $associate->service->doctor_tele_consultation : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('doctor_tele_consultation', isset($associate->service) ? $associate->service->doctor_tele_consultation : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('doctor_tele_consultation', isset($associate->service) ? $associate->service->doctor_tele_consultation : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('doctor_tele_consultation')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="doctor_tele_consultation_charge"
                name="doctor_tele_consultation_charge" placeholder="Charge by BHC"
                value="{{ old('doctor_tele_consultation_charge', isset($associate->service) ? $associate->service->doctor_tele_consultation_charge : '') }}">
            @error('doctor_tele_consultation_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="insurance_tpa_coordination">Insaurance Co. / TPA Coordination <span
                    class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="insurance_tpa_coordination" name="insurance_tpa_coordination">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('insurance_tpa_coordination', isset($associate->service) ? $associate->service->insurance_tpa_coordination : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('insurance_tpa_coordination', isset($associate->service) ? $associate->service->insurance_tpa_coordination : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('insurance_tpa_coordination', isset($associate->service) ? $associate->service->insurance_tpa_coordination : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('insurance_tpa_coordination')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="insurance_tpa_coordination_charge"
                name="insurance_tpa_coordination_charge" placeholder="Charge by BHC"
                value="{{ old('insurance_tpa_coordination_charge', isset($associate->service) ? $associate->service->insurance_tpa_coordination_charge : '') }}">
            @error('insurance_tpa_coordination_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="medical_lending_bill">Medical Lending for Bill/Invoice Discounting <span
                    class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="medical_lending_bill" name="medical_lending_bill">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('medical_lending_bill', isset($associate->service) ? $associate->service->medical_lending_bill : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('medical_lending_bill', isset($associate->service) ? $associate->service->medical_lending_bill : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('medical_lending_bill', isset($associate->service) ? $associate->service->medical_lending_bill : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('medical_lending_bill')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="medical_lending_bill_charge"
                name="medical_lending_bill_charge" placeholder="Charge by BHC"
                value="{{ old('medical_lending_bill_charge', isset($associate->service) ? $associate->service->medical_lending_bill_charge : '') }}">
            @error('medical_lending_bill_charge')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="medical_lending_patient">Medical Lending for Patient <span
                    class="text-danger">*</span></label>
        </div>

        <div class="col-md-6 mt-1">
            <select class="form-select" id="medical_lending_patient" name="medical_lending_patient">
                <option value="">Service Offered by</option>
                <option value="Bharat Claims"
                    {{ old('medical_lending_patient', isset($associate->service) ? $associate->service->medical_lending_patient : '') == 'Bharat Claims' ? 'selected' : '' }}>
                    Bharat Claims
                </option>
                <option value="Vendor Partner"
                    {{ old('medical_lending_patient', isset($associate->service) ? $associate->service->medical_lending_patient : '') == 'Vendor Partner' ? 'selected' : '' }}>
                    Vendor Partner
                </option>
                <option value="NA"
                    {{ old('medical_lending_patient', isset($associate->service) ? $associate->service->medical_lending_patient : '') == 'NA' ? 'selected' : '' }}>
                    NA
                </option>
            </select>
            @error('medical_lending_patient')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-1">
            <input type="text" class="form-control" id="medical_lending_patient_charge"
                name="medical_lending_patient_charge" placeholder="Charge by BHC"
                value="{{ old('medical_lending_patient_charge', isset($associate->service) ? $associate->service->medical_lending_patient_charge : '') }}">
            @error('medical_lending_patient_charge')
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
            <label for="vendor_partner_comments">Vendor Partner Comments </label>
            <textarea class="form-control" id="vendor_partner_comments" name="vendor_partner_comments" placeholder="Comments" rows="4">{{ old('vendor_partner_comments', isset($associate->service) ? $associate->service->vendor_partner_comments : '') }}</textarea>
            @error('vendor_partner_comments')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12 text-end mt-3">
            <button type="submit" class="btn btn-success" form="vendor-partner-service-form">Update</button>
        </div>
    </div>
</form>
