<div class="card-body">
    <form action="{{ route('user.hospitals.empanelment-status', $hospital->id) }}" method="post" id="hospital-empanelment-form"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">

            <div class="col-md-12">
                <button style="float:right;" type="button" class="btn btn-danger show-empanelment"> <i class="mdi mdi-plus"></i> Add Insurance Co. / TPA / Other </button>
            </div>


            <div class="col-md-12 show-hide-empanelment mt-3">
                <label for="company_name">Company Name<span class="text-danger">*</span></label>
                <select class="form-select" id="company_name" name="company_name">
                    <option value="">Select Company Name</option>
                    @foreach ($insurers as $insurer)
                    <option value="{{ $insurer->id }}" {{ old('company_name', $empanelment_status->company_name ?? '') == $insurer->id ? 'selected' : '' }}>{{ $insurer->name }}</option>
                    @endforeach
                </select>
                @error('company_name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="card-header bg-dark text-white mt-3 show-hide-empanelment"> Hospital Documents </div>

            <div class="col-md-6 show-hide-empanelment mt-3">
                <label for="empanelled">Empanelled<span class="text-danger">*</span></label>
                <select onchange="enableDisable()" class="form-select" id="empanelled" name="empanelled">
                    <option value="">Select Company Name</option>
                    <option value="Yes" {{ old('empanelled', $empanelment_status->empanelled ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ old('empanelled', $empanelment_status->empanelled ?? '') == 'No' ? 'selected' : '' }}>No</option>
                </select>
                @error('empanelled')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-6 show-hide-empanelment mt-3">
                <label for="hospital_id_as_per_the_selected_company">Hospital ID (as per the selected company) <span class="text-danger">*</span></label>
                <input type="text" maxlength="25" readonly class="form-control" id="hospital_id_as_per_the_selected_company" name="hospital_id_as_per_the_selected_company"
                placeholder="Enter Hospital ID" value="{{ old('hospital_id_as_per_the_selected_company', $empanelment_status->hospital_id_as_per_the_selected_company ?? '') }}">
                @error('hospital_id_as_per_the_selected_company')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 show-hide-empanelment mt-3">
                <label for="signed_mou">Signed MoU<span class="text-danger">*</span></label>
                <select disabled class="form-select" id="signed_mou" name="signed_mou">
                    <option value="">Select Signed MoU</option>
                    <option value="Yes" {{ old('signed_mou', $empanelment_status->signed_mou ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ old('signed_mou', $empanelment_status->signed_mou ?? '') == 'No' ? 'selected' : '' }}>No</option>
                </select>
                @error('signed_mou')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-6 show-hide-empanelment mt-3">
                <label for="agreed_packages_and_tariff_pdf_other_images">Agreed Packages and Tariff (PDF & Other Images)<span class="text-danger">*</span></label>
                <select disabled class="form-select" id="agreed_packages_and_tariff_pdf_other_images" name="agreed_packages_and_tariff_pdf_other_images">
                    <option value="">Select Agreed Packages and Tariff</option>
                    <option value="Yes" {{ old('agreed_packages_and_tariff_pdf_other_images', $empanelment_status->agreed_packages_and_tariff_pdf_other_images ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="As Per Hospital Tariff" {{ old('agreed_packages_and_tariff_pdf_other_images', $empanelment_status->agreed_packages_and_tariff_pdf_other_images ?? '') == 'As Per Hospital Tariff' ? 'selected' : '' }}>As Per Hospital Tariff</option>
                </select>
                @error('agreed_packages_and_tariff_pdf_other_images')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-12 show-hide-empanelment mt-3">
                <label for="agreed_packages_and_tariff_pdf_other_images">Upload - Packages and Tariff (Excel / CSV)<span class="text-danger">*</span></label>
                <select class="form-select" id="agreed_packages_and_tariff_pdf_other_images" name="agreed_packages_and_tariff_pdf_other_images">
                    <option value="">Select Upload - Packages and Tariff</option>
                    <option value="Yes" {{ old('agreed_packages_and_tariff_pdf_other_images', $empanelment_status->agreed_packages_and_tariff_pdf_other_images ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ old('agreed_packages_and_tariff_pdf_other_images', $empanelment_status->agreed_packages_and_tariff_pdf_other_images ?? '') == 'No' ? 'selected' : '' }}>No</option>
                </select>
                @error('agreed_packages_and_tariff_pdf_other_images')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>


            <input type="hidden" name="show_doctor" id="show-doctor-empanelment" value="0">

            <div class="col-md-12 show-hide-empanelment text-end mt-3">
                <button type="submit" class="btn btn-success" form="hospital-empanelment-form">Edit/Update - Packages and Tariff</button>
            </div>

            <div class="card-header bg-dark text-white mt-3 show-hide-empanelment"> Claim Form for Reimbursement </div>


            <div class="card-header bg-dark text-white mt-3 show-hide-empanelment"> Cashless Pre - Authorization Request Form</div>


            <div class="col-md-12 show-hide-empanelment mt-3">
                <label for="negative_listing_status">Negative Listing Status<span class="text-danger">*</span></label>
                <div class="input-group">
                    <select class="form-select" id="negative_listing_status" name="negative_listing_status">
                        <option value="">Select Negative Listing Status</option>
                        <option value="Yes" {{ old('negative_listing_status', $empanelment_status->negative_listing_status ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{ old('negative_listing_status', $empanelment_status->negative_listing_status ?? '') == 'No' ? 'selected' : '' }}>No</option>
                    </select>
                    <input type="file" name="negative_listing_status_file" @if($hospital_tie_ups->negative_listing_status == 'No') disabled @endif id="negative_listing_status_file" hidden />
                    <label for="negative_listing_status_file" class="btn btn-primary upload-label"><i
                        class="mdi mdi-upload"></i></label>
                    </div>
                    @error('negative_listing_status')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 show-hide-empanelment mt-3">
                    <label for="hospital_empanelment_status_comments">Hospital Empanelment Status Comments </label>
                    <textarea class="form-control" id="hospital_empanelment_status_comments" name="hospital_empanelment_status_comments" maxlength="250" placeholder="Comments" rows="4">{{ old('hospital_empanelment_status_comments', $hospital_tie_ups->hospital_empanelment_status_comments??'') }}</textarea>
                    @error('hospital_empanelment_status_comments')
                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-12 show-hide-empanelment text-end mt-3">
                <button type="submit" class="btn btn-success" form="hospital-empanelment-form">Save / Update </button>
            </div>


            </div>
        </form>
    </div>
@push('scripts')
    <script>
$(document).ready(function() {
    enableDisable();
  $(".show-hide-empanelment").hide();
    $("#show-doctor-empanelment").val(0);

  $('.show-empanelment').click(function() {
    $(".show-hide-empanelment").toggle('fast');
    $("#show-doctor-empanelment").val(1);
  });
});


function enableDisable() {
    if($("#empanelled").val() == 'Yes'){
        $("#hospital_id_as_per_the_selected_company").removeAttr('readonly');
        $("#signed_mou").removeAttr('disabled');
        $("#agreed_packages_and_tariff_pdf_other_images").removeAttr('disabled');
    }else{
       $("#hospital_id_as_per_the_selected_company").attr('readonly', true);
       $("#signed_mou").attr('disabled', true)
       $("#agreed_packages_and_tariff_pdf_other_images").attr('disabled', true)
   }
}

$('select').on('change', function(){
            var id = $(this).attr('id');
        if($(this).val() == 'No'){
            $("#"+id+"_file").attr('disabled',true);
        }else{
            $("#"+id+"_file").attr('disabled',false);
        }
    });
    </script>
@endpush
