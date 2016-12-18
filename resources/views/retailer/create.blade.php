@extends('layouts.master')

@section('title')
    Add a New Retailer
@stop

@section('body')

    <h1>Add a new retailer</h1>

    <form method='POST' action='/retailers/add'>
        {{ csrf_field() }}

        <table class='centered_table bold'>
            <tr>
                <td class='right_justify'>
                    <label for='retailer'>Retailer Name:</label>
                </td>
                <td class='left_justify'>
                    <input type='text' class='input' id='retailer' name='retailer_name' value='{{ old('retailer_name','Big Box Store') }}' autofocus>
                </td>
            </tr>
            @if ($errors->has('retailer_name'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('retailer_name') }}</td></tr>
            @endif
        </table><br>

        <input type='submit' class='button' value='Add Retailer'><br>

    </form>

@endsection
