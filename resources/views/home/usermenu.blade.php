@auth
<div class="bg-white p-3 p-md-5">
    <h3 class="text-black mb-4">
        User Panel
    </h3>
    <ul class="list-unstyled footer-link">
        <li class="d-block mb-3"><a href="{{ route('userprofile') }}">My Profile</a></li>
        <li class="d-block mb-3"><a href="{{ route('user_reservation') }}">My Reservations</a></li>
        <li class="d-block mb-3"><a href="{{ route('usercomments') }}">My Comments</a></li>
        <li class="d-block mb-3"><a href="{{ route('user_car') }}">My Car Listings</a></li>
        <li class="d-block mb-3"><a href="{{ route('logout') }}">Logout</a></li>
        @php
            $userRoles = Auth::user()->roles->pluck('name');
        @endphp
        @if($userRoles->contains('admin'))
            <li class="d-block mb-3"><a href="{{ route('admin_home') }}">Admin Panel</a></li>
        @endif
    </ul>
</div>
@endauth
