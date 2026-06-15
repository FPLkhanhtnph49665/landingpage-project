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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-light">

<div class="container">

    <div class="row justify-content-center min-vh-100 align-items-center">

        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">

                <a href="{{ url('/') }}"
                   class="text-decoration-none">

                    <h1 class="fw-bold text-success">
                        ❤️ Nuôi Em
                    </h1>

                </a>

                <p class="text-muted">
                    Chung tay hỗ trợ trẻ em vùng cao
                </p>

            </div>

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    {{ $slot }}

                </div>

            </div>

            <div class="text-center mt-3">

                <a href="{{ url('/') }}"
                   class="text-decoration-none">

                    ← Quay về trang chủ

                </a>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>