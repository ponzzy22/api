<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Website App</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('admin') }}/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('admin') }}/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ url('admin') }}/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('admin') }}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('admin') }}/css/responsive.css">
    <!-- Full calendar -->
    <link href='{{ url('admin') }}/fullcalendar/core/main.css' rel='stylesheet' />
    <link href='{{ url('admin') }}/fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='{{ url('admin') }}/fullcalendar/timegrid/main.css' rel='stylesheet' />
    <link href='{{ url('admin') }}/fullcalendar/list/main.css' rel='stylesheet' />

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>XRay - Responsive Bootstrap 4 Admin Dashboard Template</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url('admin') }}/images/favicon.ico" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('admin') }}/css/bootstrap.min.css">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ url('admin') }}/css/typography.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ url('admin') }}/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ url('admin') }}/css/responsive.css">
        <!-- Full calendar -->
        <link href='{{ url('admin') }}/fullcalendar/core/main.css' rel='stylesheet' />
        <link href='{{ url('admin') }}/fullcalendar/daygrid/main.css' rel='stylesheet' />
        <link href='{{ url('admin') }}/fullcalendar/timegrid/main.css' rel='stylesheet' />
        <link href='{{ url('admin') }}/fullcalendar/list/main.css' rel='stylesheet' />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        @stack('style')

    </head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">

        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('template.section.sidebar')

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <!-- TOP Nav Bar -->
            @include('template.section.header')
            <!-- TOP Nav Bar END -->
            <div class="container-fluid">
                @include('template.utils.notif')
                @yield('content')

            </div>
            <!-- Footer -->
            {{-- @include('template.section.footer') --}}
            <!-- Footer END -->
        </div>
    </div>
    <!-- Wrapper END -->

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('admin') }}/js/jquery.min.js"></script>
    <script src="{{ url('admin') }}/js/popper.min.js"></script>
    <script src="{{ url('admin') }}/js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="{{ url('admin') }}/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ url('admin') }}/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ url('admin') }}/js/waypoints.min.js"></script>
    <script src="{{ url('admin') }}/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="{{ url('admin') }}/js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ url('admin') }}/js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="{{ url('admin') }}/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ url('admin') }}/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ url('admin') }}/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ url('admin') }}/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ url('admin') }}/js/smooth-scrollbar.js"></script>
    <!-- lottie JavaScript -->
    <script src="{{ url('admin') }}/js/lottie.js"></script>
    <!-- am core JavaScript -->
    <script src="{{ url('admin') }}/js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="{{ url('admin') }}/js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="{{ url('admin') }}/js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ url('admin') }}/js/kelly.js"></script>
    <!-- Flatpicker Js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ url('admin') }}/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ url('admin') }}/js/custom.js"></script>

    @stack('script')
</body>

</html>
