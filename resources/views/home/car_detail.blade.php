@extends('layouts.layout')

@section('title',  $data->title . ' - ' . $setting->title)

@section('description')
    {{ $data->description }}
@endsection

@section('keywords')
    {{ $data->keywords }}
@endsection

<div class="ftco-blocks-cover-1">

    @if(count($car_images)>0)

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php $cnt = 0; @endphp
                @foreach($car_images as $rs)
                    <div class="carousel-item ftco-cover-1 overlay innerpage @if($cnt==0) active @else  @endif">
                        <img class="d-block w-100" src="{{ Storage::url($rs->image) }}" alt="First slide">
                    </div>
                    @php
                        $cnt += 1;
                        if ($cnt==count($car_images)){
                            $cnt=0;
                        }
                    @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @else
        <div class="ftco-cover-1 overlay innerpage" style="background-image: url({{ Storage::url($data->image) }});">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>{{ $data->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-content">
                    <p class="lead">{{ $data->description }}</p>
                    <p>{!! $data->detail !!}</p>





                    <div class="pt-5">
                        @php
                            $avgrate = \App\Http\Controllers\HomeController::avgrate($data->id);
                            if (!$avgrate){
                                $avgrate = 0;
                            }
                        @endphp
                        <h3 class="mb-5">{{ $avgrate }} stars on {{ count($comments) }} Comments</h3>
                        <ul class="comment-list">
                            @foreach($comments as $rs)
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="{{ Storage::url($rs->user->profile_photo_path) }}" alt="Free Website Template by Free-Template.co">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $rs->user->name }}</h3>
                                        <div class="meta">{{ $rs->created_at }}</div>
                                        <p class="starability-result" data-rating="{{ $rs->rate }}"></p>
                                        <p>{{ $rs->comment }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            @livewire('comment', ['id' => $data->id])
                        </div>
                    </div>

                </div>
                <div class="col-md-4 sidebar">
                    <div class="sidebar-box">
                        <div class="categories">
                            <h3>Categories Path</h3>
                                <li>
                                    {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data->category, $data->category->title) }}
                                </li>
                        </div>
                        <div class="pt-5">
                            <p class="text-muted">Keywords:
                                @php
                                    $arr = explode(" ", $data->keywords);
                                @endphp
                                @for($i = 0; $i < count(explode(" ", $data->keywords)); $i++)
                                    @if ($i==0)
                                        {{ $arr[$i] }}
                                    @else
                                        ,{{ $arr[$i] }}
                                    @endif
                                @endfor
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('make_reservation', ['car_id' => $data->id]) }}" class="btn btn-primary">Rent Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('footerjs')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('.carousel').carousel()
    </script>
@endsection
