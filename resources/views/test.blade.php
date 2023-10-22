<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>MakeEvents Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

    <!-- jsvectormap css -->
    <link href="{{'admin/libs/jsvectormap/css/jsvectormap.min.css'}}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{'admin/libs/swiper/swiper-bundle.min.css'}}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{'admin/js/layout.js'}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{'admin/css/bootstrap.min.css'}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{'admin/css/icons.min.css'}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{'admin/css/app.min.css'}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{'admin/css/custom.min.css'}}" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="/administrator" class="d-inline-block auth-logo">
                                <img src="{{'admin/images/logo-light.png'}}" alt="" height="20">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back!</h5>
                                <p class="text-muted">Sign in to continue to MakeEvents.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

</div>

    <!-- JAVASCRIPT -->
    <script src="{{'admin/libs/bootstrap/js/bootstrap.bundle.min.js'}}"></script>
    <script src="{{'admin/libs/simplebar/simplebar.min.js'}}"></script>
    <script src="{{'admin/libs/node-waves/waves.min.js'}}"></script>
    <script src="{{'admin/libs/feather-icons/feather.min.js'}}"></script>
    <script src="{{'admin/js/pages/plugins/lord-icon-2.1.0.js'}}"></script>
    <script src="{{'admin/js/plugins.js'}}"></script>

    <!-- particles js -->
    <script src="{{'admin/libs/particles.js/particles.js'}}"></script>
    <!-- particles app js -->
    <script src="{{'admin/js/pages/particles.app.js'}}"></script>
    <!-- password-addon init -->
    <script src="{{'admin/js/pages/password-addon.init.js'}}"></script>
</body>

</html>