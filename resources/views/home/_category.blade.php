@php
    $parentCategories = \App\Http\Controllers\HomeController::categoryList()
@endphp


<div class="dropdown no-arrow mb-4 nav-link">
    <a class="" type="button" style="color: white;"
       id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        Categories
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($parentCategories as $rs)
            <a class="dropdown-item" href="#">o{{ $rs->title }}</a>
{{--            <div class="dropdown-menu">--}}
{{--                @if(count($rs->children))--}}
{{--                    @include('home.categoryTree', ['children' => $rs->children])--}}
{{--                @endif--}}
{{--            </div>--}}
        @endforeach
    </div>
</div>
