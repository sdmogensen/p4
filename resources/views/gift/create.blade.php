@extends('layouts.master')

@section('title')
    Add a New Gift
@stop

@section('body')

    <h1>Add a new gift</h1>

    <form method='POST' action='/gifts/add'>
        {{ csrf_field() }}

        <table class='centered_table bold'>
            <tr>
                <td class='right_justify'>
                    <label for='retailer'><span class='red'>*</span>Retailer:</label>
                </td>
                <td class='left_justify'>
                    <select class='select' id='retailer' name='retailer'>
                        <option selected disabled hidden></option>
                        @foreach($retailers_for_dropdown as $retailer_id => $retailer)
                            <option value='{{ $retailer_id }}'>{{ $retailer }}</option>
                        @endforeach
                    </select>
                    &nbsp;
                    <a class ='smaller' href='/retailers/add'>
                        Add New Retailer Name
                    </a>
                </td>
            </tr>
            @if ($errors->has('retailer'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('retailer') }}</td></tr>
            @endif

            <tr>
                <td class='right_justify'>
                    <label for='name'><span class='red'>*</span>Gift Name:</label>
                </td>
                <td class='left_justify'>
                    <input type='text' class='input2' id='name' name='gift_name' value='{{ old('gift_name') }}' autofocus>
                </td>
            </tr>
            @if ($errors->has('gift_name'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('gift_name') }}</td></tr>
            @endif

            <tr>
                <td class='right_justify'>
                    <label for='price'><span class='red'>*</span>Price:</label>
                </td>
                <td class='left_justify'>
                    <input type='text' class='input2' id='price' name='price' value='{{ old('price') }}'>
                </td>
            </tr>

            @if ($errors->has('price'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('price') }}</td></tr>
            @endif
            <tr>
                <td class='right_justify'>
                    <label for='url'><span class='red'>*</span>Purchase Link:</label>
                </td>
                <td class='left_justify'>
                    <input type='text' class='input2' id='url' name='purchase_link' value='{{ old('purchase_link') }}'>
                </td>
            </tr>

            @if ($errors->has('purchase_link'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('purchase_link') }}</td></tr>
            @endif
            <tr>
                <td class='right_justify'>
                    <label for='image'>Image url:</label>
                </td>
                <td class='left_justify'>
                    <input type='text' class='input2' id='image' name='image_url' value='{{ old('image_url') }}'>
                </td>
            </tr>
            @if ($errors->has('image_url'))
                <tr><td></td><td class='left_justify error'>{{ $errors->first('image_url') }}</td></tr>
            @endif
        </table><br>

        <input type='submit' class='button' value='Add Gift'><br>

        <span class='red'>*</span>Indicates required field

    </form>

@endsection
