@extends('layouts.master')

@section('title')
    Gift List
@stop

@section('body')

    <h1 class='biggest black'>{{ $username }}'s wishlist</h1>

    @if(sizeof($gifts) == 0)
        {{ $username }} has not added any gifts to their wishlist yet.
    @else
        @foreach($gifts as $gift)
            <div class='boxed @if($gift->purchased) grayout @endif'>
                <span class='bigger bolder black'> {{ $gift->name }} </span><br><br>
                <table class='bold'>
                    <tr>
                        @if($gift->image)
                            <td>
                                <img src='{{ $gift->image }}' alt='{{ $gift->name }}' width='200'>
                            </td>
                        @endif
                        <td class='top_align'>
                            Price: ${{ $gift->price }}<br><br>
                            Purchase Link:<br>
                            <a href='{{ $gift->url }}'>{{ $gift->url }}</a><br><br>
                            @if($gift->purchased) <span class='green'> Purchased </span>
                            @else
                                <span class='red'> Unpurchased </span><br>
                                <form method='POST' action='/wishlists/{{ $username }}/purchased'>
                                    {{ csrf_field() }}
                                    <input type='hidden' name='gift_id' value='{{ $gift->id }}'>
                                    <input type='hidden' name='purchased' value='true'>
                                    <input type='submit' class='link_button' value='Click here if you&apos;ve purchased this gift'>
                                </form>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    @endif

@endsection
