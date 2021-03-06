@extends('layouts.layout')

@section('title', 'Contact Us - ' . $setting->title)

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
                    <h1>CONTACT US</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')

    <div class="site-section">
        <div class="container">
            @include('home.message')
            <div class="row">
                <div class="col-lg-12 mb-5" >
                    {!! $setting->contact !!}
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2>Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mb-5" >
                    <form action="{{ route('sendmessage') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12 mb-4 mb-lg-0">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="email" placeholder="Email address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="message" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 ml-auto">
                    <div class="bg-white p-3 p-md-5">
                        <h3 class="text-black mb-4">Contact Info</h3>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                                <span class="d-block text-black">Address:</span>
                                <span>{{ $setting->address }}</span></li>
                            <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>{{ $setting->phone }}</span></li>
                            <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>{{ $setting->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
