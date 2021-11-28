@extends('layouts.layout')

@section('title', 'index page')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection


@section('content')
    <p>This is the body content!</p>
@endsection
