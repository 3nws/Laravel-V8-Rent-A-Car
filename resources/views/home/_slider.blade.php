<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h3>Our Offer</h3>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                <p>
                    <a href="#" class="btn btn-primary custom-prev">Previous</a>
                    <span class="mx-2">/</span>
                    <a href="#" class="btn btn-primary custom-next">Next</a>
                </p>
            </div>
            <div class="col-lg-9">
                <div class="nonloop-block-13 owl-carousel">

                    @foreach($slider as $rs)
                    <div class="item-1">
                        <a href="{{ route('car_detail', ['id' => $rs->id]) }}"><img src="{{ Storage::url($rs->image) }}" style="height: 175px;" alt="Image" class="img-fluid"></a>
                        <div class="item-1-contents">
                            <div class="text-center">
                                <h3><a href="{{ route('car_detail', ['id' => $rs->id]) }}">{{ $rs->title }}</a></h3>
                                <div class="rating">
                                    @php
                                        $avgrate = (int)\App\Http\Controllers\HomeController::avgrate($rs->id);
                                    @endphp
                                    <p class="starability-result" style="margin-left: auto; margin-right: auto" data-rating="{{ $avgrate }}"></p>
                                </div>
                                <div class="rent-price"><span>${{ $rs->price }}/</span>day</div>
                            </div>
                            <ul class="specs">
                                <li>
                                    <span>Seats</span>
                                    <span class="spec">{{ $rs->seats }}</span>
                                </li>
                                <li>
                                    <span>Large Bags</span>
                                    <span class="spec">{{ $rs->large_bags }}</span>
                                </li>
                                <li>
                                    <span>Small Bags</span>
                                    <span class="spec">{{ $rs->small_bags }}</span>
                                </li>
                            </ul>
                            <div class="d-flex action">
                                <a href="{{ route('contact') }}" class="btn btn-primary">Rent Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

