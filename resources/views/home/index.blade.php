@extends('layouts.layout')

@section('title', $setting->title)

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords', $setting->keywords)

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url('{{ asset('assets') }}/images/hero_1.jpg')">
        <div class="container">
            <div class="row align-items-center">
                @include('home._featuredcar')
            </div>
        </div>
    </div>
</div>

@section('content')
    @include('home._content')
@endsection
