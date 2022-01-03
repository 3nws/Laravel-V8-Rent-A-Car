@extends('layouts.admin')

@section('title', 'Reservation List')

@section('styles')
    <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('profile.livewirestyles')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('admin._topbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <h6 class="m-0 font-weight-bold text-primary mb-2">Reservation List</h6>
                <div class="categories card shadow mb-4">
                    <div class="card-header py-3 inline-block">
                        @include('home.message')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Car</th>
                                    <th>Res. Date</th>
                                    <th>Days</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Admin Note</th>
                                    <th>Edit</th>
                                    <th>Cancel</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <tr>
                                        <td>{{ $rs->id }}</td>
                                        <td><a href="{{ route('car_detail', ['id' => $rs->car->id]) }}">{{ $rs->car->title }}</a></td>
                                        <td>{{ $rs->rezdate }}</td>
                                        <td>{{ $rs->days }}</td>
                                        <td>${{ ($rs->price)*($rs->days) }} (${{ $rs->price }}/day)</td>
                                        <td>{{ $rs->status }}</td>
                                        <td>{{ $rs->note }}</td>
                                        <td><a href="{{ route('admin_reservation_edit', ['id' => $rs->id, 'car_id' => $rs->car->id]) }}"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="{{ route('admin_reservation_delete', ['id' => $rs->id]) }}"
                                               onclick="return confirm('Are you sure you want to cancel this reservation?')"
                                            ><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
@endsection

@section('scripts')
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
