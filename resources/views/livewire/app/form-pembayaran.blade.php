<div class="container mx-auto p-4 space-y-4">
     @if($showForm)
        <form wire:submit.prevent="simpan">
            <x-card title="Form Transaksi" class="col-span-1 md:col-span-2 p-4 rounded shadow" shadow separator>
                <div class="container mx-auto p-4 space-y-4">
                
                <x-input label="Nama" wire:model="nama" placeholder="Nama" inline  />
                <x-input label="Email" wire:model="email" placeholder="Email" inline type="email" />
                <x-input label="Nohp" wire:model="no_hp" inline type="number" />
                <x-textarea label="Alamat" wire:model="alamat" placeholder="Alamat" rows="2" inline />
                <x-textarea label="catatan" wire:model="catatan" placeholder="catatan" rows="2" inline />
                <x-button type="submit" label="Submit" class="btn-success "/>
                @if (session()->has('message'))
                    <div class="text-green-600 font-semibold">
                        {{ session('message') }}
                    </div>
                @endif
                </div> 
            </x-card>
        </form>
       
    @endif
</div>
