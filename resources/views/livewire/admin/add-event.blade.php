<div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">
        <x-card title="Tabel event" class="col-span-1 md:col-span-4 p-4 rounded shadow" shadow separator>
            <x-table :headers="$headers" :rows="$events" striped with-pagination/>
        </x-card>
        <x-card title="Tambah event" class="col-span-1 md:col-span-2 p-4 rounded shadow" shadow separator> 
           <form wire:submit.prevent="addEvent">
                <div class="container mx-auto p-4 space-y-4">
                    <x-input label="Nama Event" wire:model="name" placeholder="Nama Event" inline  />
                    <x-textarea label="Deskripsi" wire:model="description" placeholder="Deskripsi" rows="2" inline />
                    <x-datetime label="Tanggal Mulai" wire:model="start_date" />
                    <x-datetime label="Tanggal Selesai" wire:model="end_date" />
                    <x-input label="lokasi" wire:model="location" placeholder="lokasi" inline  />
                    <x-input label="Image" wire:model="image" placeholder="Image" inline  />
                    <x-button type="submit" label="Submit" class="btn-success "/>
                    @if (session()->has('message'))
                        <div>{{ session('message') }}</div>
                    @endif
                </div>
            </form> 
        </x-card>
</div>
