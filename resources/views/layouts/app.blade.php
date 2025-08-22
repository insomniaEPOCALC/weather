<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('style')
    @yield('script')

    <head>

    <body class=' flex items-center justify-center'>
        <div class='block'>
            @yield('content')
        </div>
    </body>

</html>
