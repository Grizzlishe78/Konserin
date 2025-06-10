<div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">
    <x-card title="Tambah Tiket" class="col-span-1 md:col-span-2 p-4 rounded shadow" shadow separator>
        <form wire:submit.prevent="addTicketBatch" >
            <div class="container mx-auto p-4 space-y-4">
                <x-select label="Event" :options="$eventOptions" option-label="name" option-value="id" placeholder="Pilih Event" wire:model="event_id"/>
                <x-input label="Nama Batch" wire:model="nama_batch" placeholder="Nama Batch" inline  />
                <x-input label="Harga" wire:model="harga" prefix="IDR" inline type="number" />
                <x-input label="Stock" wire:model="stok" placeholder="Stock" inline  type="number"/>
                <x-datetime label="Tanggal Mulai Penjualan" wire:model="tanggal_mulai_penjualan" />
                <x-datetime label="Tanggal Akhir Penjualan" wire:model="tanggal_akhir_penjualan" />
                <x-button type="submit" label="Submit" class="btn-success "/>
                @if (session()->has('message'))
                    <div class="text-green-600 font-semibold">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </form>    
    </x-card>
    <x-card title="Tabel tiket" class="col-span-1 md:col-span-4 p-4 rounded shadow" shadow separator>   
        <x-table :headers="$headers" :rows="$batches" striped with-pagination/>  
    </x-card>
</div>


