<div class="footer navbar-footer">
    <!-- Centered Navbar and Copyright -->
    <nav class="footer navbar-expand-md navbar-light">
        <div class="container-fluid justify-content-center">
            <!-- Navigation Items Centered -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a href="{{ url('Welcome') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ url('info/terms') }}" class="nav-link">Terms</a></li>
                <li class="nav-item"><a href="{{ url('info/privacy') }}" class="nav-link">Privacy</a></li>
                <li class="nav-item"><a href="{{ url('reports/bug-reports') }}" class="nav-link">Bug Reports</a></li>
                <li class="nav-item"><a href="{{ url('credits') }}" class="nav-link">Credits</a></li>
            </ul>
        </div>
    </nav>

</div>
<!-- Centered Copyright Text -->
<div class="copyright text-center mt-2">
    &copy; {{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} v{{ config('lorekeeper.settings.version') }} {{ Carbon\Carbon::now()->year }}
</div>
