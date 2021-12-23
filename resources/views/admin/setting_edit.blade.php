@extends('layouts.admin')

@section('title', 'Edit Setting')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fileupload.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/select.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/summernote_button.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                                            <h1 class="h4 text-gray-900 mb-4">Edit Setting</h1>
                                        </div>
                                        <form class="user" action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-user"
                                                       name="id"
                                                       value="{{ $data->id }}"
                                                       placeholder="ID">
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
                                                <input type="text" class="form-control form-control-user"
                                                       name="company"
                                                       value="{{ $data->company }}"
                                                       placeholder="Company">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="address"
                                                       value="{{ $data->address }}"
                                                       placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="phone"
                                                       value="{{ $data->phone }}"
                                                       placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="fax"
                                                       value="{{ $data->fax }}"
                                                       placeholder="Fax">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                       name="email"
                                                       value="{{ $data->email }}"
                                                       placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="smtpserver"
                                                       value="{{ $data->smtpserver }}"
                                                       placeholder="smtpserver">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="smtpemail"
                                                       value="{{ $data->smtpemail }}"
                                                       placeholder="smtpemail">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                       name="smtppassword"
                                                       value="{{ $data->smtppassword }}"
                                                       placeholder="smtppassword">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-user"
                                                       name="smtpport"
                                                       value="{{ $data->smtpport }}"
                                                       placeholder="smtpport">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="facebook"
                                                       value="{{ $data->facebook }}"
                                                       placeholder="Facebook">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="instagram"
                                                       value="{{ $data->instagram }}"
                                                       placeholder="Instagram">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       name="twitter"
                                                       value="{{ $data->twitter }}"
                                                       placeholder="Twitter">
                                            </div>
                                            <div class="form-group">
                                                <textarea id="aboutus" name="aboutus" class="form-control">
                                                    About us:
                                                    {{ $data->aboutus }}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <textarea id="contact" name="contact" class="form-control">
                                                    Contact:
                                                    {{ $data->contact }}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <textarea id="reference" name="reference" class="form-control">
                                                    References:
                                                    {{ $data->reference }}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <select name="status" id=""
                                                        class="form-control">
                                                    <option value="" selected>{{ $data->status }}</option>
                                                    <option value="True">True</option>
                                                    <option value="False">False</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Edit Setting
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
            <!-- include summernote css/js -->
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#aboutus').summernote();
                    $('#contact').summernote();
                    $('#reference').summernote();
                });
            </script>
@endsection
