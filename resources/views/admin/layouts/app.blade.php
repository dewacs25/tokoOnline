<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('t_admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('t_admin/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('t_admin/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('t_admin/assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('t_admin/assets/css/shared/iconly.css') }}">

</head>

<body>
    <div id="app">
        @include('admin.layouts.nav')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            
            <div class="page-content">
                @yield('content_admin')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('t_admin/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('t_admin/assets/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('t_admin/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('t_admin/assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
