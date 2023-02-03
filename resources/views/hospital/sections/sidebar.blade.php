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
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#hospitalModule" aria-expanded="false" aria-controls="hospitalModule" class="side-nav-link">
                    <i class="mdi mdi-hospital-building"></i>
                    <span> Hospital </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="hospitalModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('hospital.hospitals.index') }}">Manage Hospital</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#claims" aria-expanded="false" aria-controls="claims"
                    class="side-nav-link">
                    <i class="mdi mdi-doctor"></i>
                    <span> Claims </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="claims">
                    <ul class="side-nav-second-level">
                        <li>
                            <a onclick="return false;" href="{{ route('admin.patients.index') }}">Patients</a>
                        </li>
                        <li>
                            <a onclick="return false;" href="{{ route('admin.claims.index') }}">Claims</a>
                        </li>
                          <li>
                            <a onclick="return false;" href="{{ route('admin.claims.index') }}">Claimants</a>
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
