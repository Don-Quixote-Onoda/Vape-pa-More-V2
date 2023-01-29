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
                        <img src="{{ asset('admin-assets/images/logo.png') }}" alt="Vape Pa More">
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
                        <li class="{{($navigation=='products')? 'active' : ''}}">
                            <a class="sidenav-item-link" href="" wire:click.prevent="showNav('products')">
                                <i class="mdi mdi-package-variant-closed"></i>
                                <span class="nav-text">Products </span>
                            </a>
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
                        <livewire:employee-dashboard-component />
                    @endif

                    @if($navigation == 'orders')
                        <livewire:employee-orders-component />
                    @endif

                    @if($navigation == 'products')
                        <livewire:employee-products-component />
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