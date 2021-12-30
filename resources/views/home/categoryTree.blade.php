
@foreach($children as $subcategory)
        @if(count($subcategory->children))
            <li class="dropdown-submenu">
                <a id="dropdownMenu" href="{{ route('category_cars', ['id' => $subcategory->id]) }}" role="button"
                   aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">
                    {{ $subcategory->title }}
                </a>
                <ul aria-labelledby="dropdownMenu" class="dropdown-menu border-0 shadow">
                    @include('home.categoryTree', ['children' => $subcategory->children])
                </ul>
            </li>
        @else
            <li><a href="{{ route('category_cars', ['id' => $subcategory->id]) }}" class="dropdown-item">{{ $subcategory->title }}</a></li>
        @endif

@endforeach
