<div class="row">
    <div class="col-12">
        <div class="card no-shadow">
            <div class="card-body p-0" >
                <div class="" style="background:#3E4097">
                    <div class="d-flex align-items-center mb-2" >
                        <div class="flex-shrink-0">
                            <div class="avatar-md" style="margin-top: 10px;margin-left:20px ;">
                                <span class="avatar-title bg-success  rounded-circle"style="background: white;">
                                    AP
                                </span>
                            </div>

                        </div>
                        <div class="d-flex flex-row align-items-center m-2 text-white">
                            <p class="mb-0 me-2">{{$associate->name }}<br> Associate Partner Status | UID</p>
                        </div>                        
                    </div>
                    <div class="col-12 nav nav-tabs" id="myTab" >
                        <a class="text-white px-2 active" href="#home" c data-bs-toggle="tab">Documents</a>
                        <a class="text-white px-2" href="#profile" data-bs-toggle="tab">MOU</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><a target="_blank" href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->panfile) }}" >Associate Partner Pan Number</a></td>
                                            <td><a {{-- href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->panfile) }}" --}} download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                        </tr>
                                        <tr>
                                            <td><a target="_blank" href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->cancel_cheque_file) }}" >Cancel Cheque</a></td>
                                            <td><a {{-- href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->cancel_cheque_file) }}" --}} download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                        </tr>                  
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><a target="_blank" href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->moufile) }}">MOU</a></td>
                                            <td><a {{-- href="{{ asset('storage/uploads/associate-partners/'.$associate->id.'/'.$associate->moufile) }}" --}} download class=" download-label"><i class="mdi mdi-download"></i></a></td>

                                        </tr>                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
