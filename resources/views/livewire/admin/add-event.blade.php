<div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">
    <x-card title="Tabel event" class="col-span-1 md:col-span-4 p-4 rounded shadow" shadow separator>
        <x-table :headers="$headers" :rows="$events" striped with-pagination />
    </x-card>

    <x-card title="Tambah event" class="col-span-1 md:col-span-2 p-4 rounded shadow" shadow separator>
        <form wire:submit.prevent="addEvent">
            <div class="container mx-auto p-4 space-y-4">
                <x-input label="Nama Event" wire:model="name" placeholder="Nama Event" inline />
                <x-textarea label="Deskripsi" wire:model="description" placeholder="Deskripsi" rows="2" inline />
                <x-datetime label="Tanggal Mulai" wire:model="start_date" />
                <x-datetime label="Tanggal Selesai" wire:model="end_date" />
                <x-input label="Lokasi" wire:model="location" placeholder="Lokasi" inline />

                {{-- Custom Image Upload --}}
                <div class="space-y-2">
                    <label for="imageUpload" class="block font-medium text-sm text-gray-700">Image</label>

                    <label
                        for="imageUpload"
                        class="flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded cursor-pointer hover:bg-gray-50 transition"
                    >
                        <span class="text-gray-700 truncate">
                            {{ $image ? $image->getClientOriginalName() : 'Pilih Gambar...' }}
                        </span>
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12V4m0 0L8 8m4-4l4 4" />
                        </svg>
                    </label>

                    <input id="imageUpload" type="file" wire:model="image" class="hidden" />

                    <small class="text-gray-500">Max 1MB</small>

                    @error('image')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="h-24 w-auto rounded shadow" alt="Preview">
                    @endif
                </div>

                <x-button type="submit" label="Submit" class="btn-success" />

                @if (session()->has('message'))
                    <div class="text-green-500 font-semibold mt-2">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </form>
    </x-card>
</div>
