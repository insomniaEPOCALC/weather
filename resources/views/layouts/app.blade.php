<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('style')
    @yield('icon')
    @yield('script')

</head>
@if(isset($info))
    @if($info === 'sunny')
        <body class=' flex items-center justify-center body sunny'>
            <div class='block'>
                @yield('content')
            </div>
        </body>
    @elseif ($info === 'rainy')
        <body class=' flex items-center justify-center body rainy'>
            <div class='block'>
                @yield('content')
            </div>
        </body>
    @elseif ($info === 'cloudy')
        <body class=' flex items-center justify-center body cloudy'>
            <div class='block'>
                @yield('content')
            </div>
        </body>
    @elseif ($info === 'snowy')
        <body class=' flex items-center justify-center body snowy'>
            <div class='block'>
                @yield('content')
            </div>
        </body>
    @elseif ($info === 'sunnyNight')
        <body class=' flex items-center justify-center body night'>
            <div class='block'>
                @yield('content')
            </div>
        </body>
    @endif
@else
    <body class=' flex items-center justify-center body'>
        <div class='block'>
            @yield('content')
        </div>
    </body>
@endif

</html>
