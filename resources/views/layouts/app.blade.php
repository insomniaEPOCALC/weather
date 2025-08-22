<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @yield('style')
        @yield('script')
    <head>
    <body>
        <div>
            @yield('content')
        </div>
    </body>
</html>
