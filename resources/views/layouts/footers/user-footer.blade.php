<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-xl-6">
            <div class="copyright text-center text-lg-left text-muted">
                &copy; {{ now()->year }} <a href="#" class="font-weight-bold ml-1" target="_blank">Booker</a> 
            </div>
        </div>
        <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item"><a href="{{ route('user/dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('user.products.index') }}" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="{{ route('user.services.index') }}" class="nav-link">Services</a></li>
            </ul>
        </div>
    </div>
</footer>