<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @if($events->count() > 0)
        @foreach($events as $event)
            <x-card title="{{ $event->name }}">
                <p class="text-sm">{{ $event->location }} - {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</p>
                <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                @if($event->image)
                    <x-slot:figure>
                         <img src="{{ $event->image }}" class="w-full max-h-[700px] object-cover rounded-lg" />
                    </x-slot:figure>
                @endif
                <x-slot:actions separator>
                    <a href="{{ route('event.detail', ['id' => $event->id]) }}">
                         <x-button label="Detail" class="btn-primary" />
                    </a>
                </x-slot:actions>
            </x-card>
        @endforeach
    @else
        <p class="text-gray-500">Belum ada event.</p>
    @endif
</div>

