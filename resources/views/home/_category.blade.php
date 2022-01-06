@php
    $parentCategories = \App\Http\Controllers\HomeController::categoryList()
@endphp

<li class="nav-item dropdown">
    <a id="dropdownMenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
       class="nav-link dropdown-toggle">Categories</a>
    <ul aria-labelledby="dropdownMenu" class="dropdown-menu border-0 shadow">
        @foreach($parentCategories as $rs)
            @if(count($rs->children))
                <li class="dropdown-submenu nav-link dropdown-toggle">
                    <a id="dropdownMenu" href="{{ route('category_cars', ['id' => $rs->id]) }}" role="button"
                       aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                        {{ $rs->title }}
                    </a>
                    <ul aria-labelledby="dropdownMenu" class="dropdown-menu border-0 shadow">
                        @include('home.categoryTree', ['children' => $rs->children])
                    </ul>
                </li>
            @else
                <li><a href="{{ route('category_cars', ['id' => $rs->id]) }}" class="dropdown-item">{{ $rs->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>

