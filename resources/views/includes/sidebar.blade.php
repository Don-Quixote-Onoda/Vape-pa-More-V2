<div>
  <div class="wrapper">


      <!-- ====================================
        ——— LEFT SIDEBAR WITH OUT FOOTER
      ===================================== -->
      <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
              <!-- Aplication Brand -->
              <div class="app-brand">
                  <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                      <img src="{{ asset('images/logo.png') }}" alt="Vape Pa More">
                      <span class="brand-name">Vape Pa More</span>
                  </a>
              </div>
              <!-- begin sidebar scrollbar -->
              <div class="sidebar-left" data-simplebar style="height: 100%;">
                  <!-- sidebar menu -->
                  <ul class="nav sidebar-inner" id="sidebar-menu">

                      {{-- Dashboard link --}}
                      <li class="{{ (request()->is('admin/dashboard')) ? 'active' : ''}}">
                          <a class="sidenav-item-link" href="{{route('admin.dashboard')}}" >
                              <i class="mdi mdi-briefcase-account-outline"></i>
                              <span class="nav-text">Dashboard</span>
                          </a>


                      {{-- Orders  --}}
                      <li class="{{ (request()->is('admin/orders')) ? 'active' : ''}}">
                          <a class="sidenav-item-link" href="{{route('admin-orders')}}" >
                              <i class="mdi mdi-basket"></i>
                              <span class="nav-text">Orders </span>
                          </a>
                      </li>

                      {{-- Orders Details  --}}
                      <li class="{{ (request()->is('admin/order-details')) ? 'active' : ''}}">
                          <a class="sidenav-item-link" href="{{route('admin-order-details')}}" >
                              <i class="mdi mdi-basket-fill"></i>
                              <span class="nav-text">Order Details </span>
                          </a>
                      </li>

                      {{-- Payment  --}}
                      <li class="{{ (request()->is('admin/payments')) ? 'active' : ''}}">
                          <a class="sidenav-item-link" href="{{route('admin-payments')}}" >
                              <i class="mdi mdi-cash-multiple"></i>
                              <span class="nav-text">Payments </span>
                          </a>
                      </li>

                      {{-- Products  --}}
                      <li class="{{ (request()->is('admin/products')) ? 'active' : ''}}">
                          <a class="sidenav-item-link" href="{{route('admin-products')}}">
                              <i class="mdi mdi-package-variant-closed"></i>
                              <span class="nav-text">Products </span>
                          </a>
                      </li>

                      <li class="{{ (request()->is('admin/product-types')) ? 'active' : ''}}">
                          <a class="sidenav-item-link" href="{{route('admin-product-types')}}" >
                              <i class="mdi mdi-format-list-bulleted-type"></i>
                              <span class="nav-text">Product Types </span>
                          </a>
                      </li>


                      <li class="has-sub">
                          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                              data-target="#account_settings" aria-expanded="false" aria-controls="account_settings">
                              <i class="mdi mdi-account"></i>
                              <span class="nav-text">Account Settings</span> <b class="caret"></b>
                          </a>
                          <ul class="collapse" id="account_settings" data-parent="#sidebar-menu">
                              <div class="sub-menu">
                                  <li>
                                      <a class="sidenav-item-link" href="user-profile.html">
                                          <span class="nav-text">User Profile</span>

                                      </a>
                                  </li>

                                  <li>
                                      <a class="sidenav-item-link" href="user-activities.html">
                                          <span class="nav-text">User Activities</span>

                                      </a>
                                  </li>

                                  <li>
                                      <a class="sidenav-item-link" href="user-profile-settings.html">
                                          <span class="nav-text">Change Password</span>

                                      </a>
                                  </li>
                              </div>
                          </ul>
                      </li>
                  </ul>

              </div>

              <div class="sidebar-footer">
                  <div class="sidebar-footer-content">

                  </div>
              </div>
          </div>
      </aside>




      <!-- ====================================
    ——— PAGE WRAPPER
    ===================================== -->
      <div class="page-wrapper">

          @include('includes.header')

          <!-- ====================================
      ——— CONTENT WRAPPER
      ===================================== -->
          <div class="content-wrapper">
              <div class="content">
                  @yield('content')                  
              </div>

          </div>

          <!-- Footer -->
          <footer class="footer mt-auto">
              <div class="copyright bg-white">
                  <p>
                      &copy; <span id="copy-year"></span> Copyright VapePaMore.
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

</div>
