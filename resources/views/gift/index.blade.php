@extends('layouts.master')

@section('title')
    Gift List
@stop

@section('body')

    <a href='/gifts/index'>My List</a>
    &nbsp;
    <a href='/gifts/add'>Add Gift</a>
    &nbsp;
    <a href='/logout'>Logout</a><br><br>

    @if(sizeof($gifts) == 0)
        <div class='big bold black'>You have not added any gifts, <a href='/gifts/add'>add a gift now to get started.</a></div>
    @else
        <div class='big bold black'>Shareable wishlist url: <a href='/wishlists/{{ $username }}'> {{ url('/wishlists').'/'.$username }}</a></div>
        @foreach($gifts as $gift)
            <div class='boxed @if($gift->purchased) grayout @endif'>
                <span class='bigger bolder black'> {{ $gift->name }} </span><br><br>
                <table class='bold'>
                    <tr>
                        <td>
                            <img src='{{ $gift->image }}' alt='{{ $gift->name }}' width='200'>
                        </td>
                        <td class='top_align'>
                            Price: ${{ $gift->price }} from {{ $gift->retailer->name }}<br><br>
                            Purchase Link:<br>
                            <a href='{{ $gift->url }}'> {{ $gift->url }} </a><br><br>
                            @if($gift->purchased) <span class='green'> Purchased </span>
                            @else <span class='red'> Unpurchased </span><br>
                            @endif
                        </td>
                    </tr>
                </table>
                <form method='GET' action='/gifts/edit/{{ $gift->id }}' class='inline'>
                    <input type='submit' class='inline_button' value='Edit This Gift'/>
                </form>
                <form method='POST' action='/gifts/edit/{{ $gift->id }}' class='inline'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type='submit' class='inline_button' value='Remove This Gift'/>
                </form>
            </div>
        @endforeach
    @endif

@endsection
