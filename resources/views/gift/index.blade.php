@extends('layouts.master')

@section('body')
    <a class='small' href='{{ url('/logout') }}'>
        Logout
    </a>

@endsection
