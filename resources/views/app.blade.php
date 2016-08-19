<!DOCTYPE html>
<html>
<head>
    <title>{{ $site_title }}</title>
</head>
<body>
    <header>
        页头
    </header>

    @yield('content')

    <footer>
        页脚
    </footer>

    @include('foo.bar.ad2')
</body>
</html>