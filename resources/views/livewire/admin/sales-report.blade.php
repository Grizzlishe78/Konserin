<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <x-card title="Sales Report" class="p-4 rounded shadow" shadow separator>
            <x-table :headers="$headers" :rows="$sales" striped with-pagination/>
        </x-card>
        <x-card title="Recap" class="p-4 rounded shadow" shadow separator>
             <x-table :headers="$rekapHeaders" :rows="$rekaps" striped with-pagination/>
        </x-card>
</div>
    
   
