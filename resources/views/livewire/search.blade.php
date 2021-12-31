<div>
    <input wire:model="search" name="search" class="form-control" list="myList" placeholder="Search for a car..." type="text">

    @if(!empty($query))
        <datalist id="myList">
            @foreach($datalist as $rs)
                <option value="{{ $rs->title }}">{{ $rs->category->title }}</option>
            @endforeach
        </datalist>
    @endif
</div>
