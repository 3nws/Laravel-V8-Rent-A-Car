@extends('layouts.layout')

@section('title', 'User Profile')

@section('description')

@endsection

@section('keywords', 'user profile')

@section('content')

    <div class="site-section bg-light" id="contact-section">
        <div class="row">
            <div class="col-lg-10 pr-0" style="margin-top: -1em;">
                @include('profile.show')
            </div>
            <div class="col-lg-2 ml-auto pl-0 pr-5">
                @include('home.usermenu')
            </div>
        </div>
    </div>

@endsection
