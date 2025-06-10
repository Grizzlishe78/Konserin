<div class="container mx-auto p-4">
    <!-- Baris pertama (2 card) -->
    <div >
        <livewire:admin.add-event />
    </div>

    <!-- Baris kedua -->
    <div >
        <livewire:admin.add-ticket-batch />
    </div>

    <div>
        <livewire:admin.sales-report />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
        <x-card title="Report" class="p-4 rounded shadow" shadow separator>
            <livewire:admin.report />
        </x-card>
    </div>

</div>
