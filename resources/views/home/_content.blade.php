<div class="site-section pt-0 pb-0 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="trip-form" action="{{ route('get_car') }}" method="post">
                    @csrf
                    <div class="row align-items-center mb-4">
                        <div class="col-md-6">
                            <h3 class="m-0"></h3>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <span class="text-primary">TODO(add number of cars here)</span> <span>cars available</span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label for="cf-1">Model or brand</label>
                            @livewire('search')
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-info" style="transform: scale(1.8); margin-top:2.9em;" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('home._slider')
<div class="site-section section-3" style="background-image: url('{{ asset('assets') }}/images/hero_2.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-white">Our services</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Repair</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Car Accessories</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Own a Car</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container site-section mb-5">
    <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
            <h2>How it works</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
        </div>
    </div>
    <div class="how-it-works d-flex">
        <div class="step">
            <span class="number"><span>01</span></span>
            <span class="caption">Time &amp; Place</span>
        </div>
        <div class="step">
            <span class="number"><span>02</span></span>
            <span class="caption">Car</span>
        </div>
        <div class="step">
            <span class="number"><span>03</span></span>
            <span class="caption">Details</span>
        </div>
        <div class="step">
            <span class="number"><span>04</span></span>
            <span class="caption">Checkout</span>
        </div>
        <div class="step">
            <span class="number"><span>05</span></span>
            <span class="caption">Done</span>
        </div>

    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-7 text-center mb-5">
                <h2>Customer Testimony</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-2">
                    <blockquote class="mb-4">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                        <img src="{{ asset('assets') }}/images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                        <span>Mike Fisher</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-2">
                    <blockquote class="mb-4">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                        <img src="{{ asset('assets') }}/images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                        <span>Jean Stanley</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-2">
                    <blockquote class="mb-4">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                        <img src="{{ asset('assets') }}/images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                        <span>Katie Rose</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-7 text-center mb-5">
                <h2>Popular Cars</h2>
            </div>
        </div>

        <div class="row">
            @foreach($cars as $rs)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">
                        <a href="#">
                            <img src="{{ Storage::url($rs->image) }}" alt="Image"
                                 style="height: 175px;"
                                 class="img-fluid">
                        </a>
                        <div class="post-entry-1-contents">
                            <h2><a href="#">{{ $rs->title }}</a></h2>
                            <span class="meta d-inline-block mb-3">{{ $rs->created_at }} <span class="mx-2">by</span> <a href="#">Admin</a></span>
                            @php
                                $avgrate = (int)\App\Http\Controllers\HomeController::avgrate($rs->id);
                            @endphp
                            <p class="starability-result" data-rating="{{ $avgrate }}"></p>
                            <p>{{ $rs->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
