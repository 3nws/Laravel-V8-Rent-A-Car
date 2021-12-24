{{--@foreach($children as $subcategory)--}}
{{--    <div class="dropdown no-arrow mb-4 nav-link">--}}
{{--        @if(count($subcategory->children))--}}
{{--            @include('home.categoryTree', ['children' => $rs->children])--}}
{{--        @else--}}
{{--            <div class="dropdown no-arrow mb-4 nav-link">--}}
{{--                <a class="" type="button" style="color: white;"--}}
{{--                   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                   aria-expanded="false">--}}
{{--                    >{{ $subcategory->title }}--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                    @foreach($parentCategories as $rs)--}}
{{--                        <a class="dropdown-item" href="#">o{{ $rs->title }}</a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}

{{--@endforeach--}}
