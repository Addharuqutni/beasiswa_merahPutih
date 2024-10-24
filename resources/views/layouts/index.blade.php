<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Website Merah Putih - Beasiswa untuk Mahasiswa Indonesia">
    <title>@yield('title', 'Merah Putih')</title>
    <link rel="icon" type="image/ico" href="{{ asset('favicon.ico') }}" />
    <!-- Scripts and Styles -->
    @vite('resources/css/app.css')
    @stack('style')
</head>

<body>
    @include('layouts.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.footer')

    @stack('script')
</body>

</html>
