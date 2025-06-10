<?php

namespace App\Livewire\App;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;


class UpcomingEvent extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::where('start_date', '>=', Carbon::now())
            ->orderBy('start_date')
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.app.upcoming-event');
    }
}
