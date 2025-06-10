<?php

namespace App\Livewire\App;

use App\Models\Event;
use App\Models\TicketBatch;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Detail extends Component
{
    public $event;
    public $ticket_batches;
    
    
    public function mount($id)
    {
        $this->event = Event::findOrFail($id);
        $this->getTiket();
    }
    
    public function getTiket(){
        $this->ticket_batches = TicketBatch::where('event_id', $this->event->id)->get();
        
    }
    
    public function render()
    {
        return view('livewire.app.detail');
    }
}
