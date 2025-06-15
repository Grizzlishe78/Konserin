<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddEvent extends Component
{
    use WithPagination, WithFileUploads;

    public string $name = '';
    public string $description = '';
    public string $location = '';
    public string $start_date = '';
    public string $end_date = '';
    public $image; // ✅ Jangan diberi tipe objek (hapus `?TemporaryUploadedFile`)

    public function addEvent()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:1024', // Max 1MB
        ]);

        $binaryImage = $this->image ? file_get_contents($this->image->getRealPath()) : null;

        Event::create([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location' => $this->location,
            'image' => $binaryImage,
        ]);

        session()->flash('message', 'Event berhasil ditambahkan!');
        $this->reset(['name', 'description', 'start_date', 'end_date', 'location', 'image']);
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

        return view('livewire.admin.add-event', compact('events', 'headers'));
    }
}
