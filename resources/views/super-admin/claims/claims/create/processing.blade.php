@extends('layouts.super-admin')
@section('title', 'New Claim')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Claim Stack</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Claims</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('super-admin.claims.index') }}">Claims</a>
                            </li>
                            <li class="breadcrumb-item active">New Claim</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Claim Processing</h4>
                </div>
            </div>
        </div>
        @include('super-admin.sections.flash-message')
        <!-- end page title -->

        <!-- start page content -->
        <div class="row">
            <div class="col-12">
                <div class="card no-shadow">
                    <div class="card-body">
    <form action="{{ route('super-admin.claims.store') }}" method="post" id="claim-form" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
                <div class="col-md-12 mb-3">
                    <label for="patient_id">Patient ID <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="patient_id" name="patient_id" maxlength="60"
                    placeholder="Enter Patient Id" value="{{ old('patient_id') }}">
                    @error('patient_id')
                    <span id="patient-id-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="firstname">Patient Name <span class="text-danger">*</span></label>
                </div>

                <div class="col-md-3">
                    <select class="form-control" id="title" name="title">
                        <option value="">Select</option>
                        <option value="Mr." {{ old('title') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                        <option value="Ms." {{ old('title') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                    </select>
                    @error('title')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <input type="text" maxlength="25" class="form-control" id="lastname"
                    name="lastname" placeholder="Last name"
                    value="{{ old('lastname') }}">
                    @error('lastname')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <input type="text" maxlength="25" class="form-control" id="firstname"
                    name="firstname" placeholder="First name"
                    value="{{ old('firstname') }}">
                    @error('firstname')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <input type="text" maxlength="25" class="form-control" id="middlename"
                    name="middlename" placeholder="Middle name"
                    value="{{ old('middlename') }}">
                    @error('middlename')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mt-3">
                    <label for="age">Patient Age <span class="text-danger">*</span></label>
                    <input type="number" onkeypress="return isNumberKey(event)" class="form-control"
                    id="age" name="age" placeholder="Patient Age"
                    value="{{ old('age') }}">
                    @error('age')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label for="gender">Patient Gender <span class="text-danger">*</span></label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="">Select gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                        </option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                        </option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                        </option>
                    </select>
                    @error('gender')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-12 mt-3">
                    <label for="patient_current_address">Patient Current Resedential Address <span class="text-danger">*</span></label>
                    <input type="text" maxlength="100" class="form-control"
                    id="patient_current_address" name="patient_current_address"
                    placeholder="Address Line" value="{{ old('patient_current_address') }}">
                    @error('patient_current_address')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 mt-2">
                    <input type="text" class="form-control" id="patient_current_city"
                    name="patient_current_city" placeholder="City"
                    value="{{ old('patient_current_city') }}">
                    @error('patient_current_city')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 mt-2">
                    <input type="text" class="form-control" id="patient_current_state"
                    name="patient_current_state" placeholder="State"
                    value="{{ old('patient_current_state') }}">
                    @error('patient_current_state')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 mt-2">
                    <input type="number" class="form-control" id="patient_current_pincode"
                    name="patient_current_pincode" pattern="/^-?\d+\.?\d*$/"
                    onKeyPress="if(this.value.length==6) return false;" placeholder="Pincode"
                    value="{{ old('patient_current_pincode') }}">
                    @error('patient_current_pincode')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-2">
                    <label for="hospital_id">Hospital Id <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="hospital_id" name="hospital_id"
                    placeholder="Enter Hospital Id" value="{{ old('hospital_id') }}">
                    @error('hospital_id')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-2">
                    <label for="hospital_name">Hospital Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="hospital_name" name="hospital_name"
                    placeholder="Enter Hospital Name" value="{{ old('hospital_name') }}">
                    @error('hospital_name')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mt-2 mb-1">
                    <label for="hospital_address">Hospital Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="hospital_address" name="hospital_address"
                    placeholder="Address Line"
                    value="{{ old('hospital_address') }}">
                    @error('hospital_address')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-4 mt-1">
                    <input type="text" class="form-control" id="hospital_city" name="hospital_city" placeholder="City"
                    value="{{ old('hospital_city') }}">
                    @error('hospital_city')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 mt-2">
                    <input type="text" class="form-control" id="hospital_state" name="hospital_state" placeholder="State"
                    value="{{ old('hospital_state') }}">
                    @error('hospital_state')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 mt-2">
                    <input type="number" class="form-control" id="hospital_pincode" name="hospital_pincode"
                    placeholder="Pincode" value="{{ old('hospital_pincode') }}">
                    @error('hospital_pincode')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="insurance_company">Insurance Company<span class="text-danger">*</span></label>
                    <select class="form-control select2" id="insurance_company" name="insurance_company" data-toggle="select2">
                        <option value="">Select Insurance Company</option>
                        @foreach ($insurers as $insurer)
                        <option value="{{ $insurer->id }}"
                            {{ old('insurance_company') == $insurer->id ? 'selected' : '' }}> {{ $insurer->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('insurance_company')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="policy_type">Policy Type <span class="text-danger">*</span></label>
                    <select class="form-select" id="policy_type" name="policy_type" onchange="setGroupName();">
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
                    <label for="policy_name">Policy Name <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="policy_name" name="policy_name" data-toggle="select2">
                        <option value="">Select Policy</option>
                        @foreach ($insurers as $insurer)
                            <option value="{{ $insurer->id }}"
                                {{ old('policy_name') == $insurer->id ? 'selected' : '' }}>
                                {{ $insurer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('policy_name')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="start_date">Policy Start Date <span class="text-danger">*</span></label>
                    <input type="date" placeholder="Enter Policy Start Date" class="form-control" id="start_date"
                    name="start_date" value="{{ old('start_date') }}">
                    @error('start_date')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="expiry_date">Policy Expiry Date <span class="text-danger">*</span></label>
                    <input type="date" placeholder="Enter Policy Expiry Date" class="form-control" id="expiry_date"
                    name="expiry_date" value="{{ old('expiry_date') }}">
                    @error('expiry_date')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="commencement_date">Policy Commencement Date (without Break) <span  class="text-danger">*</span></label>
                    <input type="date" placeholder="Enter Policy Commencement Date (without Break)"
                    class="form-control" id="commencement_date" name="commencement_date"
                    value="{{ old('commencement_date') }}">
                    @error('commencement_date')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="admission_date">Date of Admission (DD-MM-YYYY) <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="admission_date" name="admission_date"
                    value="{{ old('admission_date') }}">
                    @error('admission_date')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="admission_time">Time of Admission (HH:MM) <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="admission_time" name="admission_time"
                    value="{{ old('admission_time') }}">
                    @error('admission_time')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="probable_date_of_discharge">Expected Date of Discharge </label>
                    <input class="form-control" {{ old('probable_date_of_discharge') }} id="probable_date_of_discharge" name="probable_date_of_discharge"  placeholder="Probable Date of Discharge"></input>
                    @error('probable_date_of_discharge')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>   

                <div class="col-md-6 mb-3">
                    <label for="probable_date_of_discharge">Expected No. of Days in Hospital </label>
                    <input type="number" class="form-control" {{ old('probable_date_of_discharge') }} id="probable_date_of_discharge" name="probable_date_of_discharge"  placeholder="Probable Date of Discharge"></input>
                    @error('probable_date_of_discharge')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>   

                <div class="col-md-12 mb-3">
                    <label for="hospitalization_due_to">Hospitalization Due To <span class="text-danger">*</span></label>
                    <div class="mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="injury" value="Injury"
                            name="hospitalization_due_to" {{ old('hospitalization_due_to') == 'Injury' ? 'checked' : '' }}>
                            <label class="form-check-label" for="injury">Injury</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="illness" value="Illness"
                            name="hospitalization_due_to" {{ old('hospitalization_due_to') == 'Illness' ? 'checked' : '' }}>
                            <label class="form-check-label" for="illness">Illness</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="maternity" value="Maternity"
                            name="hospitalization_due_to" {{ old('hospitalization_due_to') == 'Maternity' ? 'checked' : '' }}>
                            <label class="form-check-label" for="maternity">Maternity</label>
                        </div>
                    </div>
                    @error('hospitalization_due_to')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="date_of_delivery">Date of Injury / Date Disease first detected / Date of delivery   (DD-MM-YYYY) <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date_of_delivery" name="date_of_delivery"
                    value="{{ old('date_of_delivery') }}"
                    placeholder="Date of Injury / Date Disease first detected / Date of delivery (DD-MM-YYYY)">
                    @error('date_of_delivery')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label for="date_of_delivery">Date of First Consultation  (DD-MM-YYYY) <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date_of_delivery" name="date_of_delivery"
                    value="{{ old('date_of_delivery') }}"
                    placeholder="Date of Injury / Date Disease first detected / Date of delivery (DD-MM-YYYY)">
                    @error('date_of_delivery')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label for="system_of_medicine">System of Medicine <span class="text-danger">*</span></label>
                    <select class="form-select" id="system_of_medicine" name="system_of_medicine">
                        <option value="">Select</option>
                        <option value="Allopathy" {{ old('system_of_medicine') == 'Allopathy' ? 'selected' : '' }}>
                            Allopathy
                        </option>
                        <option value="Ayurveda" {{ old('system_of_medicine') == 'Ayurveda' ? 'selected' : '' }}>Ayurveda
                        </option>
                        <option value="Homeopathy" {{ old('system_of_medicine') == 'Homeopathy' ? 'selected' : '' }}>
                            Homeopathy
                        </option>
                        <option value="Naturopathy" {{ old('system_of_medicine') == 'Naturopathy' ? 'selected' : '' }}>
                            Naturopathy
                        </option>
                        <option value="Siddha" {{ old('system_of_medicine') == 'Siddha' ? 'selected' : '' }}>Siddha
                        </option>
                        <option value="Unani" {{ old('system_of_medicine') == 'Unani' ? 'selected' : '' }}>Unani
                        </option>
                        <option value="AYUSH" {{ old('system_of_medicine') == 'AYUSH' ? 'selected' : '' }}>AYUSH
                        </option>
                    </select>
                    @error('system_of_medicine')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mt-3">
                    <label for="treatment_type">Treatment Type <span class="text-danger">*</span></label>
                    <select class="form-select" id="treatment_type" name="treatment_type">
                        <option value="">Select</option>
                        <option value="OPD" {{ old('treatment_type') == 'OPD' ? 'selected' : '' }}>OPD
                        </option>
                        <option value="IPD" {{ old('treatment_type') == 'IPD' ? 'selected' : '' }}>IPD
                        </option>
                    </select>
                    @error('treatment_type')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mt-3">
                    <label for="admission_type_1">Admission Type - 1 <span class="text-danger">*</span></label>
                    <div class="mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="emergency" value="Emergency"
                            name="admission_type_1" {{ old('admission_type_1') == 'Emergency' ? 'checked' : '' }}>
                            <label class="form-check-label" for="emergency">Emergency</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="planned" value="Planned"
                            name="admission_type_1" {{ old('admission_type_1') == 'Planned' ? 'checked' : '' }}>
                            <label class="form-check-label" for="planned">Planned</label>
                        </div>
                    </div>
                    @error('admission_type_1')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="admission_type_2">Admission Type - 2 <span class="text-danger">*</span></label>
                    <div class="mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="day_care" value="Day Care"
                            name="admission_type_2" {{ old('admission_type_2') == 'Day Care' ? 'checked' : '' }}>
                            <label class="form-check-label" for="day_care">Day Care</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="hospitalization" value="Hospitalization"
                            name="admission_type_2" {{ old('admission_type_2') == 'Hospitalization' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hospitalization">Hospitalization</label>
                        </div>
                    </div>
                    @error('admission_type_2')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="admission_type_3">Admission Type - 3 <span class="text-danger">*</span></label>
                    <select class="form-select" id="admission_type_3" name="admission_type_3">
                        <option value="">Select</option>
                        <option value="Main" {{ old('admission_type_3') == 'Main' ? 'selected' : '' }}>Main
                        </option>
                        <option value="Pre-Post" {{ old('admission_type_3') == 'Pre-Post' ? 'selected' : '' }}>Pre-Post
                        </option>
                    </select>
                    @error('admission_type_3')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="claim_category">Claim Category <span class="text-danger">*</span></label>
                    <select class="form-select" id="claim_category" name="claim_category">
                        <option value="">Select</option>
                        <option value="Cashless" {{ old('claim_category') == 'Cashless' ? 'selected' : '' }}>Cashless
                        </option>
                        <option value="Reimbursement" {{ old('claim_category') == 'Reimbursement' ? 'selected' : '' }}>
                            Reimbursement
                        </option>
                    </select>
                    @error('claim_category')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="treatment_category">Treatment Category <span class="text-danger">*</span></label>
                    <select class="form-select" id="treatment_category" name="treatment_category">
                        <option value="">Select</option>
                        <option value="OPD" {{ old('treatment_category') == 'OPD' ? 'selected' : '' }}>OPD
                        </option>
                        <option value="IPD" {{ old('treatment_category') == 'IPD' ? 'selected' : '' }}>IPD
                        </option>
                    </select>
                    @error('treatment_category')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="disease_category">Disease Category <span class="text-danger">*</span></label>
                    <select class="form-select" id="disease_category" name="disease_category">
                        <option value="">Select</option>
                        <option value="Cardiac" {{ old('disease_category') == 'Cardiac' ? 'selected' : '' }}>Cardiac
                        </option>
                        <option value="Dialysis" {{ old('disease_category') == 'Dialysis' ? 'selected' : '' }}>Dialysis
                        </option>
                        <option value="Eye Related" {{ old('disease_category') == 'Eye Related' ? 'selected' : '' }}>Eye
                            Related
                        </option>
                        <option value="Infection" {{ old('disease_category') == 'Infection' ? 'selected' : '' }}>Infection
                        </option>
                        <option value="Maternity" {{ old('disease_category') == 'Maternity' ? 'selected' : '' }}>
                            Maternity
                        </option>
                        <option value="Neuro Related" {{ old('disease_category') == 'Neuro Related' ? 'selected' : '' }}>
                            Neuro Related
                        </option>
                        <option value="Injury" {{ old('disease_category') == 'Injury' ? 'selected' : '' }}>Injury
                        </option>
                        <option value="Other" {{ old('disease_category') == 'Other' ? 'selected' : '' }}>Other
                        </option>
                    </select>
                    @error('disease_category')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="disease_name">Disease Name. <span class="text-danger">*</span></label>
                    <input type="text" maxlength="45" class="form-control" id="disease_name" name="disease_name"
                    value="{{ old('disease_name') }}" placeholder="Disease Name">
                    @error('disease_name')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="disease_type">Disease Type <span class="text-danger">*</span></label>
                    <select class="form-select" id="disease_type" name="disease_type">
                        <option value="">Select</option>
                        <option value="PED (Pre Existing Disease)"  {{ old('disease_type') == 'PED (Pre Existing Disease)' ? 'selected' : '' }}>PED (Pre Existing Disease)  </option>
                        <option value="Non PED" {{ old('disease_type') == 'Non PED' ? 'selected' : '' }}>Non PED </option>
                    </select>
                    @error('disease_type')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label for="associate_partner_id">Nature of Illness/Disease with presenting complaints <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="associate_partner_id" name="associate_partner_id"
                    placeholder="Associate Partner ID" value="{{ old('associate_partner_id') }}">
                    @error('associate_partner_id')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label for="associate_partner_id">Relevant Clinical Findings <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="associate_partner_id" name="associate_partner_id"
                    placeholder="Associate Partner ID" value="{{ old('associate_partner_id') }}">
                    @error('associate_partner_id')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label for="probable_date_of_discharge">Probable Date of Discharge </label>
                    <input class="form-control" {{ old('probable_date_of_discharge') }} id="probable_date_of_discharge" name="probable_date_of_discharge"  placeholder="Probable Date of Discharge"></input>
                    @error('probable_date_of_discharge')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>     

                <div class="col-md-6 mt-3">
                    <label for="probable_date_of_discharge">Probable Date of Discharge </label>
                    <input class="form-control" {{ old('probable_date_of_discharge') }} id="probable_date_of_discharge" name="probable_date_of_discharge"  placeholder="Probable Date of Discharge"></input>
                    @error('probable_date_of_discharge')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>     

            <div class="col-md-6 mt-3">
                <label for="registration_no">IP (In-patient) Registration No. <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" maxlength="20" id="registration_no"
                    name="registration_no" placeholder="Enter IP Registration No."
                    value="{{ old('registration_no') }}">
                @error('registration_no')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12 mt-3">
                <label for="firstname">Patient Name <span class="text-danger">*</span></label>
            </div>

            <div class="col-md-3 mt-1">
                <select class="form-control" id="title" name="title">
                    <option value="">Select</option>
                    <option value="Mr." {{ old('title') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                    <option value="Ms." {{ old('title') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                </select>
                @error('title')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-3 mt-1">
                <input type="text" maxlength="25" class="form-control" id="lastname" name="lastname"
                    maxlength="30" placeholder="Last name" value="{{ old('lastname') }}">
                @error('lastname')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-3 mt-1">
                <input type="text" maxlength="25" class="form-control" id="firstname" name="firstname"
                    maxlength="15" placeholder="First name" value="{{ old('firstname') }}">
                @error('firstname')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-3 mt-1">
                <input type="text" maxlength="25" class="form-control" id="middlename" name="middlename"
                    maxlength="30" placeholder="Middle name" value="{{ old('middlename') }}">
                @error('middlename')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label for="age">Patient Age <span class="text-danger">*</span></label>
                <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="age"
                    name="age" placeholder="Patient Age" value="{{ old('age') }}">
                @error('age')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label for="gender">Patient Gender <span class="text-danger">*</span></label>
                <select class="form-select" id="gender" name="gender">
                    <option value="">Select gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                    </option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                    </option>
                </select>
                @error('gender')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="admission_date">Date of Admission (DD-MM-YYYY) <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="admission_date" name="admission_date"
                    value="{{ old('admission_date') }}">
                @error('admission_date')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="admission_time">Time of Admission (HH:MM) <span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="admission_time" name="admission_time"
                    value="{{ old('admission_time') }}">
                @error('admission_time')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 mt-3">
                <label for="abha_id">ABHA ID <span class="text-danger">*</span></label>
                <div class="input-group">
                <input type="text" maxlength="45" class="form-control" id="abha_id" name="abha_id"
                    placeholder="ABHA ID" value="{{ old('abha_id') }}">
                    <input type="file" name="abhafile" id="abhafile" hidden
                                            onchange="$('label[for=' + $(this).attr('id') + ']').removeClass('btn-primary');$('label[for=' + $(this).attr('id') + ']').addClass('btn-warning');" />
                    <label for="abhafile" class="btn btn-primary upload-label"><i class="mdi mdi-upload"></i></label>
                </div>
                @error('abha_id')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
                @error('abhafile')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="insurance_coverage">Insurance Coverage <span class="text-danger">*</span></label>
                <select class="form-select" id="insurance_coverage" name="insurance_coverage" onchange="setInsuranceCoverageOptions()">
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
                <label for="policy_no">Policy No. <span class="text-danger">*</span></label>
                <input type="text" maxlength="16" class="form-control" id="policy_no" name="policy_no"
                    placeholder="Policy No." value="{{ old('policy_no') }}">
                @error('policy_no')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="company_tpa_id_card_no">Company / TPA ID Card No. <span
                        class="text-danger">*</span></label>
                <input type="text" maxlength="16" class="form-control" id="company_tpa_id_card_no"
                    placeholder="Company / TPA ID Card No." name="company_tpa_id_card_no"
                    value="{{ old('company_tpa_id_card_no') }}">
                @error('company_tpa_id_card_no')
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
            <div class="col-md-12 mt-3">
                <label for="hospitalization_due_to">Hospitalization Due To <span class="text-danger">*</span></label>
                <div class="mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="injury" value="Injury"
                            name="hospitalization_due_to" {{ old('hospitalization_due_to') == 'Injury' ? 'checked' : '' }}>
                        <label class="form-check-label" for="injury">Injury</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="illness" value="Illness"
                            name="hospitalization_due_to" {{ old('hospitalization_due_to') == 'Illness' ? 'checked' : '' }}>
                        <label class="form-check-label" for="illness">Illness</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="maternity" value="Maternity"
                            name="hospitalization_due_to" {{ old('hospitalization_due_to') == 'Maternity' ? 'checked' : '' }}>
                        <label class="form-check-label" for="maternity">Maternity</label>
                    </div>
                </div>
                @error('hospitalization_due_to')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="date_of_delivery">Date of Injury / Date Disease first detected / Date of delivery
                    (DD-MM-YYYY) <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="date_of_delivery" name="date_of_delivery"
                    value="{{ old('date_of_delivery') }}"
                    placeholder="Date of Injury / Date Disease first detected / Date of delivery (DD-MM-YYYY)">
                @error('date_of_delivery')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="system_of_medicine">System of Medicine <span class="text-danger">*</span></label>
                <select class="form-select" id="system_of_medicine" name="system_of_medicine">
                    <option value="">Select</option>
                    <option value="Allopathy" {{ old('system_of_medicine') == 'Allopathy' ? 'selected' : '' }}>
                        Allopathy
                    </option>
                    <option value="Ayurveda" {{ old('system_of_medicine') == 'Ayurveda' ? 'selected' : '' }}>Ayurveda
                    </option>
                    <option value="Homeopathy" {{ old('system_of_medicine') == 'Homeopathy' ? 'selected' : '' }}>
                        Homeopathy
                    </option>
                    <option value="Naturopathy" {{ old('system_of_medicine') == 'Naturopathy' ? 'selected' : '' }}>
                        Naturopathy
                    </option>
                    <option value="Siddha" {{ old('system_of_medicine') == 'Siddha' ? 'selected' : '' }}>Siddha
                    </option>
                    <option value="Unani" {{ old('system_of_medicine') == 'Unani' ? 'selected' : '' }}>Unani
                    </option>
                    <option value="AYUSH" {{ old('system_of_medicine') == 'AYUSH' ? 'selected' : '' }}>AYUSH
                    </option>
                </select>
                @error('system_of_medicine')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="treatment_type">Treatment Type <span class="text-danger">*</span></label>
                <select class="form-select" id="treatment_type" name="treatment_type">
                    <option value="">Select</option>
                    <option value="OPD" {{ old('treatment_type') == 'OPD' ? 'selected' : '' }}>OPD
                    </option>
                    <option value="IPD" {{ old('treatment_type') == 'IPD' ? 'selected' : '' }}>IPD
                    </option>
                </select>
                @error('treatment_type')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="admission_type_1">Admission Type - 1 <span class="text-danger">*</span></label>
                <div class="mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="emergency" value="Emergency"
                            name="admission_type_1" {{ old('admission_type_1') == 'Emergency' ? 'checked' : '' }}>
                        <label class="form-check-label" for="emergency">Emergency</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="planned" value="Planned"
                            name="admission_type_1" {{ old('admission_type_1') == 'Planned' ? 'checked' : '' }}>
                        <label class="form-check-label" for="planned">Planned</label>
                    </div>
                </div>
                @error('admission_type_1')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="admission_type_2">Admission Type - 2 <span class="text-danger">*</span></label>
                <div class="mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="day_care" value="Day Care"
                            name="admission_type_2" {{ old('admission_type_2') == 'Day Care' ? 'checked' : '' }}>
                        <label class="form-check-label" for="day_care">Day Care</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="hospitalization" value="Hospitalization"
                            name="admission_type_2" {{ old('admission_type_2') == 'Hospitalization' ? 'checked' : '' }}>
                        <label class="form-check-label" for="hospitalization">Hospitalization</label>
                    </div>
                </div>
                @error('admission_type_2')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="admission_type_3">Admission Type - 3 <span class="text-danger">*</span></label>
                <select class="form-select" id="admission_type_3" name="admission_type_3">
                    <option value="">Select</option>
                    <option value="Main" {{ old('admission_type_3') == 'Main' ? 'selected' : '' }}>Main
                    </option>
                    <option value="Pre-Post" {{ old('admission_type_3') == 'Pre-Post' ? 'selected' : '' }}>Pre-Post
                    </option>
                </select>
                @error('admission_type_3')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="claim_category">Claim Category <span class="text-danger">*</span></label>
                <select class="form-select" id="claim_category" name="claim_category">
                    <option value="">Select</option>
                    <option value="Cashless" {{ old('claim_category') == 'Cashless' ? 'selected' : '' }}>Cashless
                    </option>
                    <option value="Reimbursement" {{ old('claim_category') == 'Reimbursement' ? 'selected' : '' }}>
                        Reimbursement
                    </option>
                </select>
                @error('claim_category')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="treatment_category">Treatment Category <span class="text-danger">*</span></label>
                <select class="form-select" id="treatment_category" name="treatment_category">
                    <option value="">Select</option>
                    <option value="OPD" {{ old('treatment_category') == 'OPD' ? 'selected' : '' }}>OPD
                    </option>
                    <option value="IPD" {{ old('treatment_category') == 'IPD' ? 'selected' : '' }}>IPD
                    </option>
                </select>
                @error('treatment_category')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="disease_category">Disease Category <span class="text-danger">*</span></label>
                <select class="form-select" id="disease_category" name="disease_category">
                    <option value="">Select</option>
                    <option value="Cardiac" {{ old('disease_category') == 'Cardiac' ? 'selected' : '' }}>Cardiac
                    </option>
                    <option value="Dialysis" {{ old('disease_category') == 'Dialysis' ? 'selected' : '' }}>Dialysis
                    </option>
                    <option value="Eye Related" {{ old('disease_category') == 'Eye Related' ? 'selected' : '' }}>Eye
                        Related
                    </option>
                    <option value="Infection" {{ old('disease_category') == 'Infection' ? 'selected' : '' }}>Infection
                    </option>
                    <option value="Maternity" {{ old('disease_category') == 'Maternity' ? 'selected' : '' }}>
                        Maternity
                    </option>
                    <option value="Neuro Related" {{ old('disease_category') == 'Neuro Related' ? 'selected' : '' }}>
                        Neuro Related
                    </option>
                    <option value="Injury" {{ old('disease_category') == 'Injury' ? 'selected' : '' }}>Injury
                    </option>
                    <option value="Other" {{ old('disease_category') == 'Other' ? 'selected' : '' }}>Other
                    </option>
                </select>
                @error('disease_category')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="disease_name">Disease Name. <span class="text-danger">*</span></label>
                <input type="text" maxlength="45" class="form-control" id="disease_name" name="disease_name"
                    value="{{ old('disease_name') }}" placeholder="Disease Name">
                @error('disease_name')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="disease_type">Disease Type <span class="text-danger">*</span></label>
                <select class="form-select" id="disease_type" name="disease_type">
                    <option value="">Select</option>
                    <option value="PED (Pre Existing Disease)"
                        {{ old('disease_type') == 'PED (Pre Existing Disease)' ? 'selected' : '' }}>PED (Pre Existing
                        Disease)
                    </option>
                    <option value="Non PED" {{ old('disease_type') == 'Non PED' ? 'selected' : '' }}>Non PED
                    </option>
                </select>
                @error('disease_type')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mt-3">
                <label for="estimated_amount">Estimated Amount <span class="text-danger">*</span></label>
                <input type="text" maxlength="8" onkeypress="return isNumberKey(event)" class="form-control"
                    id="estimated_amount" placeholder="Estimated Amount" name="estimated_amount"
                    value="{{ old('estimated_amount') }}">
                @error('estimated_amount')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 mt-3">
                <label for="comments">Claim Intimation Comment </label>
                <textarea class="form-control" id="comments" name="comments" maxlength="250" placeholder="Comments"
                    rows="5">{{ old('comments') }}</textarea>
                @error('comments')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 text-end mt-3">
                <button type="submit" class="btn btn-success" form="claim-form">Create
                    Claim ID</button>
            </div>
        </div>
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        setPatient();
        setHospitalId();
        setInsuranceCoverageOptions();
    });

    function setPatient() {
        var title               = $("#patient_id").select2().find(":selected").data("title");
        var firstname           = $("#patient_id").select2().find(":selected").data("firstname");
        var middlename          = $("#patient_id").select2().find(":selected").data("middlename");
        var lastname            = $("#patient_id").select2().find(":selected").data("lastname");
        var age                 = $("#patient_id").select2().find(":selected").data("age");
        var gender              = $("#patient_id").select2().find(":selected").data("gender");
        var hospital            = $("#patient_id").select2().find(":selected").data("hospital");
        var registrationno      = $("#patient_id").select2().find(":selected").data("registrationno");


        $('#title').val(title);
        $('#firstname').val(firstname);
        $('#middlename').val(middlename);
        $('#lastname').val(lastname);
        $('#age').val(age);
        $('#gender').val(gender);
        $('#hospital_id').val(hospital).trigger('change');
        $('#registration_no').val(registrationno);
    }

    function setHospitalId() {
        var name = $("#hospital_id").select2().find(":selected").data("name");
        var address = $("#hospital_id").select2().find(":selected").data("address");
        var city = $("#hospital_id").select2().find(":selected").data("city");
        var state = $("#hospital_id").select2().find(":selected").data("state");
        var pincode = $("#hospital_id").select2().find(":selected").data("pincode");
        var associate_partner_id = $("#hospital_id").select2().find(":selected").data("ap");
        console.log(address);
        $('#hospital_name').val(name);
        $('#hospital_address').val(address);
        $('#hospital_city').val(city);
        $('#hospital_state').val(state);
        $('#hospital_pincode').val(pincode);
        $('#hospital_pincode').val(pincode);
        $('#associate_partner_id').val(associate_partner_id);
    }
</script>
<script>
    function setInsuranceCoverageOptions(){
        var insurance_coverage = $('#insurance_coverage').val();
        switch (insurance_coverage) {
                case 'Yes':
                    $("#policy_no").prop("readonly", false);
                    $("#company_tpa_id_card_no").prop("readonly", false);
                    break;
                case 'No':
                    $("#policy_no").prop("readonly", true);
                    $("#company_tpa_id_card_no").prop("readonly", true);
                    break;
                default:
                    $("#policy_no").prop("readonly", true);
                    $("#company_tpa_id_card_no").prop("readonly", true);
                    break;
            }
    }
</script>
@endpush
