@extends('layouts.layout')

@section('title', 'Make Reservation - ' . $setting->title)

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords')
    {{ $setting->keywords }}
@endsection

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url({{ Storage::url($car->image) }});">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1>MAKE RESERVATION</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5" >
                    @include('home.message')
                    <form action="{{ route('user_reservation_store', ['car_id' => $car_id]) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 mb-4 mb-lg-0">
                                <label for="resdate">Start Date</label>
                                <input type="date" class="form-control" name="resdate" placeholder="Start date">
                            </div>
                        </div><div class="form-group row">
                            <div class="col-md-12 mb-4 mb-lg-0">
                                <label for="restime">Start Time</label>
                                <input type="time" class="form-control" name="restime" placeholder="Start Time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mb-4 mb-lg-0">
                                <label for="returndate">End Date</label>
                                <input type="date" class="form-control" name="returndate" placeholder="Return date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mb-4 mb-lg-0">
                                <label for="returntime">End Time</label>
                                <input type="time" class="form-control" name="returntime" placeholder="End time">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Make Reservation
                        </button>
                    </form>
                </div>
                <div class="col-lg-4 ml-auto">
                    <div class="bg-white p-3 p-md-5">
                        <h3 class="text-black mb-4">Car Info</h3>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                                <span class="d-block text-black">Price:</span>
                                <span>${{ $car->price }}/day</span></li>
                            <li class="d-block mb-3"><span class="d-block text-black">Brand-Model:</span><span>{{ $car->title }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
