<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>Dev</title>
    @livewireStyles
</head>
<body>

    @include('frontend.layouts.nav')
    
    <div class="container py-5">
        
        @yield('content')
        
    </div>
@livewireScripts
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>