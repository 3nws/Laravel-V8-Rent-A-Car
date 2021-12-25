@extends('layouts.layout')

@section('title', $setting->title)

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords', $setting->keywords)

@section('featuredcar')
    @include('home._featuredcar')
@endsection

@section('content')
    @include('home._content')
@endsection
