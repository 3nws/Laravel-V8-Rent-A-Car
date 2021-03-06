@extends('layouts.admin')

@section('title', 'Edit Category')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fileupload.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/select.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Edit Category</h1>
                                        </div>
                                        <form class="user" action="{{ route('admin_category_update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <select name="parent_id" id="parent_id"
                                                        class="form-control select2 select2-hidden-accessible"
                                                        style="width: 100%;">
                                                    <option value="0">Main Category</option>
                                                    @foreach($datalist as $rs)
                                                        <option value="{{ $rs->id }}" @if ($rs->id == $data->parent_id) selected @endif>
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
                                                <div class="file-upload">
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
                                                <select name="status" id=""
                                                        class="form-control">
                                                    <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                                                    <option value="True">True</option>
                                                    <option value="False">False</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Update Category
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection
