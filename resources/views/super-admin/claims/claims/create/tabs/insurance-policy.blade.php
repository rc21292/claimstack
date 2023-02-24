<div class="card-body">
    <div class="form-group row">
        <div class="col-md-6 mb-3">
            <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="patient_id" name="patient_id" maxlength="60"
                placeholder="Enter Patient Id" value="{{ old('patient_id') }}">
            @error('patient_id')
                <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="claim_id">Cliam ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="claim_id" name="claim_id" maxlength="60"
                placeholder="Enter Claim Id" value="{{ old('claim_id') }}">
            @error('claim_id')
                <span id="claim-id-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="policy_no">Policy No. <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="policy_no" name="policy_no" maxlength="60"
                placeholder="Enter Policy No." value="{{ old('policy_no') }}">
            @error('policy_no')
                <span id="policy-id-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="insurance_company">Insurance Company<span class="text-danger">*</span></label>
            <select class="form-control select2" id="insurance_company" name="insurance_company">
                <option value="">Select Insurance Company</option>
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}"
                        {{ old('insurance_company') == $hospital->id ? 'selected' : '' }}
                        data-name="{{ $hospital->name }}" data-id="{{ $hospital->uid }}"
                        data-address="{{ $hospital->address }}" data-city="{{ $hospital->city }}"
                        data-state="{{ $hospital->state }}" data-pincode="{{ $hospital->pincode }}"
                        data-ap="{{ $hospital->linked_associate_partner_id }}" data-apname="{{ $hospital->ap_name }}">
                        {{ $hospital->name }}
                        [<strong>UID: </strong>{{ $hospital->uid }}]
                        [<strong>City: </strong>{{ $hospital->city }}]
                        [<strong>State: </strong>{{ $hospital->state }}]
                    </option>
                @endforeach
            </select>
            @error('insurance_company')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="policy_name">Policy Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="policy_name" name="policy_name"
                placeholder="Enter Policy Name" value="{{ old('policy_name') }}">
            @error('policy_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="si_no_or_certificate_no">Sl. No./Certificate No. <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="si_no_or_certificate_no" name="si_no_or_certificate_no"
                placeholder="Enter Sl. No./Certificate No." value="{{ old('si_no_or_certificate_no') }}">
            @error('si_no_or_certificate_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="company_or_tpa_id_card_no">Company/TPA ID Card No. <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="company_or_tpa_id_card_no" name="company_or_tpa_id_card_no"
                placeholder="Enter Company/TPA ID Card No." value="{{ old('company_or_tpa_id_card_no') }}">
            @error('company_or_tpa_id_card_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="tpa_name">TPA Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="tpa_name" name="tpa_name" placeholder="Enter TPA Name"
                value="{{ old('tpa_name') }}">
            @error('tpa_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="policy_type">Policy Type <span class="text-danger">*</span></label>
            <select class="form-select" id="policy_type" name="policy_type">
                <option value="">Select Policy Type</option>
                <option value="Group" {{ old('policy_type') == 'Group' ? 'selected' : '' }}>Group
                </option>
                <option value="Retail" {{ old('policy_type') == 'Retail' ? 'selected' : '' }}>Retail
                </option>
            </select>
            @error('policy_type')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="group_name">Group Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="group_name" name="group_name"
                placeholder="Enter Group Name" value="{{ old('group_name') }}">
            @error('group_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="policy_start_date">Policy Start Date <span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Policy Start Date" class="form-control" id="policy_start_date"
                name="policy_start_date" value="{{ old('policy_start_date') }}">
            @error('policy_start_date')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="policy_expiry_date">Policy Expiry Date <span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Policy Expiry Date" class="form-control"
                id="policy_expiry_date" name="policy_expiry_date" value="{{ old('policy_expiry_date') }}">
            @error('policy_expiry_date')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="policy_commencement_date_without_break">Policy Commencement Date (without Break) <span
                    class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Policy Commencement Date (without Break)" class="form-control"
                id="policy_commencement_date_without_break" name="policy_commencement_date_without_break"
                value="{{ old('policy_commencement_date_without_break') }}">
            @error('policy_commencement_date_without_break')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="firstname">Name of the Proposer/Primary Insured <span class="text-danger">*</span></label>
        </div>

        <div class="col-md-3 mt-1">
            <select class="form-control" id="proposer_or_primary_insured_sur_name"
                name="proposer_or_primary_insured_sur_name">
                <option value="">Select</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
            </select>
            @error('proposer_or_primary_insured_sur_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-1">
            <input type="text" maxlength="25" class="form-control" id="proposer_or_primary_insured_first_name"
                name="proposer_or_primary_insured_first_name" maxlength="15" placeholder="First name"
                value="{{ old('proposer_or_primary_insured_first_name') }}">
            @error('proposer_or_primary_insured_first_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-1">
            <input type="text" maxlength="25" class="form-control" id="proposer_or_primary_insured_middle_name"
                name="proposer_or_primary_insured_middle_name" maxlength="30" placeholder="Middle name"
                value="{{ old('proposer_or_primary_insured_middle_name') }}">
            @error('proposer_or_primary_insured_middle_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3 mt-1">
            <input type="text" maxlength="25" class="form-control" id="proposer_or_primary_insured_last_name"
                name="proposer_or_primary_insured_last_name" maxlength="30" placeholder="Last name"
                value="{{ old('proposer_or_primary_insured_last_name') }}">
            @error('proposer_or_primary_insured_last_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="is_primary_insured_and_patient_same">Is Primary Insured and Patient Same <span
                    class="text-danger">*</span></label>
            <select class="form-select" id="is_primary_insured_and_patient_same"
                name="is_primary_insured_and_patient_same">
                <option value="">Select Are Primary Insured and Patient Same</option>
                <option value="Yes" {{ old('is_primary_insured_and_patient_same') == 'Yes' ? 'selected' : '' }}>Yes
                </option>
                <option value="No" {{ old('is_primary_insured_and_patient_same') == 'No' ? 'selected' : '' }}>No
                </option>
            </select>
            @error('is_primary_insured_and_patient_same')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="primary_insured_address">Address of the Primary Insured <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="primary_insured_address" name="primary_insured_address"
                placeholder="Address Line" value="{{ old('primary_insured_address') }}">
            @error('primary_insured_address')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="primary_insured_city" name="primary_insured_city"
                placeholder="City" value="{{ old('primary_insured_city') }}">
            @error('primary_insured_city')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="text" class="form-control" id="primary_insured_state" name="primary_insured_state"
                placeholder="State" value="{{ old('primary_insured_state') }}">
            @error('primary_insured_state')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4 mt-2">
            <input type="number" class="form-control" id="primary_insured_pincode" name="primary_insured_pincode"
                placeholder="Pincode" value="{{ old('primary_insured_pincode') }}">
            @error('primary_insured_pincode')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 mt-3">
            <label for="no_of_insured_person">No. of Person Insured <span class="text-danger">*</span></label>
            <input type="number" onkeypress="return isNumberKey(event)" class="form-control"
                id="no_of_insured_person" name="no_of_insured_person" placeholder="No. of Person Insured"
                value="{{ old('no_of_insured_person') }}">
            @error('no_of_insured_person')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="basic_sum_insured">Basic Sum Insured <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="basic_sum_insured"
                name="basic_sum_insured" placeholder="Basic Sum Insured" value="{{ old('basic_sum_insured') }}">
            @error('basic_sum_insured')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="cumulative_bonus_cv">Cumulative Bonus (CV) <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control"
                id="cumulative_bonus_cv" name="cumulative_bonus_cv" placeholder="Cumulative Bonus (CV)"
                value="{{ old('cumulative_bonus_cv') }}">
            @error('cumulative_bonus_cv')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="agent_broker_code">Agent/Broker Code <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="agent_broker_code"
                name="agent_broker_code" placeholder="Agent/Broker Code" value="{{ old('agent_broker_code') }}">
            @error('agent_broker_code')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="agent_broker_name">Agent/Broker Name <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="agent_broker_name"
                name="agent_broker_name" placeholder="Agent/Broker Name" value="{{ old('agent_broker_name') }}">
            @error('agent_broker_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 mt-3">
            <label for="are_you_covered_under_any_top_up_or_additional_policy">Are you covered under any
                Top-up/Additional Policy <span class="text-danger">*</span></label>

            {{-- <input id="toggle-demo" type="checkbox" data-toggle="toggle"> --}}


            <select class="form-select" id="are_you_covered_under_any_top_up_or_additional_policy"
                name="are_you_covered_under_any_top_up_or_additional_policy">
                <option value="">Select Are you covered under any Top-up/Additional Policy</option>
                <option value="Yes"
                    {{ old('are_you_covered_under_any_top_up_or_additional_policy') == 'Yes' ? 'selected' : '' }}>Yes
                </option>
                <option value="No"
                    {{ old('are_you_covered_under_any_top_up_or_additional_policy') == 'No' ? 'selected' : '' }}>No
                </option>
            </select>
            @error('are_you_covered_under_any_top_up_or_additional_policy')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 mt-3">
            <label for="agent_broker_code">Agent/Broker Code <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="agent_broker_code"
                name="agent_broker_code" placeholder="Agent/Broker Code" value="{{ old('agent_broker_code') }}">
            @error('agent_broker_code')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="agent_broker_name">Agent/Broker Name <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="agent_broker_name"
                name="agent_broker_name" placeholder="Agent/Broker Name" value="{{ old('agent_broker_name') }}">
            @error('agent_broker_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="agent_broker_name">Policy No. (Top-up/Additional) <span class="text-danger">*</span></label>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="agent_broker_name"
                name="agent_broker_name" placeholder="Enter Policy No. (Top-up/Additional)"
                value="{{ old('agent_broker_name') }}">
            @error('agent_broker_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="currently_covered_by_any_other_mediclaim_or_health_insurance">Currently Covered by any other
                Mediclaim/Health Insurance <span class="text-danger">*</span></label>
            <select class="form-select" id="currently_covered_by_any_other_mediclaim_or_health_insurance"
                name="currently_covered_by_any_other_mediclaim_or_health_insurance">
                <option value="">Currently Covered by any other Mediclaim/Health Insurance</option>
                <option value="Yes"
                    {{ old('currently_covered_by_any_other_mediclaim_or_health_insurance') == 'Yes' ? 'selected' : '' }}>
                    Yes
                </option>
                <option value="No"
                    {{ old('currently_covered_by_any_other_mediclaim_or_health_insurance') == 'No' ? 'selected' : '' }}>
                    No
                </option>
            </select>
            @error('currently_covered_by_any_other_mediclaim_or_health_insurance')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-6 mt-3">
            <label for="other_policy_commencement_date_without_break">Policy Commencement Date (without Break - Other
                Policy) <span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Policy Commencement Date (without Break - Other Policy)"
                class="form-control" id="other_policy_commencement_date_without_break"
                name="other_policy_commencement_date_without_break"
                value="{{ old('other_policy_commencement_date_without_break') }}">
            @error('other_policy_commencement_date_without_break')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="other_policy_insurance_company_name">Insurance Company Name (Other Policy) <span
                    class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Insurance Company Name (Other Policy)" class="form-control"
                id="other_policy_insurance_company_name" name="other_policy_insurance_company_name"
                value="{{ old('other_policy_insurance_company_name') }}">
            @error('other_policy_insurance_company_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="other_policy_no">Policy No. (Other Policy) <span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Policy No. (Other Policy)" class="form-control"
                id="other_policy_no" name="other_policy_no" value="{{ old('other_policy_no') }}">
            @error('other_policy_no')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="other_policy_sum_insured">Sum Insured (Other Policy) <span
                    class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Sum Insured (Other Policy)" class="form-control"
                id="other_policy_sum_insured" name="other_policy_sum_insured"
                value="{{ old('other_policy_sum_insured') }}">
            @error('other_policy_sum_insured')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="patient_hospitalized_last_4y_since_inception">Patient ever been hospitalized in the last 4
                years since the inception of the contract <span class="text-danger">*</span></label>
            <select class="form-select" id="patient_hospitalized_last_4y_since_inception"
                name="patient_hospitalized_last_4y_since_inception">
                <option value="">Select Patient ever been hospitalized in the last 4 years since the inception of
                    the contract</option>
                <option value="Yes"
                    {{ old('patient_hospitalized_last_4y_since_inception') == 'Yes' ? 'selected' : '' }}>Yes
                </option>
                <option value="No"
                    {{ old('patient_hospitalized_last_4y_since_inception') == 'No' ? 'selected' : '' }}>No
                </option>
            </select>
            @error('patient_hospitalized_last_4y_since_inception')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="date_of_admission_past">Date of Admission (Past) <span class="text-danger">*</span></label>
            <input type="date" placeholder="Enter Date of Admission (Past)" class="form-control"
                id="date_of_admission_past" name="date_of_admission_past"
                value="{{ old('date_of_admission_past') }}">
            @error('date_of_admission_past')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mt-3">
            <label for="diagnosis_previous">Diagnosis (Previous) <span class="text-danger">*</span></label>
            <input type="text" placeholder="Enter Diagnosis (Previous)" class="form-control"
                id="diagnosis_previous" name="diagnosis_previous" value="{{ old('diagnosis_previous') }}">
            @error('diagnosis_previous')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-12 mt-3">
            <label for="policy_details_comments">policy details comments </label>
            <textarea class="form-control" id="policy_details_comments" name="policy_details_comments" maxlength="250"
                placeholder="policy details comments" rows="5">{{ old('policy_details_comments') }}</textarea>
            @error('policy_details_comments')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-md-12 text-end mt-3">
            <button type="submit" class="btn btn-success" form="claims-form">Create
                Patient ID</button>
        </div>

    </div>
</div>
