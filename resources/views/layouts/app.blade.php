<!DOCTYPE html>
<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    @auth
        Welcome {{ Auth::user()->name }}
    @endauth

    @guest
        Welcome guest
    @endguest

    @include('partials.nav')

    
    @yield('content')
</body>
</html>