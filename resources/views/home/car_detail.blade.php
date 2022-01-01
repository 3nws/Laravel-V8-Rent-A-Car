@extends('layouts.layout')

@section('title',  $data->title . ' - ' . $setting->title)

@section('description')
    {{ $data->description }}
@endsection

@section('keywords')
    {{ $data->keywords }}
@endsection

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay innerpage" style="background-image: url({{ Storage::url($data->image) }});">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1>{{ $data->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-content">
                    <p class="lead">{{ $data->description }}</p>
                    <p>{!! $data->detail !!}</p>


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


                    <div class="pt-5">
                        @php
                            $avgrate = \App\Http\Controllers\HomeController::avgrate($data->id);
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
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box">
                        <div class="categories">
                            <h3>Categories</h3>
                                <li><a href="#">TODO</a></li>
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <img src="images/person_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 rounded-circle">
                        <h3 class="text-black">About The Author</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
                    </div>

                    <div class="sidebar-box">
                        <h3 class="text-black">Paragraph</h3>
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
