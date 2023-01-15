<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Mono - Responsive Admin & Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('admin-assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin-assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}" />

    <!-- FAVICON -->
    <link href="'{{ asset('admin-assets/images/favicon.png') }}" rel="icon" />
    <script src="{{ asset('admin-assets/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper p-0">

            <!-- Header -->
            <header class="main-header p-0" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>


                    @if (\Request::route()->getName() == 'admin.dashboard')
                        <span class="page-title">Admin Dashboard</span>
                    @endif
                    @if (\Request::route()->getName() == 'admin-user')
                        <span class="page-title">User Management</span>
                    @endif




                    <div class="navbar-right ">

                        <!-- search form -->
                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group input-group-sm" id="input-group-search">
                                    <input type="text" autocomplete="off" name="query" id="search-input"
                                        class="form-control" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn" type="button">/</button>
                                    </div>
                                </div>
                            </form>
                            <ul class="dropdown-menu dropdown-menu-search">

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Morbi leo risus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Vestibulum at eros</a>
                                </li>

                            </ul>

                        </div>

                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <span class="d-none d-lg-inline-block">John Doe</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="user-profile.html">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-logout"></i> Log Out </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>


            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content d-flex flex-column justify-content-center" style="height:110vh">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="card card-default mb-0 shadow bg-body-tertiary rounded">
                                    {{-- <div class="card-header pb-0">
                                        <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                            <a class="w-auto pl-0" href="/index.html">
                                                <img src="{{ asset('admin-assets/images/logo.png') }}"
                                                    alt="Mono">
                                                <span class="brand-name text-dark">Vape Pa More</span>
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="step-1">
                                        <div class="card-body px-5 py-5 pt-0">

                                            {{-- <h4 class="text-dark mb-6 text-center">Vape Pa More Inventory System</h4> --}}


                                            <div class="row">
                                                <div class="form-group col-md-12 mb-4">
                                                    <input type="text"
                                                        class="form-control input-lg @error('firstname') is-invalid @enderror"
                                                        name="firstname" value="{{ old('firstname') }}" required
                                                        autocomplete="name" autofocus placeholder="First Name">
                                                    @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 mb-4">
                                                    <input type="text"
                                                        class="form-control input-lg @error('lastname') is-invalid @enderror"
                                                        name="lastname" value="{{ old('lastname') }}" required
                                                        autocomplete="name" autofocus placeholder="Last Name">
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 mb-4">
                                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                        <input type="radio" id="customRadio1" name="sex"
                                                            value="1" {{ old('role') == 1 ? 'checked' : '' }}
                                                            class="custom-control-input @error('sex') is-invalid @enderror"
                                                            checked required>
                                                        <label class="custom-control-label"
                                                            for="customRadio1">Male</label>
                                                        @error('sex')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                        <input type="radio" id="customRadio2" name="sex"
                                                            value="2"
                                                            class="custom-control-input @error('sex') is-invalid @enderror"
                                                            required {{ old('sex') == 2 ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="customRadio2">Female</label>
                                                        @error('sex')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 mb-4">
                                                    <!-- Date Input -->
                                                    <label class="text-dark font-weight-medium" for="">Birth
                                                        Date</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-calendar"
                                                                id="basic-addon1"></span>
                                                        </div>
                                                        <input type="date"
                                                            class="form-control @error('birthdate') is-invalid @enderror"
                                                            value="{{ old('birthdate') }}" name="birthdate"
                                                            data-mask="00/00/0000" required>
                                                        @error('birthdate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 mb-4">
                                                    <!-- Phone input -->
                                                    <label class="text-dark font-weight-medium">Phone Number</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-phone"
                                                                id="basic-addon1"></span>
                                                        </div>
                                                        <input type="number" name="phone_number"
                                                            class="form-control @error('phone_number') is-invalid @enderror"
                                                            value="{{ old('phone_number') }}"
                                                            data-mask="(999) 999-9999">
                                                        @error('phone_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-secondary float-right next-form">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-2" style="display: none">
                                        <div class="card-body px-5 py-5 pt-0">

                                            {{-- <h4 class="text-dark mb-6 text-center">Vape Pa More Inventory System</h4> --}}


                                            <div class="row">
                                                <div class="form-group col-md-12 mb-4">
                                                    <!-- Phone input -->
                                                    <label class="text-dark font-weight-medium">Address</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="address"
                                                            class="form-control @error('address') is-invalid @enderror"
                                                            value="{{ old('address') }}" data-mask="(999) 999-9999">
                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 mb-4">
                                                    <label for="exampleFormControlSelect12">User Role</label>
                                                    <select class="form-control" name="role"
                                                        id="exampleFormControlSelect12" required>
                                                        <option value="" selected>Select User Role</option>
                                                        <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>
                                                            Administrator</option>
                                                        <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>
                                                            Employee</option>
                                                        <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>
                                                            Customer</option>
                                                    </select>
                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 mb-4">
                                                    <input type="email"
                                                        class="form-control input-lg @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" name="email" required
                                                        autocomplete="email" placeholder="Email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 ">
                                                    <input type="password"
                                                        class="form-control input-lg @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password"
                                                        placeholder="Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 ">
                                                    <input type="password" class="form-control input-lg" id="cpassword"
                                                        name="password_confirmation" required autocomplete="new-password"
                                                        placeholder="Confirm Password">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex justify-content-between mb-3">
                                                
                                                        <div class="custom-control custom-checkbox mr-3 mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2">I Agree
                                                                the
                                                                terms and conditions.</label>
                                                        </div>
                                                
                                                    </div>
                                                
                                                    <button type="button" class="btn btn-secondary float-left mb-4 previous-form">Back</button>
                                                    <button type="submit" class="btn btn-primary float-right mb-4">{{ __('Sign Up') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

    <!-- Card Offcanvas -->
    <div class="card card-offcanvas" id="contact-off">
        <div class="card-header">
            <h2>Contacts</h2>
            <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
        </div>
        <div class="card-body">

            <div class="mb-4">
                <input type="text" class="form-control form-control-lg form-control-secondary rounded-0"
                    placeholder="Search contacts...">
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('admin-assets/images/user/user-sm-01.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span class="discribe">Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('admin-assets/images/user/user-sm-02.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Walter Reuter</span>
                        <span>Developer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('admin-assets/images/user/user-sm-03.jpg') }}" alt="User Image">
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Larissa Gebhardt</span>
                        <span>Cyber Punk</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('admin-assets/images/user/user-sm-04.jpg') }}" alt="User Image">
                    </a>

                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Albrecht Straub</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('admin-assets/images/user/user-sm-05.jpg') }}" alt="User Image">
                        <span class="active bg-danger"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Leopold Ebert</span>
                        <span>Fashion Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('admin-assets/images/user/user-sm-06.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

        </div>
    </div>


    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
            jQuery('.next-form').on('click', function() {
                jQuery('.step-1').css('display', 'none');
                jQuery('.step-2').css('display', 'block');
            });
            jQuery('.previous-form').on('click',function() {
                jQuery('.step-2').css('display', 'none');
                jQuery('.step-1').css('display', 'block');
            });
        });
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('admin-assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/mono.js') }}"></script>
    <script src="{{ asset('admin-assets/js/chart.js') }}"></script>
    <script src="{{ asset('admin-assets/js/map.js') }}"></script>
    <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
    <!--  -->


</body>

</html>
