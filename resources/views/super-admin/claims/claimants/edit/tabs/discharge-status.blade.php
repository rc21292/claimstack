                    <form action="{{ route('super-admin.claimants.save-discharge-status',$id) }}" method="post" id="discharge-status-form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body mb-4">
                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="hospital_id">Hospital ID <span class="text-danger">*</span></label>
                                <input type="text" readonly class="form-control" id="hospital_id" name="hospital_id" maxlength="60"
                                placeholder="Enter Borrower Id" value="{{ old('hospital_id',$borrower->hospital_id) }}">
                                @error('hospital_id')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="hospital_name" name="hospital_name"
                                placeholder="Enter Hospital Name" value="{{ old('hospital_name',$borrower->hospital_name) }}">
                                @error('hospital_name')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                                <input type="text" readonly class="form-control" id="patient_id" name="patient_id" maxlength="60"
                                placeholder="Enter Patient Id" value="{{ old('patient_id',$borrower->patient_id) }}">
                                @error('patient_id')
                                <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="claim_id">Cliam ID <span class="text-danger">*</span></label>
                                <input type="text" readonly class="form-control" id="claim_id" name="claim_id" maxlength="60"
                                placeholder="Enter Claim Id" value="{{ old('claim_id',$borrower->claim_id) }}">
                                @error('claim_id')
                                <span id="claim-id-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="insurance_coverage">Insurance Coverage <span class="text-danger">*</span></label>
                                <select class="form-select" id="insurance_coverage" name="insurance_coverage" >
                                    <option value="">Select</option>
                                    <option value="Yes" {{ old('insurance_coverage') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('insurance_coverage') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('insurance_coverage')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="lending_required">Lending Required <span class="text-danger">*</span></label>
                                <select class="form-select" id="lending_required" name="lending_required">
                                    <option value="">Select</option>
                                    <option value="Yes" {{ old('lending_required') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('lending_required') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('lending_required')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="date_of_admission">Date of Admission (DD-MM-YYYY) <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_admission" name="date_of_admission"
                                value="{{ old('date_of_admission', $claim->date_of_admission) }}">
                                @error('date_of_admission')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="time_of_admission">Time of Admission (HH:MM) <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time_of_admission" name="time_of_admission"
                                value="{{ old('time_of_admission', $claim->time_of_admission) }}">
                                @error('time_of_admission')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="hospitalization_due_to">Hospitalization Due To <span class="text-danger">*</span></label>
                                <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="injury" value="Injury"
                                        name="hospitalization_due_to" @if(old('hospitalzation_due_to' , $claim->hospitalization_due_to) == 'Injury') checked @endif>
                                        <label class="form-check-label" for="injury">Injury</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="illness" value="Illness"
                                        name="hospitalization_due_to"  @if(old('hospitalzation_due_to' , $claim->hospitalization_due_to) == 'Illness') checked @endif>
                                        <label class="form-check-label" for="illness">Illness</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="maternity"value="Maternity"
                                        name="hospitalization_due_to"  @if(old('hospitalzation_due_to' , $claim->hospitalization_due_to) == 'Maternity') checked @endif>
                                        <label class="form-check-label" for="maternity">Maternity</label>
                                    </div>
                                </div>
                                @error('hospitalization_due_to')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="date_of_delivery">Date of Injury / Date Disease first detected / Date of delivery
                                    (DD-MM-YYYY) <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date_of_delivery" name="date_of_delivery"
                                    value="{{ old('date_of_delivery', $claim->date_of_delivery) }}"
                                    placeholder="Date of Injury / Date Disease first detected / Date of delivery (DD-MM-YYYY)">
                                    @error('date_of_delivery')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            
                            <div class="col-md-12 mt-3">
                                <label for="injury_reason">If Injury, give Cause/Reason <span class="text-danger">*</span></label>
                                <select class="form-select" id="injury_reason" name="injury_reason">
                                    <option value="">Select</option>
                                    <option value="Self Inflected" {{ old('injury_reason') == 'Self Inflected' ? 'selected' : '' }}>Self Inflected
                                    </option>
                                    <option value="Road Traffic Accident" {{ old('injury_reason') == 'Road Traffic Accident' ? 'selected' : '' }}>Road Traffic Accident
                                    </option>
                                    <option value="Substance Abuse-Alcohol Consumption" {{ old('injury_reason') == 'Substance Abuse-Alcohol Consumption' ? 'selected' : '' }}>Substance Abuse-Alcohol Consumption
                                    </option>
                                </select>
                                @error('injury_reason')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="injury_due_to_substance_abuse_alcohol_consumption">If Injury due to Substance Abuse-Alcohol Consumption, Test conducted to establish this <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <select class="form-select" id="injury_due_to_substance_abuse_alcohol_consumption" name="injury_due_to_substance_abuse_alcohol_consumption">
                                    <option value="">Select</option>
                                    <option value="Yes" {{ old('injury_due_to_substance_abuse_alcohol_consumption') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('injury_due_to_substance_abuse_alcohol_consumption') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                <input type="file" name="injury_due_to_substance_abuse_alcohol_consumption_file" id="injury_due_to_substance_abuse_alcohol_consumption_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="injury_due_to_substance_abuse_alcohol_consumption_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('injury_due_to_substance_abuse_alcohol_consumption')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('injury_due_to_substance_abuse_alcohol_consumption_file')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="if_medico_legal_case_mlc">If Medico Legal Case (MLC) <span class="text-danger">*</span></label>
                                <select class="form-select" id="if_medico_legal_case_mlc" name="if_medico_legal_case_mlc">
                                    <option value="">Select</option>
                                    <option value="Yes" {{ old('if_medico_legal_case_mlc') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('if_medico_legal_case_mlc') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('if_medico_legal_case_mlc')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="reported_to_police">Reported to Police <span class="text-danger">*</span></label>
                                <select class="form-select" id="reported_to_police" name="reported_to_police">
                                    <option value="">Select</option>
                                    <option value="Yes" {{ old('reported_to_police') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('reported_to_police') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('reported_to_police')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="mlc_report_and_police_fir_attached">MLC Report & Police FIR attached<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select class="form-select" id="mlc_report_and_police_fir_attached" name="mlc_report_and_police_fir_attached">
                                        <option value="">Select</option>
                                        <option value="Yes" {{ old('mlc_report_and_police_fir_attached') == 'Yes' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="No" {{ old('mlc_report_and_police_fir_attached') == 'No' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                    <input type="file" name="mlc_report_and_police_fir_attached_file" id="mlc_report_and_police_fir_attached_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="mlc_report_and_police_fir_attached_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('mlc_report_and_police_fir_attached')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('mlc_report_and_police_fir_attached_file')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="fir_or_mlc_no">FIR No. / MLC No.<span class="text-danger">*</span></label>
                                <input type="text" maxlength="27" class="form-control" id="fir_or_mlc_no"
                                name="fir_or_mlc_no" placeholder="Last name"  value="{{ old('fir_or_mlc_no',$borrower->fir_or_mlc_no) }}">
                                @error('fir_or_mlc_no')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>                

                            <div class="col-md-12 mt-3">
                                <label for="not_reported_to_police_reason">If not reported to Police, give reason </label>
                                <textarea class="form-control" id="not_reported_to_police_reason" name="not_reported_to_police_reason" maxlength="100" placeholder="Claimant Comments"
                                rows="5">{{ old('not_reported_to_police_reason') }}</textarea>
                                @error('not_reported_to_police_reason')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>            


                            <div class="col-md-6 mt-3">
                                <label for="maternity_date_of_delivery">If Maternity - Date of Delivery<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="maternity_date_of_delivery" name="maternity_date_of_delivery" 
                                value="{{ old('maternity_date_of_delivery',$borrower->maternity_date_of_delivery) }}">

                                @error('maternity_date_of_delivery')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2 mt-3 bg-secondary text-white" style="line-height: 30px; margin-left: 2px; ;">  If Maternity - Gravida Status  </div>
                            
                            <div class="col-md-3 mt-1">
                                <label for="maternity_gravida_status_g">G<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" class="form-control" id="maternity_gravida_status_g"
                                name="maternity_gravida_status_g" placeholder="Enter G"  value="{{ old('maternity_gravida_status_g',$borrower->maternity_gravida_status_g) }}">
                                @error('maternity_gravida_status_g')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 mt-1">
                                <label for="maternity_gravida_status_p">P<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" class="form-control" id="maternity_gravida_status_p"
                                name="maternity_gravida_status_p" placeholder="Enter P"  value="{{ old('maternity_gravida_status_p',$borrower->maternity_gravida_status_p) }}">
                                @error('maternity_gravida_status_p')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 mt-1">
                                <label for="maternity_gravida_status_l">L<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" class="form-control" id="maternity_gravida_status_l"
                                name="maternity_gravida_status_l" placeholder="Enter L"  value="{{ old('maternity_gravida_status_l',$borrower->maternity_gravida_status_l) }}">
                                @error('maternity_gravida_status_l')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 mt-1">
                                <label for="maternity_gravida_status_a">A<span class="text-danger">*</span></label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" class="form-control" id="maternity_gravida_status_a"
                                name="maternity_gravida_status_a" placeholder="Enter A"  value="{{ old('maternity_gravida_status_a',$borrower->maternity_gravida_status_a) }}">
                                @error('maternity_gravida_status_a')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="premature_baby">Premature Baby<span class="text-danger">*</span></label>
                                <select class="form-select" id="premature_baby" name="premature_baby">
                                    <option value="">Select</option>
                                    <option value="Yes" {{ old('premature_baby') == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('premature_baby') == 'No' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('premature_baby')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="date_of_discharge">Date of Discharge<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_discharge" name="date_of_discharge" 
                                value="{{ old('date_of_discharge',$borrower->date_of_discharge) }}">

                                @error('date_of_discharge')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="time_of_discharge">Time of Discharge<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time_of_discharge" name="time_of_discharge" 
                                value="{{ old('time_of_discharge',$borrower->time_of_discharge) }}">

                                @error('time_of_discharge')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="discharge_status">Discharge Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="discharge_status" name="discharge_status">
                                    <option value="">Select</option>
                                    <option value="Discharge to Home" {{ old('discharge_status') == 'Discharge to Home' ? 'selected' : '' }}>Discharge to Home
                                    </option>
                                    <option value="Discharge to another Hospital" {{ old('discharge_status') == 'Discharge to another Hospital' ? 'selected' : '' }}>Discharge to another Hospital
                                    </option>
                                    <option value="Deceased" {{ old('discharge_status') == 'Deceased' ? 'selected' : '' }}>Deceased
                                    </option>
                                    <option value="LAMA" {{ old('discharge_status') == 'LAMA' ? 'selected' : '' }}>LAMA
                                    </option>
                                </select>
                                @error('discharge_status')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-1">
                                <label for="death_summary">Death Summary<span class="text-danger">*</span></label>
                                <div class="input-group">
                                <textarea rows="1" class="form-control" id="death_summary" name="death_summary" maxlength="250" placeholder="Claimant Comments"
                                rows="5">{{ old('death_summary') }}</textarea>
                                <input type="file" name="death_summary_file" id="death_summary_file" hidden  onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                                    <label for="death_summary_file" class="btn btn-primary upload-label"><i  class="mdi mdi-upload"></i></label>
                                </div>
                                @error('death_summary')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                                @error('death_summary_file')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 mt-1">
                                <label for="discharge_status_comments">Discharge Status Comments<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="discharge_status_comments" name="discharge_status_comments" maxlength="250" placeholder="Claimant Comments"
                                rows="5">{{ old('discharge_status_comments') }}</textarea>

                                @error('discharge_status_comments')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-success" form="discharge-status-form">
                                Save / Update Discharge Status</button>
                            </div>   

                        </div>
                    </div>
                </form>
@push('scripts')
    
</script>
@endpush
