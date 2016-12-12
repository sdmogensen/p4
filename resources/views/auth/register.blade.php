@extends('layouts.master')

@section('body')
    <br><h2>Registration</h2><br>
        <form method='POST' action='{{ url('/register') }}'>
            {{ csrf_field() }}

            <label>Name:
                <input type='text' name='name' value='{{ old('name','steve') }}' required autofocus>
            </label><br>
            @if ($errors->has('name'))
                <div class='error'>{{ $errors->first('name') }}</div>
            @endif

            <label>Username:
                <input type='text' name='username' value='{{ old('username','sdm') }}' required>
            </label><br>
            @if ($errors->has('username'))
                <div class='error'>{{ $errors->first('username') }}</div>
            @endif

            <label>E-Mail Address:
                <input type='text' name='email' value='{{ old('email','steve@steve.com') }}' required>
            </label><br>
            @if ($errors->has('email'))
                <div class='error'>{{ $errors->first('email') }}</div>
            @endif

            <label>Password:
                <input type='password' name='password' required value='helloo'>
            </label><br>
            @if ($errors->has('password'))
                <div class='error'>{{ $errors->first('password') }}</div>
            @endif

            <label>Confirm Password:
                <input type='password' name='password_confirmation' required value='helloo'>
            </label><br><br>

            <button class='button'>Register</button>

@endsection
