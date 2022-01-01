<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{

    public $record, $comment, $car_id, $rate;

    public function mount($id)
    {
        $this->record = Car::findOrFail($id);
        $this->car_id = $this->record->id;
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function resetInput()
    {
        $this->comment = null;
        $this->rate = null;
        $this->car_id = null;
        $this->ip = null;
        $this->comment = null;
    }

    public function store()
    {
        $this->validate([
            'comment' => 'required|min:10',
            'rate' => 'required',
        ]);

        \App\Models\Comment::create([
            'car_id' => $this->car_id,
            'user_id' => Auth::id(),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'rate' => $this->rate,
            'comment' => $this->comment,
        ]);

        session()->flash('message', 'Comment posted succesfully.');
        $this->resetInput();
    }

}
