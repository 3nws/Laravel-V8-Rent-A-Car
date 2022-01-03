@php
    $setting = \App\Http\Controllers\HomeController::getSettings()
@endphp

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Contact</h2>
                <p><i class="fas fa-phone mr-1"></i>{{ $setting->phone }}</p>
                <p><i class="fas fa-fax mr-1"></i>{{ $setting->fax }}</p>
                <p><i class="fas fa-envelope-square mr-1"></i>{{ $setting->email }}</p>
                <p><i class="fas fa-map-marker mr-1"></i>{{ $setting->address }}</p>
            </div>
            <div class="col-lg-8 ml-auto">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="footer-heading mb-4">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('aboutus') }}">About Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('references') }}">References</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="footer-heading mb-4">Social Media</h2>
                        <ul class="list-unstyled">
                            @if($setting->facebook != null)<li><a href="#" target="_blank"><i class="fab fa-facebook mr-1"></i>Facebook</a></li>@endif
                            @if($setting->instagram != null)<li><a href="#" target="_blank"><i class="fab fa-instagram mr-2"></i>Instagram</a></li>@endif
                            @if($setting->twitter != null)<li><a href="#" target="_blank"><i class="fab fa-twitter mr-1"></i>Twitter</a></li>@endif
                            <li><a href="https://github.com/3nws" target="_blank"><i class="fab fa-github mr-1"></i>GitHub</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | {{ $setting->company }}
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>

<script src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('assets') }}/js/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.sticky.js"></script>
<script src="{{ asset('assets') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.animateNumber.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.fancybox.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('assets') }}/js/aos.js"></script>

<script src="{{ asset('assets') }}/js/main.js"></script>
<script>
    $(document).ready(function() {
        const owlNav = document.querySelector('.owl-nav');
        owlNav.parentElement.removeChild(owlNav);
    });
</script>


