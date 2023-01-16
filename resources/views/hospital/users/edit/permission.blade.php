<div class="accordion custom-accordion" id="custom-accordion-one">
    <div class="card mb-1">
        <div class="card-header" id="moduleCreation">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#moduleCreationTab"
                    aria-expanded="false" aria-controls="moduleCreationTab">Module Creation / Editing Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="moduleCreationTab" class="collapse"
            aria-labelledby="moduleCreation"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 10)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header" id="loginCreation">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#loginCreationTab"
                    aria-expanded="false" aria-controls="loginCreationTab">Login Creation Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="loginCreationTab" class="collapse"
            aria-labelledby="loginCreation"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    @if($loop->iteration < 11)
                        @continue
                    @endif
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 18)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header" id="updateEditing">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#updateEditingTab"
                    aria-expanded="false" aria-controls="updateEditingTab">Updation/ Editing Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="updateEditingTab" class="collapse"
            aria-labelledby="updateEditing"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    @if($loop->iteration < 19)
                        @continue
                    @endif
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 32)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header" id="claimProcessing">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#claimProcessingTab"
                    aria-expanded="false" aria-controls="claimProcessingTab">Claim Processing Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="claimProcessingTab" class="collapse"
            aria-labelledby="claimProcessing"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    @if($loop->iteration < 33)
                        @continue
                    @endif
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 37)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header" id="authorizationRights">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#authorizationRightsTab"
                    aria-expanded="false" aria-controls="authorizationRightsTab">Authorization Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="authorizationRightsTab" class="collapse"
            aria-labelledby="authorizationRights"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    @if($loop->iteration < 38)
                        @continue
                    @endif
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 46)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header" id="claimVerification">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#claimVerificationTab"
                    aria-expanded="false" aria-controls="claimVerificationTab">Claim Verification Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="claimVerificationTab" class="collapse"
            aria-labelledby="claimVerification"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    @if($loop->iteration < 47)
                        @continue
                    @endif
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 49)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        <div class="card-header" id="otherRights">
            <h5 class="m-0">
                <a class="custom-accordion-title collapsed d-block"
                    data-bs-toggle="collapse" href="#otherRightsTab"
                    aria-expanded="false" aria-controls="otherRightsTab">Other Rights
                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                </a>
            </h5>
        </div>
        <div id="otherRightsTab" class="collapse"
            aria-labelledby="otherRights"
            data-bs-parent="#custom-accordion-one">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($permissions as $permission)
                    @if($loop->iteration < 50)
                        @continue
                    @endif
                    <li class="list-group-item">
                        <input class="form-check-input me-1 float-end" name="permission[]" type="checkbox" {{ in_array($permission->name, $user->permissions) ? 'checked' : '' }} value="{{ $permission->name }}">
                        {{ $permission->name }}
                    </li>
                    @if($loop->iteration == 55)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>