@extends('layouts.layout')

@section('title', 'Laravel Araç Kiralama Sitesi')

@section('description')
    Literally the best website to rent a car...
@endsection

@section('keywords', 'car, rent, rental, rent a car, rental cars, cars, rental car, car for rental')

@section('featuredcar')
    @include('home._featuredcar')
@endsection

@section('content')
    @include('home._content')
@endsection
