<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','Gifter')
    </title>

    <meta charset='utf-8'>
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>

    @yield('head')

</head>
<body>

    <header>
        <a href='/'>
        <img src='/images/logo.png' alt='Gifter Logo' class='logo'>
        </a>
    </header>

    @yield('body')

</body>
</html>
