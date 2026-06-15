<div class="sidebar-brand p-4 border-bottom">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
        <div class="me-3 text-success fs-3"><i class="fas fa-hands-heart"></i></div>
        <div>
            <div class="fw-bold">Nuôi Em Admin</div>
            <small class="text-muted">Hệ thống thiện nguyện</small>
        </div>
    </a>
</div>

<nav class="nav flex-column px-3 py-4">
    <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-chart-pie me-2"></i> Dashboard
    </a>
    <a href="{{ route('admin.campaigns.index') }}" class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('admin.campaigns.*') ? 'active' : '' }}">
        <i class="fas fa-bullhorn me-2"></i> Quản lý chiến dịch
    </a>
    <a href="{{ route('admin.children.index') }}" class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('admin.children.*') ? 'active' : '' }}">
        <i class="fas fa-child me-2"></i> Quản lý em nhỏ
    </a>
    <a href="{{ route('admin.donations.index') }}" class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">
        <i class="fas fa-hand-holding-heart me-2"></i> Quản lý ủng hộ
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-gift me-2"></i> Quản lý nhà hảo tâm
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-hands-helping me-2"></i> Quản lý tình nguyện viên
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-newspaper me-2"></i> Quản lý bài viết
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-photo-video me-2"></i> Quản lý thư viện ảnh
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-file-alt me-2"></i> Quản lý báo cáo
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-envelope me-2"></i> Quản lý liên hệ
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-users me-2"></i> Quản lý người dùng
    </a>
    <a href="#" class="nav-link d-flex align-items-center mb-2">
        <i class="fas fa-cog me-2"></i> Cài đặt hệ thống
    </a>
</nav>

<div class="sidebar-footer mt-auto px-4 py-3 border-top">
    <small class="text-muted">Phiên: {{ Auth::user()?->name ?? 'Quản trị viên' }}</small>
</div>
