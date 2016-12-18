@extends('layouts.master')

@section('body')

    <a class='small' href='/register'>New user? Register here.</a>
    <br><br><h2>Welcome to the Gifter App!</h2><br>

    <form method='POST' action='/login'>
        {{ csrf_field() }}

        <table class='centered_table bold'>
            <tr>
                <th class='right_justify'>
                    <label for='username'>Username or Email:</label>
                </th>
                <td class='left_justify'>
                    <input id='username' class='input' type='text' name='username' value='{{ old('username') }}' autofocus>
                </td>
            </tr>
            @if ($errors->has('username'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('username') }}</td></tr>
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

        </table><br>

        <input type='submit' class='button' value='Login'>

    </form>

@endsection
