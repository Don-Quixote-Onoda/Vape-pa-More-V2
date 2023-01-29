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
                    
                </nav>


            </header>


            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content d-flex flex-column justify-content-center" style="height: 90vh">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8 ">
                            <div class="card card-default mb-0 shadow bg-body-tertiary rounded">
                                <div class="card-header pb-0">
                                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                        <a class="w-auto pl-0" href="/index.html">
                                            <img src="{{ asset('admin-assets/images/logo.png') }}" alt="Mono">
                                            <span class="brand-name text-dark">Vape Pa More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body px-5 pb-5 pt-0">

                                    <h4 class="text-dark mb-6 text-center">Vape Pa More Inventory System</h4>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 mb-4">
                                                
                                                <input type="email"
                                                    class="form-control input-lg @error('email') is-invalid @enderror"
                                                    id="email" aria-describedby="emailHelp" placeholder="email"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>
                                               
                                            </div>
                                            <div class="form-group col-md-12 ">
                                                <input type="password" name="password"
                                                    class="form-control input-lg @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" required
                                                    autocomplete="current-password">
                                                    @if (session()->has('error'))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{session('error')}}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                            <div class="col-md-12">

                                                <div class="d-flex justify-content-between mb-3">
                                                    
                                                    <div class="custom-control custom-checkbox mr-3 mb-3">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck2">
                                                        <label class="custom-control-label"
                                                            for="customCheck2">Remember
                                                            me</label>
                                                    </div>

                                                    <a class="text-color" href="#"> Forgot password? </a>

                                                </div>

                                                
                                                <button type="submit" class="btn btn-primary btn-pill mb-4">Sign
                                                    In</button>

                                                {{-- <p>Don't have an account yet ?
                                            @guest
                                                    @if (Route::has('register'))
                                                            <a class="text-blue" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    @endif
                                                @endguest
                                          </p> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> 
                       
                        Copyright VapePaMore.
                    </p>
                </div>
                <script>
                    toastr.success(response.message, "Success!");
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

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
