<!DOCTYPE html>
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Admin</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dashboard-dist/dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6"
                    src="{{ asset('dashboard-dist/dist/images/logo.svg') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="javascript:;.html" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Overview <i data-feather="chevron-down"
                            class="menu__sub-icon transform rotate-180"></i> </div>
                </a>
                <ul class="menu__sub-open">
                    <li>
                        <a href="index.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Overview 1 </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Overview 2 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Overview 3 </div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu__devider my-6"></li>

        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <i style="color: white" data-feather="bar-chart"></i>
                <span class="hidden xl:block text-white text-lg ml-3"> Sales Tracker </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Overview </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.teams') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Teams </div>
                    </a>
                </li>

                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="{{ route('admin.users') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                        <div class="side-menu__title">
                            Users
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.goals') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                        <div class="side-menu__title">
                            Goals
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        @yield('content')
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('dashboard-dist/dist/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
           
            $('#myTable').DataTable({
                paging: false,
                "bInfo": false
            });
        });
    </script>
</body>

</html>
