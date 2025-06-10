<?php


use App\Livewire\Admin\AdminDashboard;
use App\Livewire\App\Detail;
use App\Livewire\App\Home;
use App\Livewire\App\Hub;
use App\Livewire\Auth\Login;
use App\Livewire\auth\Register;
use Illuminate\Support\Facades\Route;


Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/', Home::class)->name('home');

Route::middleware(['auth','user'])->group(function(){
    Route::get('/event/{id}', Detail::class)->name('event.detail');
    Route::get('/hub', Hub::class)->name('hub');
});

Route::get('/admin', AdminDashboard::class)->name('admin');
// Route::middleware(['auth', 'admin'])->group(function () {
//         Route::get('/admin', AdminDashboard::class)->name('admin.dashboard');
// });
    
