@extends('layouts.master')

@section('title')
    Edit gift
@endsection

@section('body')

    <h1>Edit gift</h1>

    <form method='POST' action='/gifts/edit/{{ $gift }}'>

        {{ csrf_field() }}

        <div>
           <label>Title:</label>
            <input
                type='text'
                name='name'
                value='{{ old('name','Star Wars') }}'
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

        <button type='submit'>Edit gift</button>

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>


@endsection
