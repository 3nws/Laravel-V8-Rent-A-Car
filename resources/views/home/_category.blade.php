@php
    $parentCategories = \App\Http\Controllers\HomeController::categoryList()
@endphp


<li class="nav-item dropdown">
    <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Categories</a>
    <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
        @foreach($parentCategories as $rs)
            @if(count($rs->children))
                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-item">{{ $rs->title }}</a>
                    @include('home.categoryTree', ['children' => $rs->children])
                </li>
            @else
                <li><a href="#" class="dropdown-item">{{ $rs->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>


{{--<div class="dropdown no-arrow mb-4 nav-link">--}}
{{--    <a class="" type="button" style="color: white;"--}}
{{--       id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
{{--       aria-expanded="false">--}}
{{--        Categories--}}
{{--    </a>--}}
{{--    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--        @foreach($parentCategories as $rs)--}}
{{--            <a class="dropdown-item" href="{{ route('category_cars', ['id' => $rs->id]) }}">{{ $rs->title }}</a>--}}
{{--            <div class="dropdown-menu">--}}
{{--                @if(count($rs->children))--}}
{{--                    @include('home.categoryTree', ['children' => $rs->children])--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}

@section('footerjs')
    <script>
        $(function() {
            // ------------------------------------------------------- //
            // Multi Level dropdowns
            // ------------------------------------------------------ //
            $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
                event.preventDefault();
                event.stopPropagation();

                $(this).siblings().toggleClass("show");


                if (!$(this).next().hasClass('show')) {
                    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
                }
                $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                    $('.dropdown-submenu .show').removeClass("show");
                });

            });
        });
    </script>
@endsection
