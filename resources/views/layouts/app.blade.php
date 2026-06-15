<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NuoiEm') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                ❤️ Nuôi Em
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"
                 id="navbarNav">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('home') }}">
                            Trang chủ
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('children.index') }}">
                            Em nhỏ
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('campaigns.index') }}">
                            Chiến dịch
                        </a>
                    </li>

                    @auth
                        @if(Auth::user()->hasAnyRole(['super-admin', 'admin']))
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('admin.dashboard') }}">
                                    Admin
                                </a>
                            </li>
                        @endif
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">
                            Báo cáo
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">
                            Liên hệ
                        </a>
                    </li>

                </ul>

                <ul class="navbar-nav">

                    @guest

                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('login') }}">
                                Đăng nhập
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-warning ms-2"
                               href="{{ route('register') }}">
                                Đăng ký
                            </a>
                        </li>

                    @endguest

                    @auth

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown">

                                {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('admin.dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>

                                    <form action="{{ route('logout') }}"
                                          method="POST">

                                        @csrf

                                        <button class="dropdown-item">
                                            Đăng xuất
                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </li>

                    @endauth

                </ul>

            </div>

        </div>
    </nav>

    <!-- Header -->
    @isset($header)
        <div class="bg-white border-bottom py-3 mb-4">
            <div class="container">
                {{ $header }}
            </div>
        </div>
    @endisset

    <!-- Content -->
    <main class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{ $slot ?? '' }}

        @yield('content')

    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4 text-center">

            <h5>Dự án Nuôi Em</h5>

            <p class="mb-0">
                Chung tay hỗ trợ trẻ em vùng cao đến trường.
            </p>

            <small>
                © {{ date('Y') }} NuoiEm Project
            </small>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>