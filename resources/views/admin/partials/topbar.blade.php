<header class="admin-topbar bg-white shadow-sm border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <h2 class="h5 mb-0">@yield('pageHeader', 'Bảng điều khiển')</h2>
            <p class="small text-muted mb-0">@yield('pageSubheader', 'Tổng quan hệ thống Nuôi Em')</p>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-secondary btn-sm" id="darkModeToggle" type="button">
            <i class="fas fa-moon"></i>
        </button>

        <div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()?->name ?? 'Admin' }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="{{ route('home') }}">Xem trang</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
