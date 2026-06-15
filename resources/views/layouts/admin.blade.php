<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'NuoiEm Admin') }} | @yield('title', 'Bảng điều khiển')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="admin-shell bg-light">
    <div class="admin-sidebar bg-white shadow-sm" id="adminSidebar">
        @include('admin.partials.sidebar')
    </div>

    <div class="admin-page">
        @include('admin.partials.topbar')

        <main class="admin-content py-4">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="admin-footer text-muted text-center py-3">
            <small>© {{ date('Y') }} Nuôi Em — Hệ thống quản trị thiện nguyện</small>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const adminSidebar = document.getElementById('adminSidebar');
            const body = document.body;
            const toggleDark = document.getElementById('darkModeToggle');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function () {
                    adminSidebar.classList.toggle('collapsed');
                });
            }

            if (toggleDark) {
                const currentMode = localStorage.getItem('nuoiem-theme');
                if (currentMode === 'dark') {
                    body.classList.add('dark-theme');
                }
                toggleDark.addEventListener('click', function () {
                    const enabled = body.classList.toggle('dark-theme');
                    localStorage.setItem('nuoiem-theme', enabled ? 'dark' : 'light');
                });
            }

            document.querySelectorAll('.datatable').forEach(function (table) {
                $(table).DataTable({
                    pageLength: 15,
                    responsive: true,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/vi.json'
                    }
                });
            });

            document.querySelectorAll('button[data-swal-confirm]').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const form = button.closest('form');
                    Swal.fire({
                        title: 'Bạn có chắc?',
                        text: button.dataset.swalConfirm,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Xác nhận',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed && form) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
