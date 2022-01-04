@extends('layouts.admin')

@section('title', 'Edit User')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fileupload.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/select.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('content')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        @include('admin._topbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Edit Car</h1>
                                        </div>
                                        <form class="user" action="{{ route('admin_user_update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                           name="name"
                                                           value="{{ $data->name }}"
                                                           placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                       name="email"
                                                       value="{{ $data->email }}"
                                                       placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="phone"
                                                       value="{{ $data->phone }}"
                                                       placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="address"
                                                       value="{{ $data->address }}"
                                                       placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <div class="file-upload">
                                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                                    <div class="image-upload-wrap" style="display: none;">
                                                        <input class="file-upload-input" type='file'
                                                               value="{{ $data->profile_photo_path }}" onchange="readURL(this);" accept="image/*" name="image"/>
                                                        <div class="drag-text">
                                                            <h3>Drag and drop a file or select add Image</h3>
                                                        </div>
                                                    </div>
                                                    <div class="file-upload-content" style="display: block;">
                                                        @if($data->profile_photo_path)
                                                            <img class="file-upload-image" src="{{ Storage::url($data->profile_photo_path) }}" alt="your image" />
                                                        @else
                                                            <img class="file-upload-image" src="#" alt="your image" />
                                                        @endif
                                                        <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Edit User
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


@endsection

@section('scripts')
            <script src="{{ asset('assets') }}/js/fileupload.js"></script>
            <script src="{{ asset('assets') }}/js/select.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    CKEDITOR.replace('detail');
                });
            </script>
@endsection
