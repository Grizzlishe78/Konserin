@section('title', 'Halaman Home')
<div>
    <div class="banner">
        <img src="{{ asset('Assets/HomePage.png') }}" alt="Gambar" />

    </div>

    <!-- List All Event Section -->
    <section class="max-w-7xl mx-auto py-12 px-4">
        <h2 class="text-2xl font-bold mb-6 text-[#7A0000]">Semua Event</h2>
        <livewire:app.list-event />
    </section>

 
</div>

