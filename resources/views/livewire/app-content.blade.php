<div>
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('admin-assets/images/logo.png') }}" alt="Vape Pa More">
                        <span class="brand-name">Vape Pa More</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
    
                        {{-- Dashboard link --}}
                        <li class="{{ Request::route()->getName() == 'admin.dashboard' ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('dashboard')">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
    
                            {{-- Inventory Controls  --}}
                        <li>
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('inventory')">
                                <i class="mdi mdi-note-text"></i>
                                <span class="nav-text">Inventory </span>
                            </a>
                        </li>
                        {{-- @if (auth()->user()->role == 1)
                <li class="{{ Request::route()->getName() == 'admin-inventory_controls' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('admin-inventory_controls') }}">
                        <i class="mdi mdi-note-text"></i>
                        <span class="nav-text">Inventory </span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 2)
                <li class="{{ Request::route()->getName() == 'admin-inventory_controls' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/employee/users">
                        <i class="mdi mdi-note-text"></i>
                        <span class="nav-text">Inventory </span>
                    </a>
                </li>
            @else
                <li class="{{ Request::route()->getName() == 'admin-inventory_controls' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/customer/users">
                        <i class="mdi mdi-note-text"></i>
                        <span class="nav-text">Inventory </span>
                    </a>
                </li>
                @endif --}}
    
                        {{-- Orders  --}}
                        <li>
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('orders')">
                                <i class="mdi mdi-basket"></i>
                                <span class="nav-text">Orders </span>
                            </a>
                        </li>
                        {{-- @if (auth()->user()->role == 1)
                <li class="{{ Request::route()->getName() == 'admin-orders' ? 'active' : '' }}">
                   <a class="sidenav-item-link" href="{{ route('admin-orders') }}">
                       <i class="mdi mdi-basket"></i>
                       <span class="nav-text">Orders </span>
                   </a>
               </li>
            @elseif(auth()->user()->role == 2)
                <li class="{{ Request::route()->getName() == 'admin-orders' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/employee/users">
                        <i class="mdi mdi-basket"></i>
                        <span class="nav-text">Orders </span>
                    </a>
                </li>
            @else
                <li class="{{ Request::route()->getName() == 'admin-orders' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/customer/users">
                        <i class="mdi mdi-basket"></i>
                        <span class="nav-text">Orders </span>
                    </a>
                </li>
                @endif --}}
    
                        {{-- Orders Details  --}}
                        <li>
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('order-details')">
                                <i class="mdi mdi-basket-fill"></i>
                                <span class="nav-text">Order Details </span>
                            </a>
                        </li>
                        {{-- @if (auth()->user()->role == 1)
                <li class="{{ Request::route()->getName() == 'admin-order_details' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('admin-order_details') }}">
                        <i class="mdi mdi-basket-fill"></i>
                        <span class="nav-text">Order Details </span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 2)
                <li class="{{ Request::route()->getName() == 'admin-order_details' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/employee/users">
                        <i class="mdi mdi-basket-fill"></i>
                        <span class="nav-text">Order Details </span>
                    </a>
                </li>
            @else
                <li class="{{ Request::route()->getName() == 'admin-order_details' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/customer/users">
                        <i class="mdi mdi-basket-fill"></i>
                        <span class="nav-text">Order Details </span>
                    </a>
                </li>
                @endif --}}
    
                        {{-- Customers  --}}
                        <li>
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('customers')">
                                <i class="mdi mdi-file-account"></i>
                                <span class="nav-text">Customers </span>
                            </a>
                        </li>
                        {{-- @if (auth()->user()->role == 1)
                <li class="{{ Request::route()->getName() == 'admin-customers' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('admin-customers') }}">
                        <i class="mdi mdi-file-account"></i>
                        <span class="nav-text">Customers </span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 2)
                <li class="{{ Request::route()->getName() == 'admin-customers' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/employee/users">
                        <i class="mdi mdi-file-account"></i>
                        <span class="nav-text">Customers </span>
                    </a>
                </li>
            @else
                <li class="{{ Request::route()->getName() == 'admin-customers' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/customer/users">
                        <i class="mdi mdi-file-account"></i>
                        <span class="nav-text">Customers </span>
                    </a>
                </li>
                @endif --}}
    
                        {{-- Payment  --}}
                        <li>
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('payments')">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="nav-text">Payments </span>
                            </a>
                        </li>
    
                        {{-- @if (auth()->user()->role == 1)
                <li class="{{ Request::route()->getName() == 'admin-payments' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('admin-payments') }}">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span class="nav-text">Payments </span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 2)
                <li class="{{ Request::route()->getName() == 'admin-payments' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/employee/users">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span class="nav-text">Payments </span>
                    </a>
                </li>
            @else
                <li class="{{ Request::route()->getName() == 'admin-payments' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/customer/users">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span class="nav-text">Payments </span>
                    </a>
                </li>
                @endif --}}
    
                        {{-- Products  --}}
                        <li>
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('products')">
                                <i class="mdi mdi-package-variant-closed"></i>
                                <span class="nav-text">Products </span>
                            </a>
                        </li>
    
                        {{-- @if (auth()->user()->role == 1)
                <li class="{{ Request::route()->getName() == 'admin-products' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('admin-products') }}">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span class="nav-text">Products </span>
                    </a>
                </li>
            @elseif(auth()->user()->role == 2)
                <li class="{{ Request::route()->getName() == 'admin-products' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/employee/users">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span class="nav-text">Products </span>
                    </a>
                </li>
            @else
                <li class="{{ Request::route()->getName() == 'admin-products' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/customer/users">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span class="nav-text">Products </span>
                    </a>
                </li>
                @endif --}}
    
                        {{-- Users  --}}
    
                        {{-- @if (auth()->user()->role == 1)
                    <li class="{{ Request::route()->getName() == 'admin-user' ? 'active' : '' }}">
                        <a class="sidenav-item-link" href="{{ route('admin-user') }}">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users </span>
                        </a>
                    </li>
                @elseif(auth()->user()->role == 2)
                    <li class="{{ Request::route()->getName() == 'admin-user' ? 'active' : '' }}">
                        <a class="sidenav-item-link" href="/employee/users">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users </span>
                        </a>
                    </li>
                @else
                    <li class="{{ Request::route()->getName() == 'admin-user' ? 'active' : '' }}">
                        <a class="sidenav-item-link" href="/customer/users">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users </span>
                        </a>
                    </li>
                @endif --}}
    
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

                    @if($navigation == 'inventory')
                        <livewire:inventory-component />
                    @endif

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
                        <livewire:payment-component />
                    @endif

                    @if($navigation == 'products')
                        <livewire:products-component />
                    @endif
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
    
</div>