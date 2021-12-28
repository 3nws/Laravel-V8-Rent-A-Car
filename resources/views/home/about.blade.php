@extends('layouts.layout')

@section('title', 'About us - ' . $setting->title)

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
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0 order-lg-2">
                    <img src="{{ asset('assets') }}/images/hero_2.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-6 mr-auto">
                    <h2>Rental Car Company</h2>
                    <p>{!! $setting->aboutus !!}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
