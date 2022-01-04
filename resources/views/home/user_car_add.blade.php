@extends('layouts.layout')

@section('title', 'User Profile')

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords')
    {{ $setting->keywords }}
@endsection

@section('styles')
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/stars.css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fileupload.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/select.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{ asset('assets') }}/images/hero_2.jpg')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1>User Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')
    @include('profile.livewirestyles')

    <div class="site-section bg-light" id="contact-section">
        <div class="row">
            <div class="col-lg-10 pr-0" style="margin-top: -1em;">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add a Car</h1>
                </div>
                <div class="container">
                    <form class="user" action="{{ route('user_car_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select name="category_id" id="category_id"
                                    class="form-control select2"
                                    style="width: 100%;">
                                @foreach($datalist as $rs)
                                    <option value="{{ $rs->id }}">
                                        {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                   name="title"
                                   placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                   name="keywords"
                                   placeholder="Keywords">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                   name="description"
                                   placeholder="Description">
                        </div>
                        <div class="form-group">
                            <div class="file-upload" style="width: 100% !important;">
                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image"/>
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user"
                                   name="price"
                                   placeholder="Price">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user"
                                   name="seats"
                                   placeholder="Seats">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user"
                                   name="large_bags"
                                   placeholder="Large bags">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user"
                                   name="small_bags"
                                   placeholder="Small bags">
                        </div>
                        <div class="form-group">
                            <textarea id="detail" name="detail" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Add Car
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 ml-auto pl-0 pr-5">
                @include('home.usermenu')
            </div>
        </div>
    </div>

@endsection

@section('footerjs')
    <script src="{{ asset('assets') }}/js/fileupload.js"></script>
    <script src="{{ asset('assets') }}/js/select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('detail');
        });
    </script>
@endsection
