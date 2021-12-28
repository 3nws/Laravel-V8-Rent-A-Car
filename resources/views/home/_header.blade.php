<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">

            <div class="col-3 ">
                <div class="site-logo">
                    <a href="{{ route('home') }}">CarRent</a>
                </div>
            </div>

            <div class="col-9  text-right">


                <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li class="@if(request()->routeIS('home')) active @endif"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        <li>
                            @include('home._category')
                        </li>
                        <li class="will be added later maybe"><a href="#" class="nav-link">Cars</a></li>
                        <li class="@if(request()->routeIS('aboutus')) active @endif"><a href="{{ route('aboutus') }}" class="nav-link">About Us</a></li>
                        <li class="@if(request()->routeIS('contact')) active @endif"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        <li class="@if(request()->routeIS('faq')) active @endif"><a href="{{ route('faq') }}" class="nav-link">FAQ</a></li>
                        <li class="@if(request()->routeIS('references')) active @endif"><a href="{{ route('references') }}" class="nav-link">References</a></li>
                        @auth
                            <li><a href="{{ route('userprofile') }}" class="nav-link">{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                        @endauth
                        @guest
                            <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endguest
                    </ul>
                </nav>
            </div>


        </div>
    </div>

</header>
