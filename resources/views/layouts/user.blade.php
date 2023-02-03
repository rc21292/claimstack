<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Claim Stack" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css ') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css ') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-dark.min.css ') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        @include('user.sections.sidebar')

        <div class="content-page">
            <div class="content">
                @include('user.sections.navbar')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script>
        $('#linked_with_superadmin').change(function (e) { 
            e.preventDefault();
            switch (e.target.value) {
                case "yes":
                    $('.div_linked_employee').css('display', 'none');
                    break;
                
                case "no":
                    $('.div_linked_employee').css('display', 'block');
                    break;
            
                default:
                    $('.div_linked_employee').css('display', 'block');
                    break;
            }
            
        });
    </script>
    @stack('scripts')
</body>

</html>
