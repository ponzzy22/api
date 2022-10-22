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
                <div class="iq-sidebar">
                    <div class="iq-sidebar-logo d-flex justify-content-between">
                        <a href="index.html">
                            <img src="images/logo.png" class="img-fluid" alt="">
                            <span>Website</span>
                        </a>
                        <div class="iq-menu-bt-sidebar">
                            <div class="iq-menu-bt align-self-center">
                                <div class="wrapper-menu">
                                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-scrollbar">
                        <nav class="iq-sidebar-menu">
                            <ul id="iq-sidebar-toggle" class="iq-menu">
                                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>

                                <li class="">
                                    <a href="{{ url('dashboard') }}" class="iq-waves-effect"><i
                                        class="ri-home-8-fill"></i><span>
                                        Dashboard</span></a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('master.index') }}" class="iq-waves-effect"><i
                                            class="ri-home-8-fill"></i><span>
                                            Master</span></a>
                                        </li>

                                        {{-- Master --}}

                                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Menu </span></li>
                                        <li>
                                            <a href="#mailbox" class="iq-waves-effect collapsed" data-toggle="collapse"
                                            aria-expanded="false"><i class="ri-mail-open-fill"></i><span>Master</span><i
                                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                            <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                                <li><a href="{{ route('generate.index') }}"><i class="ri-inbox-fill"></i>Generate
                                                Token</a></li>
                                                <li><a href="{{ route('web.index') }}"><i class="ri-edit-2-fill"></i>Daftar Website</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                                <div class="p-3"></div>
                            </div>
                        </div>


                        <!-- Page Content  -->
                        <div id="content-page" class="content-page">
                            <!-- TOP Nav Bar -->
                            @include('template.section.header')
                            <!-- TOP Nav Bar END -->
                            <div class="container-fluid">
                                @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                                @endforeach
                                @endif

                                @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session('success') }}
                                </div>
                                @endif

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
