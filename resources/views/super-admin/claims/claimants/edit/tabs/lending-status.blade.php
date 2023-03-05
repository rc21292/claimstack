                   <form action="{{ route('super-admin.claimants.save-lending-tatus',$id) }}" method="post" id="lending-status-form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body mb-4">
                        <div class="form-group row">

                            <div class="col-md-12 mb-2 bg-secondary text-white" style="line-height: 30px; margin-left: 2px; ;">  Loan Application  </div>


                            <div class="col-md-6 mb-3">
                                <label for="borrower_id">Borrower  ID <span class="text-danger">*</span></label>
                                <input type="text" readonly class="form-control" id="borrower_id"  name="borrower_id" maxlength="60"
                                placeholder="Enter Borrower Id" value="{{ old('borrower_id',$borrower->uid) }}">
                                @error('borrower_id', 'lending-status-form')
                                <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                                <input type="text" readonly class="form-control" id="patient_id" readonly name="patient_id" maxlength="60"
                                placeholder="Enter Patient Id" value="{{ old('patient_id',$borrower->patient_id) }}">
                                @error('patient_id', 'lending-status-form')
                                <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="claim_id">Cliam ID <span class="text-danger">*</span></label>
                                <input type="text" readonly class="form-control" id="claim_id" readonly name="claim_id" maxlength="60"
                                placeholder="Enter Claim Id" value="{{ old('claim_id',$borrower->claim_id) }}">
                                @error('claim_id', 'lending-status-form')
                                <span id="claim-id-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="hospital_name" readonly name="hospital_name"
                                placeholder="Enter Hospital Name" value="{{ old('hospital_name',$borrower->hospital_name) }}">
                                @error('hospital_name', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="hospital_address">Hospital Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="hospital_address" readonly name="hospital_address"
                                placeholder="Address Line"
                                value="{{ old('hospital_address',$borrower->hospital_address) }}">
                                @error('hospital_address', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="text" class="form-control" id="hospital_city" readonly name="hospital_city"
                                placeholder="City" value="{{ old('hospital_city',$borrower->hospital_city) }}">
                                @error('hospital_city', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="text" class="form-control" id="hospital_state" readonly name="hospital_state"
                                placeholder="State" value="{{ old('hospital_state',$borrower->hospital_state) }}">
                                @error('hospital_state', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="number" class="form-control" id="hospital_pincode" readonly name="hospital_pincode"
                                placeholder="Pincode" value="{{ old('hospital_pincode',$borrower->hospital_pincode) }}">
                                @error('hospital_pincode', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-12 mt-3">
                                <label for="patient_firstname">Patient Name <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-3 mt-1">
                                <select class="form-control" id="patient_title" name="patient_title" disabled>
                                    <option value="">Select</option>
                                    <option @if( old('patient_title', $borrower->patient_title) == 'Mr.') selected @endif value="Mr.">Mr.</option>
                                    <option @if( old('patient_title', $borrower->patient_title) == 'Ms.') selected @endif value="Ms.">Ms.</option>
                                </select>
                                @error('patient_title', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 mt-1">
                                <input type="text" maxlength="25" class="form-control" id="patient_lastname"
                                name="patient_lastname" maxlength="30" readonly placeholder="Last name"
                                value="{{ old('patient_lastname',$borrower->patient_lastname) }}">
                                @error('patient_lastname', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 mt-1">
                                <input type="text" maxlength="25" class="form-control" id="patient_firstname"
                                name="patient_firstname" maxlength="15" readonly placeholder="First name"
                                value="{{ old('patient_firstname',$borrower->patient_firstname) }}">
                                @error('patient_firstname', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 mt-1">
                                <input type="text" maxlength="25" class="form-control" id="patient_middlename"
                                name="patient_middlename" maxlength="30"  readonly placeholder="Last name"
                                value="{{ old('patient_middlename',$borrower->patient_middlename) }}">
                                @error('patient_middlename', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="firstname">Borrower Name<span class="text-danger">*</span></label>
                                <input type="text" maxlength="25" class="form-control" id="borrower_name"
                                name="borrower_name" maxlength="30" readonly placeholder="Borrower name"
                                value="{{ old('borrower_name',$borrower->borrower_firstname.' '.$borrower->borrower_middlename.' '.$borrower->borrower_lastname) }}">
                                @error('borrower_name', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="borrower_email_id">Borrower Personal email id <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" readonly id="borrower_email_id" name="borrower_email_id" maxlength="45"
                                placeholder="Enter Borrower Personal email id" value="{{ old('borrower_email_id',$borrower->borrower_personal_email_id) }}">
                                @error('borrower_email_id', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="borrower_official_email_id">Borrower official email id<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" readonly id="borrower_official_email_id" name="borrower_official_email_id" maxlength="45"
                                placeholder="Enter Borrower official email id" value="{{ old('borrower_official_email_id',$borrower->borrower_official_email_id) }}">
                                @error('borrower_official_email_id', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="borrower_mobile_no">Borrower Mobile No. <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <label class="input-group-text" for="borrower_mobile_no">+91</label>
                                    <input type="number" class="form-control" id="borrower_mobile_no" readonly name="borrower_mobile_no"
                                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"
                                    placeholder="Borrower Mobile No."
                                    value="{{ old('borrower_mobile_no',$borrower->borrower_mobile_no) }}">
                                </div>
                                @error('borrower_mobile_no', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="borrower_pan_no">Borrower Pan No. <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="borrower_pan_no" name="borrower_pan_no"
                                    maxlength="10" placeholder="Enter PAN no." readonly value="{{ old('borrower_pan_no',$borrower->borrower_pan_no) }}">
                                    <a id="borrower_pan_no_file_download" style="display:none;" href="" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                                    <input type="file" name="borrower_pan_no_file" id="borrower_pan_no_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="borrower_pan_no_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('borrower_pan_no', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('borrower_pan_no_file', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="borrower_aadhar_no">Borrower Aadhar No. <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" class="form-control" id="borrower_aadhar_no" name="borrower_aadhar_no"
                                    maxlength="12" placeholder="Enter Aadhar no." readonly value="{{ old('borrower_aadhar_no',$borrower->borrower_aadhar_no) }}">
                                    <a id="borrower_aadhar_no_file_download" style="display:none;" href="" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                                    <input type="file" name="borrower_aadhar_no_file" id="borrower_aadhar_no_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="borrower_aadhar_no_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('borrower_aadhar_no', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('borrower_aadhar_no_file', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="estimated_amount">Estimated Amount <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="estimated_amount" readonly name="estimated_amount"
                                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;"
                                placeholder="Enter Estimated Amount"
                                value="{{ old('estimated_amount',$borrower->borrower_estimated_amount) }}">
                                @error('estimated_amount', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="final_assessment_amount">Final Assessment Amount <span class="text-danger">*</span></label>
                                <input type="number" readonly class="form-control" id="final_assessment_amount" name="final_assessment_amount"
                                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;"
                                placeholder="Enter Estimated Amount"
                                value="{{ old('final_assessment_amount',$borrower->final_assessment_amount) }}">
                                @error('final_assessment_amount', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="medical_lending_type">Medical Lending Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="medical_lending_type" name="medical_lending_type">
                                    <option value="">Select</option>
                                    <option value="Bridge" {{ old('medical_lending_type') == 'Bridge' ? 'selected' : '' }}>Bridge
                                    </option>
                                    <option value="Term" {{ old('medical_lending_type') == 'Term' ? 'selected' : '' }}>Term
                                    </option>
                                </select>
                                @error('medical_lending_type', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="vendor_partner_name_nbfc_or_bank">Vendor Partner Name (NBFC/Bank) <span class="text-danger">*</span></label>
                                <select class="form-select" id="vendor_partner_name_nbfc_or_bank" name="vendor_partner_name_nbfc_or_bank">
                                    <option value="">Select Is Patient and Borrower Same</option>
                                    <option value="Yes" {{ old('vendor_partner_name_nbfc_or_bank') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('vendor_partner_name_nbfc_or_bank') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('vendor_partner_name_nbfc_or_bank', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="vendor_partner_id">Vendor Partner ID<span class="text-danger">*</span></label>
                                <input type="text" maxlength="25" class="form-control" id="vendor_partner_id"
                                name="vendor_partner_id" maxlength="30" placeholder="Vendor Partner ID"  value="{{ old('vendor_partner_id',$borrower->vendor_partner_id) }}">
                                @error('vendor_partner_id', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>                

                            <div class="col-md-12 mt-3">
                                <label for="loan_application_comments">Loan application Comments </label>
                                <textarea class="form-control" id="loan_application_comments" name="loan_application_comments" maxlength="250" placeholder="Claimant Comments"
                                rows="5">{{ old('loan_application_comments') }}</textarea>
                                @error('loan_application_comments', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>            

                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-success" id="apply_loan" form="lending-status-form">
                                Apply Loan</button>
                            </div>

                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-success" form="lending-status-form">
                                Loan Application Status</button>
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="date_of_loan_application">Date of Loan Application (DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" disabled id="date_of_loan_application" name="date_of_loan_application" 
                                value="{{ old('date_of_loan_application',$borrower->date_of_loan_application) }}">

                                @error('date_of_loan_application', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="time_of_loan_application">Time of Loan Application (HH:MM) <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time_of_loan_application" disabled name="time_of_loan_application" 
                                value="{{ old('time_of_loan_application',$borrower->time_of_loan_application) }}">

                                @error('time_of_loan_application', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="date_of_loan_re_application">Date of Loan Re-Application (DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_loan_re_application" disabled name="date_of_loan_re_application" 
                                value="{{ old('date_of_loan_re_application',$borrower->date_of_loan_re_application) }}">

                                @error('date_of_loan_re_application', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="time_of_loan_re_application">Time of Loan Re-Application (HH:MM) <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time_of_loan_re_application" disabled name="time_of_loan_re_application" 
                                value="{{ old('time_of_loan_re_application',$borrower->time_of_loan_re_application) }}">

                                @error('time_of_loan_re_application', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="loan_id_or_no">Loan ID / No.<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" maxlength="20" class="form-control" id="loan_id_or_no"
                                    name="loan_id_or_no" placeholder="Enter Loan ID / No." readonly  value="{{ old('loan_id_or_no',$borrower->loan_id_or_no) }}">
                                    <input type="file" name="loan_id_or_no_file" id="loan_id_or_no_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="loan_id_or_no_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('loan_id_or_no', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('loan_id_or_no_file', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="loan_status">Loan Status<span class="text-danger">*</span></label>
                                <select class="form-select" id="loan_status" name="loan_status" disabled>
                                    <option value="">Select</option>
                                    <option value="Waiting for the Approval" {{ old('loan_status') == 'Waiting for the Approval' ? 'selected' : '' }}>Waiting for the Approval </option>
                                    <option value="Approved" {{ old('loan_status') == 'Approved' ? 'selected' : '' }}>Approved </option>
                                    <option value="Rejected" {{ old('loan_status') == 'Rejected' ? 'selected' : '' }}>Rejected </option>
                                    <option value="Re-applied" {{ old('loan_status') == 'Re-applied' ? 'selected' : '' }}>Re-applied </option>
                                </select>
                                @error('loan_status', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="loan_approved_amount">Loan Approved Amount <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" class="form-control" id="loan_approved_amount"
                                    name="loan_approved_amount" maxlength="30" readonly placeholder="Enter Loan Approved Amount"  value="{{ old('loan_approved_amount',$borrower->loan_approved_amount) }}">
                                    <a id="borrower_pan_no_file_download" style="display:none;" href="" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                                    <input type="file" name="loan_approved_amount_file" id="loan_approved_amount_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="loan_approved_amount_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('loan_approved_amount', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('loan_approved_amount_file', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="loan_disbursed_amount">Loan Disbursed Amount<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" readonly onKeyPress="if(this.value.length==8) return false;" class="form-control" id="loan_disbursed_amount"
                                name="loan_disbursed_amount" maxlength="30" placeholder="Loan Disbursed Amount"  value="{{ old('loan_disbursed_amount',$borrower->loan_disbursed_amount) }}">
                                @error('loan_disbursed_amount', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="date_of_loan_disbursement">Date of Loan Disbursement (DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_loan_disbursement" disabled name="date_of_loan_disbursement" 
                                value="{{ old('date_of_loan_disbursement',$borrower->date_of_loan_disbursement) }}">

                                @error('date_of_loan_disbursement', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            
                            <div class="col-md-6 mt-3">
                                <label for="loan_tenure">Loan Tenure<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" readonly onKeyPress="if(this.value.length==2) return false;" placeholder="Loan Tenure" class="form-control" id="loan_tenure" name="loan_tenure" 
                                value="{{ old('loan_tenure',$borrower->loan_tenure) }}">

                                @error('loan_tenure', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="loan_instalments">Loan Installments<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" readonly onKeyPress="if(this.value.length==2) return false;" class="form-control" placeholder="Enter Loan Installments" id="loan_instalments" name="loan_instalments" 
                                value="{{ old('loan_instalments',$borrower->loan_instalments) }}">

                                @error('loan_instalments', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="col-md-6 mt-3">
                                <label for="loan_start_date">Loan Start Date  (DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" disabled id="loan_start_date" name="loan_start_date" 
                                value="{{ old('loan_start_date',$borrower->loan_start_date) }}">

                                @error('loan_start_date', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="loan_end_date">Loan End Date  (DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" disabled id="loan_end_date" name="loan_end_date" 
                                value="{{ old('loan_end_date',$borrower->loan_end_date) }}">

                                @error('loan_end_date', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="insurance_claim_settlement_date">Insurance Claim Settlement Date (DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <input type="date" class="form-control"  disabled id="insurance_claim_settlement_date" name="insurance_claim_settlement_date" 
                                value="{{ old('insurance_claim_settlement_date',$borrower->insurance_claim_settlement_date) }}">

                                @error('insurance_claim_settlement_date', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="insurance_claim_settled_amount">Insurance Claim Settled Amount*<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" disabled class="form-control" id="insurance_claim_settled_amount" name="insurance_claim_settled_amount" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;"
                                    value="{{ old('insurance_claim_settled_amount',$borrower->insurance_claim_settled_amount) }}">
                                    <a id="insurance_claim_settled_amount_file" style="display:none;" href="" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                                    <input type="file" name="insurance_claim_settled_amount_file" id="insurance_claim_settled_amount_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="insurance_claim_settled_amount_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('insurance_claim_settled_amount', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('insurance_claim_settled_amount_file', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            <div class="col-md-6 mt-3">
                                <label for="insurance_claim_amount_disbursement_date">Insurance Claim Amount Disbursement Date(DD/MM/YYYY)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                <input type="date" class="form-control" disabled id="insurance_claim_amount_disbursement_date" name="insurance_claim_amount_disbursement_date" 
                                value="{{ old('insurance_claim_amount_disbursement_date',$borrower->insurance_claim_amount_disbursement_date) }}">
                                <a id="insurance_claim_disbursement_amount_file" style="display:none;" href="" download="" class="btn btn-warning download-label"><i class="mdi mdi-download"></i></a>
                                    <input type="file" name="insurance_claim_disbursement_amount_file" id="insurance_claim_disbursement_amount_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="insurance_claim_disbursement_amount_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('insurance_claim_amount_disbursement_date', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('insurance_claim_disbursement_amount_file', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-12 mt-3">
                                <label for="loan_application_status_comments">Loan Application Status comments </label>
                                <textarea class="form-control" disabled id="loan_application_status_comments" name="loan_application_status_comments" maxlength="250" placeholder="Loan Application Status comments"
                                rows="5">{{ old('loan_application_status_comments') }}</textarea>
                                @error('loan_application_status_comments', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div> 

                            <div class="col-md-12 text-end mt-3 mb-2">
                                <button type="submit" class="btn btn-success" form="lending-status-form">
                                Update Loan Application Status</button>
                            </div>


                            <div class="col-md-12 mb-1 bg-secondary text-white" style="line-height: 30px; margin-left: 2px; ;">  Loan Re-application Status  </div> 


                            <div class="col-md-6 mt-1">
                                <label for="re_apply_loan_amount">Re-apply Loan Amount<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" readonly id="re_apply_loan_amount" name="re_apply_loan_amount" 
                                value="{{ old('re_apply_loan_amount',$borrower->re_apply_loan_amount) }}">

                                @error('re_apply_loan_amount', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="loan_re_application_status_comments">Loan Re-application Status comments<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  readonly id="loan_re_application_status_comments" name="loan_re_application_status_comments" 
                                value="{{ old('loan_re_application_status_comments',$borrower->loan_re_application_status_comments) }}">

                                @error('loan_re_application_status_comments', 'lending-status-form')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="applyloan" id="applyloan" value="0">

                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-success" form="lending-status-form">
                                Re-apply Loan</button>
                            </div>   

                        </div>
                    </div>
                </form>
@push('scripts')
    
</script>
<script>
    jQuery(document).ready(function(){
        $('#apply_loan').on('click',function(e){
          e.preventDefault();
          $('#applyloan').val(1);
          $('#date_of_loan_application').removeAttr('disabled');
          $('#time_of_loan_application').removeAttr('disabled');
          $('#date_of_loan_re_application').removeAttr('disabled');
          $('#time_of_loan_re_application').removeAttr('disabled');
          $('#loan_id_or_no').removeAttr('readonly');
          $('#loan_status').removeAttr('disabled');
          $('#loan_approved_amount').removeAttr('readonly');
          $('#loan_disbursed_amount').removeAttr('readonly');
          $('#loan_tenure').removeAttr('readonly');
          $('#loan_instalments').removeAttr('readonly');
          $('#loan_start_date').removeAttr('disabled');
          $('#loan_end_date').removeAttr('disabled');
          $('#insurance_claim_settlement_date').removeAttr('disabled');
          $('#insurance_claim_settled_amount').removeAttr('disabled');
          $('#insurance_claim_amount_disbursement_date').removeAttr('disabled');
          $('#loan_application_status_comments').removeAttr('disabled');
          $('#re_apply_loan_amount').removeAttr('readonly');
          $('#loan_re_application_status_comments').removeAttr('readonly');
          

        });
    });
</script>
@endpush
