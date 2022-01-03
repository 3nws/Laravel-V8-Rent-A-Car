@extends('layouts.layout')

@section('title', $setting->title)

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords', $setting->keywords)

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url({{ Storage::url($featured->image) }});">
        <div class="container">
            @php
                $avgrate = (int)\App\Http\Controllers\HomeController::avgrate($featured->id);
            @endphp
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="feature-car-rent-box-1">
                        <h3><a href="{{ route('car_detail', ['id' => $featured->id]) }}">{{ $featured->title }}</a></h3>
                        <ul class="list-unstyled">
                            <li>
                                <span>Rating</span>
                                <p class="starability-result" data-rating="{{ $avgrate }}"></p>
                            </li>
                            <li>
                                <span>Seats</span>
                                <span class="spec">{{ $featured->seats }}</span>
                            </li>
                            <li>
                                <span>Large Bags</span>
                                <span class="spec">{{ $featured->large_bags }}</span>
                            </li>
                            <li>
                                <span>Small Bags</span>
                                <span class="spec">{{ $featured->small_bags }}</span>
                            </li>
                            <li>
                        </ul>
                        <div class="d-flex align-items-center bg-light p-3">
                            <span>${{ $featured->price }}/day</span>
                            <a href="{{ route('make_reservation', ['car_id' => $featured->id]) }}" class="ml-auto btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@section('content')
    @include('home._content')
@endsection
