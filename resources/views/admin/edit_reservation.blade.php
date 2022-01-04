@extends('layouts.admin')

@section('title', 'Edit Reservation')

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
                                        <form action="{{ route('admin_reservation_update', ['id' => $data->id]) }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-12 mb-4 mb-lg-0">
                                                    <label for="resdate">Start Date</label>
                                                    <input type="date" class="form-control" value="{{ $data->rezdate }}" name="resdate" placeholder="Start date">
                                                </div>
                                            </div><div class="form-group row">
                                                <div class="col-md-12 mb-4 mb-lg-0">
                                                    <label for="restime">Start Time</label>
                                                    <input type="time" class="form-control" value="{{ $data->reztime }}" name="restime" placeholder="Start Time">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 mb-4 mb-lg-0">
                                                    <label for="returndate">End Date</label>
                                                    <input type="date" class="form-control" value="{{ $data->returndate }}" name="returndate" placeholder="Return date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 mb-4 mb-lg-0">
                                                    <label for="returntime">End Time</label>
                                                    <input type="time" class="form-control" value="{{ $data->returntime }}" name="returntime" placeholder="End time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="note" class="form-control" value="{{ $data->note }}" placeholder="Admin Note">
                                            </div>
                                            <div class="form-group">
                                                <select name="status" id=""
                                                        class="form-control">
                                                    <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                                                    <option value="Confirmed">Confirmed</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                    <option value="Finished">Finished</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Edit Reservation
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
