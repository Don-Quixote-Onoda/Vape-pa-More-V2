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
                        <li class="{{($navigation=='dashboard')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('dashboard')">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>


                        {{-- Orders  --}}
                        <li class="{{($navigation=='orders')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('orders')">
                                <i class="mdi mdi-basket"></i>
                                <span class="nav-text">Orders </span>
                            </a>
                        </li>

                        {{-- Orders Details  --}}
                        <li class="{{($navigation=='order-details')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('order-details')">
                                <i class="mdi mdi-basket-fill"></i>
                                <span class="nav-text">Order Details </span>
                            </a>
                        </li>

                        {{-- Payment  --}}
                        <li class="{{($navigation=='payments')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('payments')">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="nav-text">Payments </span>
                            </a>
                        </li>

                        {{-- Products  --}}
                        <li class="{{($navigation=='products')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('products')">
                                <i class="mdi mdi-package-variant-closed"></i>
                                <span class="nav-text">Products </span>
                            </a>
                        </li>

                        <li class="{{($navigation=='product-types')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('product-types')">
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

                    @if($navigation == 'dashboard')
                        <livewire:dashboard-component />
                    @endif

                    {{-- @if($navigation == 'inventory')
                        <livewire:inventory-component />
                    @endif --}}

                    @if($navigation == 'orders')
                        <livewire:orders-component />
                    @endif

                    @if($navigation == 'order-details')
                        <livewire:order-details-component />
                    @endif

                    @if($navigation == 'customers')
                        <livewire:customers-component />
                    @endif

                    @if($navigation == 'payments')
                        <livewire:payments-component />
                    @endif

                    @if($navigation == 'products')
                        <livewire:products-component />
                    @endif

                    @if($navigation == 'product-types')
                        <livewire:product-types-component />
                    @endif
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
