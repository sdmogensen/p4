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

    @if(Session::get('flash_message') != null)
        <div class='flash_message'>{{ Session::get('flash_message') }}
        @if(Session::get('purchase_undo_link') != null)
            <form method='POST' action='/wishlists/{{ $username }}/purchased' class='inline'>
                {{ csrf_field() }}
                <input type='hidden' name='gift_id' value='{{ Session::get('purchase_undo_link') }}'>
                <input type='submit' class='link_button' value='Undo.'>
            </form>
        @endif
        </div>
    @endif

    <header>
        <a href='/'>
        <img src='/images/logo.png' alt='Gifter Logo' class='logo'>
        </a>
    </header>


    @if(Auth::check())
        <nav>
            <a href='/gifts/index'>My List</a>&nbsp;
            <a href='/gifts/add'>Add Gift</a>&nbsp;
            <a href='/logout'>Logout</a>
        </nav>
    @endif

    <section>
        @yield('body')
    </section>

</body>
</html>
