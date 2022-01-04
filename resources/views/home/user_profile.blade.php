@extends('layouts.layout')

@section('title', 'User Profile')

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords')
    {{ $setting->keywords }}
@endsection

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{ asset('assets') }}/images/hero_2.jpg')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1>USER PROFILE</h1>
                </div>
            </div>
        </div>
    </div>
</div>

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
