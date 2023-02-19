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
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - User</title>
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
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                <span class="xl:block text-white text-lg ml-3">
                    Sales Tracker
                </span>
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">

            <li>
                <a href="{{ route('user.dashboard') }}" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> Overview </div>
                </a>
            </li>

            <li class="menu__devider my-6"></li>
            <li>
                <a href=" " class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title">
                        @if (isset(Auth::user()->team) != null)
                            Team: {{ Auth::user()->team->name }}
                        @else
                            Team: N/A
                        @endif
                    </div>
                </a>
            </li>
            <li>
                <a href="side-menu-dark-inbox.html" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> My Team </div>
                </a>
            </li>
            <li>
                <a href="{{ route('user.activities') }}" class="menu">
                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="menu__title"> Activities </div>
                </a>
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
                    <span href="{{ route('user.dashboard') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title">
                            @if (isset(Auth::user()->team) != null)
                                Team: {{ Auth::user()->team->name }}
                            @else
                                Team: N/A
                            @endif
                        </div>
                    </span>
                </li>
                <li>
                    <a href="{{ route('user.dashboard') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Overview </div>
                    </a>
                </li>
                {{-- <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> My Team </div>
                    </a>
                </li> --}}

                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="{{ route('user.activities') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Activities </div>
                    </a>
                </li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.6/gauge.min.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
    <script>
        $(document).ready(function() {

            $('#myTable').DataTable({
                paging: false,
                "bInfo": false
            });
        });
    </script>

    <script>
        var calls = <?php if (isset($cardInfo['goals'])) {
            echo json_encode($cardInfo['goals']);
        } ?>;
        var fupCalls = <?php if (isset($cardInfo['fupEntryData'])) {
            echo json_encode($cardInfo['fupEntryData']);
        } ?>;
        var recentGoal = <?php if (isset($cardInfo['recentGoal'])) {
            echo json_encode($cardInfo['recentGoal']);
        } ?>;
        var callsEachDay = <?php if (isset($cardInfo['callsEachDay'])) {
            echo json_encode($cardInfo['callsEachDay']);
        } ?>;
        var callsDates = <?php if (isset($cardInfo['callsDates'])) {
            echo json_encode($cardInfo['callsDates']);
        } ?>;
        var appointmentsFixedEachDay = <?php if (isset($cardInfo['appointmentsFixed'])) {
            echo json_encode($cardInfo['appointmentsFixed']);
        } else {
            echo 0;
        } ?>;
        var pitchesDates = <?php if (isset($cardInfo['pitchesDates'])) {
            echo json_encode($cardInfo['pitchesDates']);
        } ?>;
        var pitchesEachDay = <?php if (isset($cardInfo['pitchesEachDay'])) {
            echo json_encode($cardInfo['pitchesEachDay']);
        } ?>;
        var orgRchEachDay = <?php if (isset($cardInfo['organizationsReachedEachDay'])) {
            echo json_encode($cardInfo['organizationsReachedEachDay']);
        } ?>;
        var goalsIDs = <?php if (isset($cardInfo['goalIDs'])) {
            echo json_encode($cardInfo['goalIDs']);
        } ?>;
        var goalsData = <?php if (isset($cardInfo['goals'])) {
            echo json_encode($cardInfo['goals']);
        } ?>;
        var goalsOnly = <?php if (isset($cardInfo['goalsOnly'])) {
            echo json_encode($cardInfo['goalsOnly']);
        } else {
            echo 'false';
        } ?>;
    </script>

    <script src="{{ asset('dashboard-dist/dist/js/daily-average-entry-gauge.js') }}"></script>
    <script src="{{ asset('dashboard-dist/dist/js/daily-appointments-fixed-chart.js') }}"></script>
    <script src="{{ asset('dashboard-dist/dist/js/daily-average-organizations-gauge.js') }}"></script>
    <script src="{{ asset('dashboard-dist/dist/js/calls-gauge.js') }}"></script>


</body>

</html>
