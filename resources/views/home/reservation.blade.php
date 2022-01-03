@extends('layouts.layout')

@section('title', 'My Reservations')

@section('description')

@endsection

@section('keywords', 'user profile')

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

    <div class="site-section bg-light" id="contact-section">
        <div class="row">
            <div class="col-lg-10 pr-0" style="margin-top: -1em;">
                <div class="container">
                    @include('home.message')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Car</th>
                            <th>Res. Date</th>
                            <th>Days</th>
                            <th>Price</th>
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
                                <td><a href="{{ route('user_reservation_edit', ['id' => $rs->id, 'car_id' => $rs->car->id]) }}"><i class="fas fa-edit"></i></a></td>
                                <td><a href="{{ route('user_reservation_delete', ['id' => $rs->id]) }}"
                                       onclick="return confirm('Are you sure you want to delete')"
                                    ><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-2 ml-auto pl-0 pr-5">
                @include('home.usermenu')
            </div>
        </div>
    </div>

@endsection
