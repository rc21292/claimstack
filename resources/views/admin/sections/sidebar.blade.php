<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logos/logo-dark.png') }}" alt="" height="46">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logos/logo_sm.png') }}" alt="" height="46">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logos/logo-dark.png') }}" alt="" height="46">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logos/logo_sm.png') }}" alt="" height="46">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#adminMenu" aria-expanded="false" aria-controls="adminMenu"
                    class="side-nav-link">
                    <i class="mdi mdi-shield-account"></i>
                    <span> Admin </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="adminMenu">
                    <ul class="side-nav-second-level">
                        @if(auth()->check() && auth()->user()->hasDirectPermission('Admin Creation Rights'))
                        <li>
                            <a href="{{ route('admin.admins.create') }}">Create Admin</a>
                        </li>
                        @endif

                        @if(auth()->check() && auth()->user()->hasDirectPermission('Admin Updation/Editing Rights'))
                        <li>
                            <a href="{{ route('admin.admins.index') }}">Manage Admin</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.admins.import-export') }}">Import Export Admin</a>
                        </li>
                        @endif

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#userMenu" aria-expanded="false" aria-controls="userMenu"
                    class="side-nav-link">
                    <i class="mdi mdi-account"></i>
                    <span> User </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="userMenu">
                    <ul class="side-nav-second-level">
                        @if(auth()->check() && auth()->user()->hasDirectPermission('User Creation Rights'))
                        <li>
                            <a href="{{ route('admin.users.create') }}">Create User</a>
                        </li>
                        @endif
                        @if(auth()->check() && auth()->user()->hasDirectPermission('User Updation/Editing Rights'))
                        <li>
                            <a href="{{ route('admin.users.index') }}">Manage User</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.import-export') }}">Import Export Users</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#associatePartner" aria-expanded="false"
                    aria-controls="associatePartner" class="side-nav-link">
                    <i class="mdi mdi-account-group"></i>
                    <span> Associate Partner </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="associatePartner">
                    <ul class="side-nav-second-level">
                        @if(auth()->check() && auth()->user()->hasDirectPermission('Associate Partner Login ID Creation Rights'))
                        <li>
                            <a href="{{ route('admin.associate-partners.create') }}">Create Associate Partner</a>
                        </li>
                        @endif
                        @if(auth()->check() && auth()->user()->hasDirectPermission('Associate Partner Updation/Editing Rights'))
                        <li>
                            <a href="{{ route('admin.associate-partners.index') }}">Manage Associate Partner</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.associate-partners.import-export') }}">Import Export Associate
                                Partner</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#hospitalModule" aria-expanded="false" aria-controls="hospitalModule"
                    class="side-nav-link">
                    <i class="mdi mdi-hospital-building"></i>
                    <span> Hospital </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="hospitalModule">
                    <ul class="side-nav-second-level">
                        @if(auth()->check() && auth()->user()->hasDirectPermission('Hospital Login ID Creation Rights'))
                        <li>
                            <a href="{{ route('admin.hospitals.create') }}">Create Hospital ID</a>
                        </li>
                        @endif
                        @if(auth()->check() && auth()->user()->hasDirectPermission('Hospital Details Updation/Editing Rights'))
                        <li>
                            <a href="{{ route('admin.hospitals.index') }}">Manage Hospital Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.hospitals.import-export') }}">Import Export Hospitals</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#claims" aria-expanded="false" aria-controls="claims" class="side-nav-link collapsed">
                    <i class="mdi mdi-doctor"></i>
                    <span> Claims </span>
                    <span class="menu-arrow"></span>
                </a>
                @if(auth()->check() && auth()->user()->hasDirectPermission('Claims Module Creation/Editing Rights'))
                <div class="collapse" id="claims" style="">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#patients" aria-expanded="true" aria-controls="patients" class="">
                                <span> Patients </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse show" id="patients" style="">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.patients.create') }}">Create Patient</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.patients.index') }}">Manage Patient</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#claims-management" aria-expanded="true" aria-controls="claims-management" class="">
                                <span> Claims </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse show" id="claims-management" style="">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.claims.create') }}">Create Claim</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.claims.index') }}">Manage Claims</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#claimant-management" aria-expanded="true" aria-controls="claimant-management" class="">
                                <span> Claimants </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse show" id="claimant-management" style="">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.claimants.create') }}">Create Claimant</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.claimants.index') }}">Manage Claimants</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#insurer" aria-expanded="false" aria-controls="insurer"
                    class="side-nav-link">
                    <i class="dripicons-heart"></i>
                    <span> Insurer </span>
                    <span class="menu-arrow"></span>
                </a>
                @if(auth()->check() && auth()->user()->hasDirectPermission('Insurance Co. Module Creation/Editing Rights'))
                <div class="collapse" id="insurer">
                    <ul class="side-nav-second-level">
                        @if(auth()->check() && auth()->user()->hasDirectPermission('Insurance Co. Login ID Creation Rights'))
                        <li>
                            <a href="javascript:Void(0)">Create Insurer</a>
                        </li>
                        @endif
                        <li>
                            <a href="javascript:Void(0)">Manage Insurer</a>
                        </li>
                    </ul>
                </div>
                @endif
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#tpa" aria-expanded="false" aria-controls="tpa"
                    class="side-nav-link">
                    <i class="mdi mdi-doctor"></i>
                    <span> TPA </span>
                    <span class="menu-arrow"></span>
                </a>
                @if(auth()->check() && auth()->user()->hasDirectPermission('TPA Module Creation/Editing Rights'))
                <div class="collapse" id="tpa">
                    <ul class="side-nav-second-level">
                        @if(auth()->check() && auth()->user()->hasDirectPermission('TPA Login ID Creation Rights'))
                        <li>
                            <a href="javascript:Void(0)">Create TPA</a>
                        </li>
                        @endif
                        <li>
                            <a href="javascript:Void(0)">Manage TPA</a>
                        </li>
                    </ul>
                </div>
                @endif
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#authorization" aria-expanded="false"
                    aria-controls="authorization" class="side-nav-link">
                    <i class="uil-shield-check"></i>
                    <span> Authorization </span>
                    <span class="menu-arrow"></span>
                </a>
                @if(auth()->check() && auth()->user()->hasDirectPermission('Authorization Module Creation/Editing Rights'))
                <div class="collapse" id="authorization">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="javascript:Void(0)">Hospital Authorization</a>
                        </li>
                        <li>
                            <a href="javascript:Void(0)">Associate Partner Authorization</a>
                        </li>
                    </ul>
                </div>
                @endif
            </li>
            @if(auth()->check() && auth()->user()->hasDirectPermission('File Management Module Creation/Editing Rights'))
            <li class="side-nav-item">
                <a href="javascript:Void(0)" class="side-nav-link">
                    <i class="uil-folder-medical"></i>
                    <span> File Management </span>
                </a>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasDirectPermission('Bill Generation Module Creation/Editing Rights'))
            <li class="side-nav-item">
                <a href="javascript:Void(0)" class="side-nav-link">
                    <i class="uil-graph-bar"></i>
                    <span> Report Generation </span>
                </a>
            </li>
            @endif

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings"
                    class="side-nav-link">
                    <i class="dripicons-gear"></i>
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="side-nav-second-level">
                        {{-- <li>
                            <a href="{{ route('admin.password.form') }}">Change Password</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('admin.my-account.edit', Auth::guard('admin')->id()) }}">My Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- Help Box -->
        <div class="help-box text-white text-center">
            <a href="{{ route('admin.logout') }}" class="btn btn-outline-light btn-sm"
                onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">Logout</a>
            <form id="sidebar-logout-form"
                action="{{ 'App\Models\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('admin.logout') }}"
                method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
