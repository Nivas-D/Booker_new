<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('user/dashboard') }}">
                <img src="{{ asset('images/booker-logo.png') }}" class="navbar-brand-img" alt="Booker Logo">
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user/dashboard') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'products' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.products.index') }}">
                            <i class="ni ni-books text-primary"></i>
                            <span class="nav-link-text">{{ __('Products') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'services' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.services.index') }}">
                            <i class="ni ni-ungroup text-primary"></i>
                            <span class="nav-link-text">{{ __('Services') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'product-orders' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.product.orders') }}">
                            <i class="ni ni-books text-primary"></i>
                            <span class="nav-link-text">{{ __('Product Orders') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'service-bookings' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.service.bookings') }}">
                            <i class="ni ni-ungroup text-primary"></i>
                            <span class="nav-link-text">{{ __('Service Bookings') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>