<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="{{ route('associate-partner.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            {{-- <img src="assets/images/logo.png" alt="" height="16"> --}}
            <h1 class="text-white">Claim Stack</h1>
        </span>
        <span class="logo-sm">
            <h1 class="text-white">Claim Stack</h1>
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('associate-partner.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            {{-- <img src="assets/images/logo-dark.png" alt="" height="16"> --}}
            <h1 class="text-primary">Claim Stack</h1>
        </span>
        <span class="logo-sm">
            {{-- <img src="assets/images/logo_sm_dark.png" alt="" height="16"> --}}
            <h1 class="text-primary">Claim Stack</h1>
        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-item">
                <a href="{{ route('associate-partner.dashboard') }}" class="side-nav-link">
                    <i class="uil-desktop"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="mdi mdi-tools"></i>
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('associate-partner.password.form') }}">Change Password</a>
                    </li>
                    <li>
                        <a href="{{ route('associate-partner.my-account.edit', Auth::guard('associate')->id()) }}">My Profile</a>
                    </li>
                </ul>
            </li>

        </ul>

        <!-- Help Box -->
        <div class="help-box text-white text-center">
            <a  href="{{ route('associate-partner.logout') }}" class="btn btn-outline-light btn-sm"
            onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">Logout</a>
            <form id="sidebar-logout-form" action="{{ 'App\Models\AssociatePartner' == Auth::getProvider()->getModel() ? route('associate-partner.logout') : route('associate-partner.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
