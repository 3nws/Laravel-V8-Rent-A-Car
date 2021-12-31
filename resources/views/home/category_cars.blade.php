@extends('layouts.layout')

@section('title', $category->title . ' Car List')

@section('description')
@endsection

@section('keywords')
@endsection

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{ asset('assets') }}/images/hero_2.jpg')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1>{{ strtoupper($category->title) }} CARS</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                @foreach($data as $rs)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="item-1">
                        <a href="{{ route('car_detail', ['id' => $rs->id]) }}"><img src="{{ Storage::url($rs->image) }}" style="height: 175px;" alt="Image" class="img-fluid"></a>
                        <div class="item-1-contents">
                            <div class="text-center">
                                <h3><a href="{{ route('car_detail', ['id' => $rs->id]) }}">{{ $rs->title }}</a></h3>
                                <div class="rating">
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                </div>
                                <div class="rent-price"><span>${{ $rs->price }}/</span>day</div>
                            </div>
                            <ul class="specs">
                                <li>
                                    <span>Seats</span>
                                    <span class="spec">{{ $rs->seats }}</span>
                                </li>
                                <li>
                                    <span>Large Bags</span>
                                    <span class="spec">{{ $rs->large_bags }}</span>
                                </li>
                                <li>
                                    <span>Small Bags</span>
                                    <span class="spec">{{ $rs->small_bags }}</span>
                                </li>
                            </ul>
                            <div class="d-flex action">
                                <a href="{{ route('contact') }}" class="btn btn-primary">Rent Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
