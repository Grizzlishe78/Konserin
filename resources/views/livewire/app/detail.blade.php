@section('title', 'Detail')
<div class="max-w-7xl mx-auto py-12 px-4">
<x-card title="{{ $event->name }}" style="background: #7A0000;">
     <p class="text-gray-600">{{ $event->location }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</p>
     <p class="mt-4">{{ $event->description }}</p>
     <h1 class="text-2xl font-bold mb-6">Tiket</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @if($ticket_batches->count() > 0)
        @foreach ( $ticket_batches as $tikets)
         <x-card title="tiket - {{ $tikets->nama_batch }}" subtitle=" stock {{ $tikets->stok }} - harga Rp.{{ $tikets->harga }}" separator progress-indicator>
            <x-button label="Beli Tiket" x-on:click="$dispatch('beli-tiket', { id: {{ $tikets->id }} })"/>
         </x-card>
        @endforeach
        @else
            <p class="text-gray-500">Belum ada tiket</p>
        @endif
    </div>
    <livewire:app.form-pembayaran />
    @if($event->image)
    <x-slot:figure>
        <img src="{{ url('image/' . $event->id) }}" alt="Event Image" class="w-full max-h-[700px] object-cover rounded-lg" />
    </x-slot:figure>
    @endif
</x-card>    

   
</div>
