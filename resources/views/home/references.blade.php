@extends('layouts.layout')

@section('title', 'References - ' . $setting->title)

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
                    <h1>OUR REFERENCES</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mr-auto">
                    <div style="margin-left: -5em;">
                        {!! $setting->references !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
