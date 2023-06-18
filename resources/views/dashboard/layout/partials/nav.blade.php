<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">
                <i class="bi bi-house"></i>
                Dashboard
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashborad/wisata') }}">
                <i class="bi bi-clipboard-data"></i>
                Data Tempat Wisata
            </a>
            </li>
            <hr>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="bi bi-person"></i>
                        {{ auth()->user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/logout') }}">
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                </li>
            @endif
            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/login') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        Login
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>