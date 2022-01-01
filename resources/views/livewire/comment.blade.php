<div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form class="" wire:submit.prevent="store">
        @csrf
        <div class="form-group">
            @error('rate') <span class="text-danger">{{ $message }}</span>@enderror
            <strong class="text-uppercase">Your rating: </strong>

            <div class="stars">
                <fieldset class="starability-checkmark">
                    <input
                        type="radio"
                        id="no-rate"
                        class="input-no-rate"
                        wire:model="rate"
                        value="3"
                        checked
                        aria-label="No rating."
                    />
                    <input
                        type="radio"
                        id="first-rate1"
                        wire:model="rate"
                        value="1"
                    />
                    <label for="first-rate1" title="Terrible">1 star</label>
                    <input
                        type="radio"
                        id="first-rate2"
                        wire:model="rate"
                        value="2"
                    />
                    <label for="first-rate2" title="Not good">2 stars</label>
                    <input
                        type="radio"
                        id="first-rate3"
                        wire:model="rate"
                        value="3"
                    />
                    <label for="first-rate3" title="Average">3 stars</label>
                    <input
                        type="radio"
                        id="first-rate4"
                        wire:model="rate"
                        value="4"
                    />
                    <label for="first-rate4" title="Very good">4 stars</label>
                    <input
                        type="radio"
                        id="first-rate5"
                        wire:model="rate"
                        value="5"
                    />
                    <label for="first-rate5" title="Amazing">5 stars</label>
                </fieldset>
            </div>
        </div>
        <div class="form-group">
            <label for="message">Comment</label>
            <textarea wire:model="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
            @error('comment') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        @auth
            <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
            </div>
        @else
            <div class="form-group">
                <a href="{{ route('login') }}" class="btn btn-primary btn-md text-white">
                    Log in to post a comment
                </a>
            </div>
        @endauth
    </form>
</div>
