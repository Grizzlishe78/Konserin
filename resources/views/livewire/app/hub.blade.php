<div class="flex h-screen">
    <div class="w-1/3 bg-center"></div>
    <div class="w-2/3 flex items-center justify-center relative">
        <form wire:submit.prevent="submit" class="w-full max-w-2xl px-6">
            <div class="container mx-auto p-4 space-y-4">
                <h2 class="text-2xl font-bold mb-6 text-[#7A0000]">Form Hubungi Kami</h2>
                <x-input label="Nama" wire:model="nama" placeholder="Nama" inline  />
                <x-input label="Nomer" wire:model="nomer" placeholder="Nomer" inline type="number" />
                <x-input label="Email" wire:model="akun" placeholder="Email" inline type="email" />
                <x-textarea label="Pesan" wire:model="pesan" placeholder="Pesan" rows="2" inline />
                <x-button type="submit" label="Submit" class="btn-success "/>
                @if (session()->has('message'))
                    <div class="text-green-600 mt-2">{{ session('message') }}</div>
                @endif
            </div>
        </form>
    </div>  
</div>
