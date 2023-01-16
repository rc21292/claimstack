<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="{{ route('hospital.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logos/logo-dark.png') }}" alt="" height="46">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logos/logo_sm.png') }}" alt="" height="46">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('hospital.dashboard') }}" class="logo text-center logo-dark">
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
                <a href="{{ route('hospital.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashbaord </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#adminMenu" aria-expanded="false" aria-controls="adminMenu" class="side-nav-link">
                    <i class="mdi mdi-shield-account"></i>                   
                    <span> Admin </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="adminMenu">
                    <ul class="side-nav-second-level">
                       
                        <li>
                            <a href="{{ route('hospital.admins.create') }}">Create Admin</a>
                        </li>
                       
                        <li>
                            <a href="{{ route('hospital.admins.index') }}">Manage Admin</a>
                        </li>  

                        <li>
                            <a href="{{ route('hospital.admins.import-export') }}">Import Export Admin</a>
                        </li>  

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#userMenu" aria-expanded="false" aria-controls="userMenu" class="side-nav-link">
                    <i class="mdi mdi-account"></i>                   
                    <span> User </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="userMenu">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('hospital.users.create') }}">Create User</a>
                        </li>
                        <li>
                            <a href="{{ route('hospital.users.index') }}">Manage User</a>
                        </li> 
                        <li>
                            <a href="{{ route('hospital.users.import-export') }}">Import Export Users</a>
                        </li>                       
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#associatePartner" aria-expanded="false" aria-controls="associatePartner" class="side-nav-link">
                    <i class="mdi mdi-account-group"></i>                   
                    <span> Associate Partner </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="associatePartner">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('hospital.associate-partners.create') }}">Create Associate Partner</a>
                        </li>
                        <li>
                            <a href="{{ route('hospital.associate-partners.index') }}">Manage Associate Partner</a>
                        </li>  
                        <li>
                            <a href="{{ route('hospital.associate-partners.import-export') }}">Import Export Associate Partner</a>
                        </li>                       
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings" class="side-nav-link">
                    <i class="dripicons-gear"></i>                   
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('hospital.password.form') }}">Change Password</a>
                        </li>
                        <li>
                            <a href="{{ route('hospital.my-account.edit', Auth::guard('hospital')->id()) }}">My Profile</a>
                        </li>                       
                    </ul>
                </div>
            </li>               
        </ul>

        <!-- Help Box -->
        <div class="help-box text-white text-center">
            <a  href="{{ route('hospital.logout') }}" class="btn btn-outline-light btn-sm"
            onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">Logout</a>
            <form id="sidebar-logout-form" action="{{ 'App\Models\Hospital' == Auth::getProvider()->getModel() ? route('hospital.logout') : route('hospital.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>