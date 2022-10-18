<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Website App</title>
    <link rel="shortcut icon" href="{{ url('admin') }}/images/favicon.ico" />
    <link rel="stylesheet" href="{{ url('admin') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/typography.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/responsive.css">
</head>

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <section class="sign-in-page">
        <div class="container sign-in-page-bg mt-5 p-0">
            <div class="row no-gutters">
                <div class="col-md-6 text-center">
                    <div class="sign-in-detail text-white">
                        {{-- <a class="sign-in-logo mb-5" href="#"><img src="{{ url('admin') }}/images/logo-white.png" class="img-fluid"
                                alt="logo"></a> --}}
                        <br>
                        <br>
                        <br>
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false"
                            data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1"
                            data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="{{ url('admin') }}/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                            <div class="item">
                                <img src="{{ url('admin') }}/images/login/2.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                            <div class="item">
                                <img src="{{ url('admin') }}/images/login/3.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 position-relative">
                    <div class="sign-in-from">
                        <h1 class="mb-0">Sign in</h1>
                        <p>Masukkan alamat email dan kata sandi Anda untuk mengakses panel admin.</p>
                        @if (session()->has('danger'))
                            <div class="alert alert-danger mt-2">
                                {{ session('danger') }}
                            </div>
                        @endif
                        <form class="mt-4" action="{{ url('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username"
                                    class="form-control mb-0 @error('username') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <a href="#" class="float-right">Forgot password?</a>
                                <input type="password" name="password"
                                    class="form-control mb-0 @error('password') is-invalid @enderror"
                                    id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Sign in</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
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
    <!-- Chart Custom JavaScript -->
    <script src="{{ url('admin') }}/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ url('admin') }}/js/custom.js"></script>
</body>

</html>
