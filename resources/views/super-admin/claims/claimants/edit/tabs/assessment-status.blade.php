                        <form action="{{ route('super-admin.claims.save_assesment_status') }}" method="post" id="assisment-status-form" enctype="multipart/form-data">
                            @csrf

                        <div class="card-body mb-4">
                            <div class="form-group row">

                            <div class="col-md-12 bg-white text-dark" style="line-height: 30px; margin-left: 2px; ;">  Pre-Assessment  </div>
                                <div class="col-md-6 mt-3">
                                    <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="patient_id" name="patient_id" maxlength="60"
                                    placeholder="Enter Patient Id" value="{{ old('patient_id') }}">
                                    @error('patient_id', 'assisment-status-form')
                                    <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="claim_id">Cliam ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="claim_id" name="claim_id" maxlength="60"
                                    placeholder="Enter Claim Id" value="{{ old('claim_id') }}">
                                    @error('claim_id', 'assisment-status-form')
                                    <span id="claim-id-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="claimant_id">Claimant ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="claimant_id" name="claimant_id" maxlength="60"
                                    placeholder="Enter Claimant ID" value="{{ old('claimant_id') }}">
                                    @error('claimant_id', 'assisment-status-form')
                                    <span id="claim-id-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="hospital_id">Hospital Id <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="hospital_id" name="hospital_id"
                                    placeholder="Enter Hospital Id" value="{{ old('hospital_id') }}">
                                    @error('hospital_id', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="hospital_name" name="hospital_name"
                                    placeholder="Enter Hospital Name" value="{{ old('hospital_name') }}">
                                    @error('hospital_name', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="hospital_address">Hospital Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="hospital_address" name="hospital_address"
                                    placeholder="Address Line"
                                    value="{{ old('hospital_address') }}">
                                    @error('hospital_address', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-3">
                                    <input type="text" class="form-control" id="hospital_city" name="hospital_city"
                                    placeholder="City" value="{{ old('hospital_city') }}">
                                    @error('hospital_city', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-3">
                                    <input type="text" class="form-control" id="hospital_state" name="hospital_state"
                                    placeholder="State" value="{{ old('hospital_state') }}">
                                    @error('hospital_state', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-3">
                                    <input type="number" class="form-control" id="hospital_pincode" name="hospital_pincode"
                                    placeholder="Pincode" value="{{ old('hospital_pincode') }}">
                                    @error('hospital_pincode', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12 mt-3">
                                    <label for="patient_firstname">Patient Name <span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <select class="form-control" id="patient_title" name="patient_title">
                                        <option value="">Select</option>
                                        <option @if( old('patient_title') == 'Mr.') selected @endif value="Mr.">Mr.</option>
                                        <option @if( old('patient_title') == 'Ms.') selected @endif value="Ms.">Ms.</option>
                                    </select>
                                    @error('patient_title', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-1">
                                    <input type="text" maxlength="25" class="form-control" id="patient_lastname"
                                    name="patient_lastname" maxlength="30" placeholder="Last name"
                                    value="{{ old('patient_lastname') }}">
                                    @error('patient_lastname', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-1">
                                    <input type="text" maxlength="25" class="form-control" id="patient_firstname"
                                    name="patient_firstname" maxlength="15" placeholder="First name"
                                    value="{{ old('patient_firstname') }}">
                                    @error('patient_firstname', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-1">
                                    <input type="text" maxlength="25" class="form-control" id="patient_middlename"
                                    name="patient_middlename" maxlength="30" placeholder="Last name"
                                    value="{{ old('patient_middlename') }}">
                                    @error('patient_middlename', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="policy_no">Policy No. <span class="text-danger">*</span></label>
                                    <input type="text" maxlength="16" class="form-control" id="policy_no" name="policy_no"
                                    placeholder="Policy No." value="{{ old('policy_no') }}">
                                    @error('policy_no', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="insurance_company">Insurance Company<span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="insurance_company" name="insurance_company" data-toggle="select2">
                                        <option value="">Select Insurance Company</option>
                                        @foreach ($insurers as $insurer)
                                        <option value="{{ $insurer->id }}"
                                            {{ old('insurance_company') == $insurer->id ? 'selected' : '' }}> {{ $insurer->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('insurance_company', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="policy_no">Company/TPA ID Card No. <span class="text-danger">*</span></label>
                                    <input type="text" maxlength="16" class="form-control" id="policy_no" name="policy_no"
                                    placeholder="Policy No." value="{{ old('policy_no') }}">
                                    @error('policy_no', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="start_date">Policy Start Date <span class="text-danger">*</span></label>
                                    <input type="date" placeholder="Enter Policy Start Date" class="form-control" id="start_date"
                                    name="start_date" value="{{ old('start_date') }}">
                                    @error('start_date', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="expiry_date">Policy Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" placeholder="Enter Policy Expiry Date" class="form-control" id="expiry_date"
                                    name="expiry_date" value="{{ old('expiry_date') }}">
                                    @error('expiry_date', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="commencement_date">Policy Commencement Date (without Break) <span  class="text-danger">*</span></label>
                                    <input type="date" placeholder="Enter Policy Commencement Date (without Break)"
                                    class="form-control" id="commencement_date" name="commencement_date"
                                    value="{{ old('commencement_date') }}">
                                    @error('commencement_date', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="hospital_on_the_panel_of_insurance_co">Hospital on the Panel of Insurance Co. <span class="text-danger">*</span></label>
                                    <input type="text" maxlength="16" class="form-control" id="hospital_on_the_panel_of_insurance_co" name="hospital_on_the_panel_of_insurance_co"
                                    placeholder="Policy No." value="{{ old('hospital_on_the_panel_of_insurance_co') }}">
                                    @error('hospital_on_the_panel_of_insurance_co', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="hospital_id_insurance_co">Hospital ID (Insurance Co.) <span class="text-danger">*</span></label>
                                    <input type="text" maxlength="16" class="form-control" id="hospital_id_insurance_co" name="hospital_id_insurance_co"
                                    placeholder="Policy No." value="{{ old('hospital_id_insurance_co') }}">
                                    @error('hospital_id_insurance_co', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="pre_assessment_status">Pre-Assessment Status <span class="text-danger">*</span></label>
                                    <select class="form-select" id="pre_assessment_status" name="pre_assessment_status" onchange="setGroupName();">
                                        <option value="">Select Policy Type</option>
                                        <option value="Waiting for Pre-Assessment" {{ old('pre_assessment_status') == 'Waiting for Pre-Assessment' ? 'selected' : '' }}>Waiting for Pre-Assessment </option>
                                        <option value="Query Raised by BHC Team" {{ old('pre_assessment_status') == 'Query Raised by BHC Team' ? 'selected' : '' }}>Query Raised by BHC Team</option>
                                        <option value="Non Admissible as per the Policy TC" {{ old('pre_assessment_status') == 'Non Admissible as per the Policy TC' ? 'selected' : '' }}>Non Admissible as per the Policy TC</option>
                                        <option value="Non Admissible as per the Treatment Received" {{ old('pre_assessment_status') == 'Non Admissible as per the Treatment Received' ? 'selected' : '' }}>Non Admissible as per the Treatment Received</option>
                                        <option value="Admissible" {{ old('pre_assessment_status') == 'Admissible' ? 'selected' : '' }}>Admissible</option>
                                    </select>
                                    @error('pre_assessment_status', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="query_pre_assessment">Query - Pre-Assessment <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Policy Start Date" class="form-control" id="query_pre_assessment"
                                    name="query_pre_assessment" value="{{ old('query_pre_assessment') }}">
                                    @error('query_pre_assessment', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="pre_assessment_amount">Pre-Assessment Amount <span class="text-danger">*</span></label>
                                    <input type="number" placeholder="Enter Policy Expiry Date" class="form-control" id="pre_assessment_amount"
                                    name="pre_assessment_amount" value="{{ old('pre_assessment_amount') }}">
                                    @error('pre_assessment_amount', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="pre_assessment_suspected_fraud">Pre-Assessment Suspected Fraud <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="pre_assessment_suspected_fraud" name="pre_assessment_suspected_fraud">
                                            <option value="">Select</option>
                                            <option value="Yes" {{ old('pre_assessment_suspected_fraud') == 'Yes' ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="No" {{ old('pre_assessment_suspected_fraud') == 'No' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                        <input type="file" name="pre_assessment_suspected_fraud_file" id="pre_assessment_suspected_fraud_file" hidden />
                                        <label for="pre_assessment_suspected_fraud_file" class="btn btn-primary upload-label"><i
                                            class="mdi mdi-upload"></i></label>
                                    </div>
                                    @error('pre_assessment_suspected_fraud', 'assisment-status-form')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @error('pre_assessment_suspected_fraud', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="pre_assessment_status_comments">Pre-Assessment Status Comments </label>
                                    <textarea class="form-control" id="pre_assessment_status_comments" name="pre_assessment_status_comments" maxlength="250" placeholder="Comments"
                                    rows="5">{{ old('pre_assessment_status_comments') }}</textarea>
                                    @error('pre_assessment_status_comments', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success" form="assisment-status-form">Save / Update </button>
                                </div>

                                <div class="col-md-12 mt-3 bg-white text-dark" style="line-height: 30px; margin-left: 2px; ;">  Final Assessment </div>


                                <div class="col-md-6 mt-3">
                                    <label for="final_assessment_status">Final Assessment Status <span class="text-danger">*</span></label>
                                    <select class="form-select" id="final_assessment_status" name="final_assessment_status" onchange="setGroupName();">
                                        <option value="">Select</option>
                                        <option value="Waiting for Pre-Assessment" {{ old('final_assessment_status') == 'Waiting for Pre-Assessment' ? 'selected' : '' }}>Waiting for Pre-Assessment </option>
                                        <option value="Query Raised by BHC Team" {{ old('final_assessment_status') == 'Query Raised by BHC Team' ? 'selected' : '' }}>Query Raised by BHC Team</option>
                                        <option value="Non Admissible as per the Policy TC" {{ old('final_assessment_status') == 'Non Admissible as per the Policy TC' ? 'selected' : '' }}>Non Admissible as per the Policy TC</option>
                                        <option value="Non Admissible as per the Treatment Received" {{ old('final_assessment_status') == 'Non Admissible as per the Treatment Received' ? 'selected' : '' }}>Non Admissible as per the Treatment Received</option>
                                        <option value="Admissible" {{ old('final_assessment_status') == 'Admissible' ? 'selected' : '' }}>Admissible</option>
                                    </select>
                                    @error('final_assessment_status', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="query_final_assessment">Query - Final Assessment <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Policy Start Date" class="form-control" id="query_final_assessment"
                                    name="query_final_assessment" value="{{ old('query_final_assessment') }}">
                                    @error('query_final_assessment', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="final_assessment_amount">Final Assessment Amount <span class="text-danger">*</span></label>
                                    <input type="number" placeholder="Enter Policy Expiry Date" class="form-control" id="final_assessment_amount"
                                    name="final_assessment_amount" value="{{ old('final_assessment_amount') }}">
                                    @error('final_assessment_amount', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="final_assessment_suspected_fraud">Final Assessment Suspected Fraud <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="final_assessment_suspected_fraud" name="final_assessment_suspected_fraud">
                                            <option value="">Select</option>
                                            <option value="Yes" {{ old('final_assessment_suspected_fraud') == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('final_assessment_suspected_fraud') == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        <input type="file" name="final_assessment_suspected_fraud_file" id="final_assessment_suspected_fraud_file" hidden />
                                        <label for="final_assessment_suspected_fraud_file" class="btn btn-primary upload-label"><i
                                            class="mdi mdi-upload"></i></label>
                                    </div>
                                    @error('final_assessment_suspected_fraud', 'assisment-status-form')
                                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @error('final_assessment_suspected_fraud', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="final_assessment_status_comments">Final Assessment Status Comments </label>
                                    <textarea class="form-control" id="final_assessment_status_comments" name="final_assessment_status_comments" maxlength="250" placeholder="Comments"
                                    rows="5">{{ old('final_assessment_status_comments') }}</textarea>
                                    @error('final_assessment_status_comments', 'assisment-status-form')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success" form="assisment-status-form">Save / Update </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    

@push('scripts')
<script>
   
</script>
@endpush
