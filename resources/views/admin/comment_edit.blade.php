<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Comment</title>


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
    <link rel="stylesheet" href="{{ asset('assets') }}/css/summernote_button.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
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
                                        <h1 class="h4 text-gray-900 mb-4">Edit Comment</h1>
                                    </div>
                                    @include('home.message')
                                    <form class="user" action="{{ route('admin_comment_update', ['id' => $data->id]) }}" method="post">
                                        @csrf
                                        <table>
                                            <tr>
                                                <td>
                                                    Name:
                                                </td>
                                                <td>
                                                    {{ $data->user->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $avgrate = \App\Http\Controllers\HomeController::avgrate($data->id);
                                                @endphp
                                                <td>
                                                    Rate:
                                                </td>
                                                <td>
                                                    <p class="starability-result" data-rating="{{ $data->rate }}">
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Comment:
                                                </td>
                                                <td>
                                                    {{ $data->comment }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Status:
                                                </td>
                                                <td>
                                                    <select name="status" id="">
                                                        <option selected>{{ $data->status }}</option>
                                                        <option>True</option>
                                                        <option>False</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Edit Comment
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


    <script src="{{ asset('assets') }}/js/fileupload.js"></script>
    <script src="{{ asset('assets') }}/js/select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</div>
</body>
</html>
