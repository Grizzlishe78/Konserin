<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class AddEvent extends Component
{
    public $name, $description, $start_date, $end_date, $location, $image;
    use WithPagination;
    
    public function addEvent()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Event::create([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location' => $this->location,
            'image' => $this->image,
        ]);

        session()->flash('message', 'Event berhasil ditambahkan!');
        $this->reset();
    }

    public function render()
    {
        $events = Event::paginate(10);
        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'name', 'label' => 'Event Name'],
            ['key' => 'location', 'label' => 'Location'],
            ['key' => 'start_date', 'label' => 'Start Date'],
            ['key' => 'end_date', 'label' => 'End Date'],
        ];
        return view('livewire.admin.add-event', compact('events', 'headers')) ;
    }
}

