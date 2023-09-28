<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/booker-logo.png') }}" class="navbar-brand-img" alt="Booker Logo">
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">


                    @if(Auth::user()->can('admin_dashboard'))
                    <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin/dashboard') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item {{ $parentSection == 'categories' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="ni ni ni-ui-04 text-primary"></i>
                            <span class="nav-link-text">{{ __('Categories') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'industries' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('industries.index') }}">
                            <i class="ni ni-box-2 text-primary"></i>
                            <span class="nav-link-text">{{ __('Industries') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'business' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.business.index') }}">
                            <i class="ni ni-building text-primary"></i>
                            <span class="nav-link-text">{{ __('Business') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'products' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="ni ni-books text-primary"></i>
                            <span class="nav-link-text">{{ __('Products') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'inventory' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <i class="ni ni ni-ui-04 text-primary"></i>
                            <span class="nav-link-text">{{ __(' Product Inventory') }}</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item {{ $parentSection == 'services' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('services.index') }}">
                            <i class="ni ni-ungroup text-primary"></i>
                            <span class="nav-link-text">{{ __('Services') }}</span>
                        </a>
                    </li> -->

                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class=" list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <i class="ni ni-ungroup text-primary"></i>
                            <span class="fa fa-dashboard fa-fw mr-2"></span> 

                            <span class="menu-collapsed"><span class="nav-link-text" style="color: #717171;">Services</span></span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    @php 
                    $categories = DB::table('categories')->orderBy('name', 'asc')->get();
                    @endphp
                    <div id='submenu1' class="collapse sidebar-submenu">
                        @foreach($categories as $category)
                        <a href="{{ route('admin.service.category',['id'=>$category->id]) }}" class="list-group-item list-group-item-action  text-black" style="padding-left: 50px;"> 
                            <span class="menu-collapsed" style="color: #6e6ecf;"">{{$category->name}}</span>
                        </a>
                        @endforeach
                    </div>


                    <li class="nav-item {{ $parentSection == 'product-orders' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.product.orders') }}">
                            <i class="ni ni-books text-primary"></i>
                            <span class="nav-link-text">{{ __('Product Orders') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'service-bookings' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.service.bookings') }}">
                            <i class="ni ni-ungroup text-primary"></i>
                            <span class="nav-link-text">{{ __('Service Bookings') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'employees' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('employees.index') }}">
                            <i class="ni ni-circle-08 text-primary"></i>
                            <span class="nav-link-text">{{ __('Employees') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'freelancers' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('freelancers.index') }}">
                            <i class="ni ni-glasses-2 text-primary"></i>
                            <span class="nav-link-text">{{ __('Freelancers') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'plans' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('plans.index') }}">
                            <i class="ni ni-air-baloon text-primary"></i>
                            <span class="nav-link-text">{{ __('Subscription Plans') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'contact-messages' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.contactmessages') }}">
                            <i class="ni ni-email-83 text-primary"></i>
                            <span class="nav-link-text">{{ __('Contact Messages') }}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ $parentSection == 'roles' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            <i class="ni ni-email-83 text-primary"></i>
                            <span class="nav-link-text">{{ __('Manage Role') }}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ $parentSection == 'pemission' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('permissions.index') }}">
                            <i class="ni ni-email-83 text-primary"></i>
                            <span class="nav-link-text">{{ __('Manage Permission') }}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ $parentSection == 'languages' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('languages.index') }}">
                            <i class="ni ni-email-83 text-primary"></i>
                            <span class="nav-link-text">{{ __('Translation') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
