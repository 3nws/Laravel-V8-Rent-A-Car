@extends('layouts.layout')

@section('title', 'My Car Listings')

@section('description')

@endsection

@section('keywords', 'user profile')

@section('styles')
    <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <div class="container">
                            @include('home.message')
                            <a href="{{ route('user_car_add') }}">
                                <button class="btn-circle btn btn-success mb-2"><i class="fas fa-plus"></i></button>
                            </a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Image Gallery</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>User ID</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>{{ $rs->id }}</td>
                                            <td>{{ $rs->title }}</td>
                                            <td>
                                                @if($rs->image)
                                                    <img src="{{ Storage::url($rs->image) }}" height="40" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('user_image_add', ['car_id' => $rs->id]) }}"
                                                   onclick="return !window.open(this.href, '', 'top=50 left=100 width=1400, height=900')">
                                                    <i class="fas fa-images"></i>
                                                </a>
                                            </td>
                                            <td>
                                                {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category, $rs->category->title) }}
                                            </td>
                                            <td>{{ $rs->price }}</td>
                                            <td>{{ $rs->user_id }}</td>
                                            <td>{{ $rs->status }}</td>
                                            <td>{{ $rs->created_at }}</td>
                                            <td>{{ $rs->updated_at }}</td>
                                            <td><a href="{{ route('user_car_edit', ['id' => $rs->id]) }}"><i class="fas fa-edit"></i></a></td>
                                            <td><a href="{{ route('user_car_delete', ['id' => $rs->id]) }}"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
            <div class="col-lg-2 ml-auto pl-0 pr-5">
                @include('home.usermenu')
            </div>
        </div>
    </div>
@endsection

@section('footerjs')
    <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script>
    <script>
        (function() {
            var ws = new WebSocket('ws://' + window.location.host + '/jb-server-page?reloadServiceClientId=1');
            ws.onmessage = function (msg) {
                if (msg.data === 'reload') {
                    window.location.reload();
                }
                if (msg.data.startsWith('update-css ')) {
                    var messageId = msg.data.substring(11);
                    var links = document.getElementsByTagName('link');
                    for (var i = 0; i < links.length; i++) {
                        var link = links[i];
                        if (link.rel !== 'stylesheet') continue;
                        var clonedLink = link.cloneNode(true);
                        var newHref = link.href.replace(/(&|\?)jbUpdateLinksId=\d+/, "$1jbUpdateLinksId=" + messageId);
                        if (newHref !== link.href) {
                            clonedLink.href = newHref;
                        }
                        else {
                            var indexOfQuest = newHref.indexOf('?');
                            if (indexOfQuest >= 0) {
                                // to support ?foo#hash
                                clonedLink.href = newHref.substring(0, indexOfQuest + 1) + 'jbUpdateLinksId=' + messageId + '&' +
                                    newHref.substring(indexOfQuest + 1);
                            }
                            else {
                                clonedLink.href += '?' + 'jbUpdateLinksId=' + messageId;
                            }
                        }
                        link.replaceWith(clonedLink);
                    }
                }
            };
        })();
    </script>
@endsection
