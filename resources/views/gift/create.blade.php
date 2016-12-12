@extends('layouts.master')

@section('title')
    Add a new gift
@endsection

@section('body')

    <h1>Add a new gift</h1>

    <form method='POST' action='/gifts/add'>

        {{ csrf_field() }}

        <div>
           <label>Title:</label>
            <input
                type='text'
                name='name'
                value='{{ old('name','Lego Star Wars') }}'
            >
           <div class='error'>{{ $errors->first('name') }}</div>
        </div>


        <div>
           <label>Web url:</label>
           <input
               type='text'
               name='url'
               value='{{ old('url','www.amazon.com') }}'
           >
           <div class='error'>{{ $errors->first('url') }}</div>
        </div>

        <button type='submit'>Add gift</button>

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@endsection
