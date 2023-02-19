    @extends('layouts.super-admin')
    @section('title', 'Create Patient ID')
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
                            <li class="breadcrumb-item active">Bill Entry</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Bill Entry</h4>
                </div>
            </div>
        </div>
        @include('super-admin.sections.flash-message')

        <div class="row">
            <div class="col-12">
                <div class="card no-shadow">
                    <div class="card-body">
                        <form action="{{ route('super-admin.bill-entries.update', $bill_entry->id) }}" method="post" id="hospital-form"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <h4 class="header-title">Room Rent</h4>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.room-rent')

                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h4 class="header-title">Administration Charges</h4>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.administration-charges')
                                  
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <h4 class="header-title">Medical Practitioner’s Fees</h4>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.medical_practitioners_fees')

                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        <h4 class="header-title">Pharmacy Charges</h4>
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.pharmacy_charges')
                                    
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        <h5 class="header-title">Diagnostic Charges</h5>
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.diagnostic_charges')
                                    
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                        <h6 class="header-title">Other Charges</h6>
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.other_charges')
                                    
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                        <h5 class="header-title">Implants for Surgical Procedures</h5>
                                    </button>
                                </h2>
                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.implants_for_surgical_procedures')
                                    
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        <h5 class="header-title">Ambulance Charges</h5>
                                    </button>
                                </h2>
                                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.ambulance_charges')
                                    
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        <h5 class="header-title">Other Consumable Items</h5>
                                    </button>
                                </h2>
                                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.other_consumable_items')
                                    
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading10">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        <h5 class="header-title">Registration/ Admission Charges</h5>
                                    </button>
                                </h2>
                                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.registration_admission_charges')
                                    
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading11">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                        <h5 class="header-title">Package Charges</h5>
                                    </button>
                                </h2>
                                <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.package_charges')
                                    
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading12">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                        <h5 class="header-title">OPD Charges</h5>
                                    </button>
                                </h2>
                                <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.opd_charges')
                                    
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                        <h5 class="header-title">Total Bill</h5>
                                    </button>
                                </h2>
                                <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample">
                                    
                                    @include('super-admin.claims.edit.tabs.bill-entry-tabs.total_bill')
                                    
                                </div>
                            </div>                           

                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-success" form="hospital-form">Update
                                Bill Entry</button>
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

        function datediff(first, second) {        
            return Math.round((second - first) / (1000 * 60 * 60 * 24));
        }

        function parseDate(str) {
            return new Date(str);
        }

        $(document).on('change', "input[type='date']", function() {
            var id_attr = $(this).attr('id');
            if(id_attr.includes('_to')){
                var ret = id_attr.replace('_to','_from');
                var ret1 = id_attr.replace('_to','_total_days');
                var from = $("#"+ret).val();
                var to = $(this).val();

                /*if (to < from){
                    $(this).parent('div').append('to date is always grater than start date!')
                }else{
                    
                }*/

                $("#"+ret1).val(datediff(parseDate(from), parseDate(to)));
            }
        });


        $(document).on('keyup', "input[type='number']", function() {
            var id_attr = $(this).attr('id');
            if(id_attr.includes('_amount')){
                var ret = id_attr.replace('_amount','_total_days');
                var ret1 = id_attr.replace('_amount','_total_amount');
                var days = $("#"+ret).val();
                var amount = $(this).val();
                $("#"+ret1).val(parseFloat(amount) * parseFloat(days));
            }
        });

    </script>
    @endpush
