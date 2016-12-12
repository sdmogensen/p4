@extends('layouts.master')

@section('body')
    <a class='small' href='{{ url('/register') }}'>
        New user? Register here.
    </a>
    <br><br><br><h2>Welcome to the Gifter App!</h2><br>

    <form method='POST' action='{{ url('/login') }}'>

        {{ csrf_field() }}

        <label>Email:
            <input type='text' name='email' value='{{ old('email','jill@harvard.edu') }}' required autofocus>
        </label><br>
        @if ($errors->has('email'))
            <div class='error'>{{ $errors->first('email') }}</div>
        @endif

        <label>Password:
            <input type='password' name='password' value='helloworld' required>
        </label><br>
        @if ($errors->has('password'))
            <div class='error'>{{ $errors->first('password') }}</div>
        @endif

        <!-- <label class='checkbox'><input type='checkbox' name='remember'> Remember Me</label><br> -->

        <br><button class='button' type='submit'>Login</button><br>

        <!-- <a class='smaller' href='{{ url('/password/reset') }}'>
            Forgot Your Password?
        </a> -->

    </form>

@endsection
