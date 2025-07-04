<?php


use App\Livewire\Admin\AdminDashboard;
use App\Livewire\App\Detail;
use App\Livewire\App\Home;
use App\Livewire\App\Hub;
use App\Livewire\Auth\Login;
use App\Livewire\auth\Register;
use App\Models\Event;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;




Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/', Home::class)->name('home');

Route::middleware(['auth','user'])->group(function(){
    Route::get('/event/{id}', Detail::class)->name('event.detail');
    Route::get('/hub', Hub::class)->name('hub');
});

Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', AdminDashboard::class)->name('admin.dashboard');
});
    
Route::get('/image/{id}', function ($id) {
    $event = Event::findOrFail($id);
    return Response::make($event->image, 200, [
        'Content-Type' => 'image/jpeg', 
        'Content-Disposition' => 'inline; filename="event.jpg"',
    ]);
});