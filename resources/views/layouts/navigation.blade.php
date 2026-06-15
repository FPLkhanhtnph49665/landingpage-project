<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold"
           href="{{ route('home') }}">
            ❤️ Nuôi Em
        </a>

        <!-- Mobile Button -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <!-- Left Menu -->
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

            <!-- Right Menu -->
            <ul class="navbar-nav">

                @guest

                    <li class="nav-item">

                        <a href="{{ route('login') }}"
                           class="nav-link">

                            Đăng nhập

                        </a>

                    </li>

                    @if(Route::has('register'))

                        <li class="nav-item">

                            <a href="{{ route('register') }}"
                               class="btn btn-warning ms-2">

                                Đăng ký

                            </a>

                        </li>

                    @endif

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

                                <a class="dropdown-item"
                                   href="{{ route('profile.edit') }}">

                                    Hồ sơ

                                </a>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form action="{{ route('logout') }}"
                                      method="POST">

                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item">

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