<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('t_admin/assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('t_admin/assets/css/pages/auth.css') }}" />
    <link rel="shortcut icon" href="{{ asset('t_admin/assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('t_admin/assets/images/logo/favicon.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('css/haudy.css') }}">

</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {{-- <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('t_admin/assets/images/logo/logo.svg') }}"
                                alt="Logo" /></a>
                    </div> --}}
                    <h1 class="auth-title">Back-end</h1>
                    {{-- <p class="auth-subtitle mb-5">
                        Log in with your data that you entered during
                        registration.
                    </p> --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $err }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <form action="/admin/auth/login" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email"
                                name="email" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">

                        <p>
                            <a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img src="{{ asset('image/a1.png') }}" alt="" class="w-100">
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>
