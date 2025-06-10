<?php

namespace App\Livewire\App;

use App\Models\Event;
use Livewire\Component;

class ListEvent extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::orderBy('start_date', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.app.list-event');
    }
}
