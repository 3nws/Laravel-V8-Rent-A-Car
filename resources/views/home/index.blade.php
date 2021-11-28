@extends('layouts.layout')

@section('title', 'index page')

@section('sidebar')
    <div class="col-sm-3 col-lg-2">
        <ul>
            <li>link 1</li>
            <li>link 2</li>
            <li>link 3</li>
            <li>link 4</li>
        </ul>
    </div>
@endsection


@section('content')
    <div class="col-sm-9 col-lg-10">
        <p>This is the body content!</p>
    </div>
@endsection
