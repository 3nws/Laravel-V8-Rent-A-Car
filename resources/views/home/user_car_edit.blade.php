@extends('layouts.layout')

@section('title', 'Edit Car')

@section('description')
    {{ $setting->description }}
@endsection

@section('keywords')
    {{ $setting->keywords }}
@endsection

@section('styles')
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
                        <h1 class="h4 text-gray-900 mb-4">Edit Car</h1>
                    </div>
                    <div class="container">
                        <form class="user" action="{{ route('user_car_update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <select name="category_id" id="category_id"
                                        class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;">
                                    @foreach($datalist as $rs)
                                        <option value="{{ $rs->id }}" @if ($rs->id == $data->category_id) selected @endif>
                                            {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                       name="title"
                                       value="{{ $data->title }}"
                                       placeholder="Title">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                       name="keywords"
                                       value="{{ $data->keywords }}"
                                       placeholder="Keywords">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                       name="description"
                                       value="{{ $data->description }}"
                                       placeholder="Description">
                            </div>
                            <div class="form-group">
                                <div class="file-upload" style="width: 100% !important;">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                    <div class="image-upload-wrap" style="display: none;">
                                        <input class="file-upload-input" type='file'
                                               value="{{ $data->image }}" onchange="readURL(this);" accept="image/*" name="image"/>
                                        <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content" style="display: block;">
                                        @if($data->image)
                                            <img class="file-upload-image" src="{{ Storage::url($data->image) }}" alt="your image" />
                                        @else
                                            <img class="file-upload-image" src="#" alt="your image" />
                                        @endif
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user"
                                       name="price"
                                       value="{{ $data->price }}"
                                       placeholder="Price">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user"
                                       name="seats"
                                       value="{{ $data->seats }}"
                                       placeholder="Seats">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user"
                                       name="large_bags"
                                       value="{{ $data->large_bags }}"
                                       placeholder="Large bags">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user"
                                       name="small_bags"
                                       value="{{ $data->small_bags }}"
                                       placeholder="Small bags">
                            </div>
                            <div class="form-group">
                            <textarea id="detail" name="detail" class="form-control">
                                {{ $data->detail }}
                            </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Edit Car
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
