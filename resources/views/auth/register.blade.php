@extends('layouts.master')

@section('title')
    Register
@stop

@section('body')

    <h2>Registration</h2><br>
    <form method='POST' action='/register'>
        {{ csrf_field() }}

        <table class='centered_table bold'>
            <tr>
                <td class='right_justify'>
                    <label for='name'>Name:</label>
                </td>
                <td class='left_justify'>
                    <input id='name' class='input' type='text' name='name' value='{{ old('name') }}' autofocus>
                </td>
            </tr>
            @if ($errors->has('name'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('name') }}</td></tr>
            @endif

            <tr>
                <td class='right_justify'>
                    <label for='username'>Username:</label>
                </td>
                <td class='left_justify'>
                    <input id='username' class='input' type='text' name='username' value='{{ old('username') }}'>
                </td>
            </tr>
            @if ($errors->has('username'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('username') }}</td></tr>
            @endif

            <tr>
                <td class='right_justify'>
                    <label for='email'>E-Mail Address:</label>
                </td>
                <td class='left_justify'>
                    <input id='email' class='input' type='text' name='email' value='{{ old('email') }}'>
                </td>
            </tr>
            @if ($errors->has('email'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('email') }}</td></tr>
            @endif

            <tr>
                <td class='right_justify'>
                    <label for='password'>Password:</label>
                </td>
                <td class='left_justify'>
                    <input id='password' class='input' type='password' name='password'>
                </td>
            </tr>
            @if ($errors->has('password'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('password') }}</td></tr>
            @endif

            <tr>
                <td class='right_justify'>
                    <label for='password_confirmation'>Confirm Password:</label>
                </td>
                <td class='left_justify'>
                    <input id='password_confirmation' class='input' type='password' name='password_confirmation'>
                </td>
            </tr>
        </table><br>

        <input type='submit' class='button' value='Register'>

    </form>

@endsection
