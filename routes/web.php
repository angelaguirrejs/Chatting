<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'chat');

//Livewire routes

Route::middleware(['auth', 'role:simple'])->group(function(){
    Route::get('users', [\App\Http\Livewire\Chat\CreateChat::class, '__invoke'])->name('users');
    Route::get('/chat/{conversation?}', [\App\Http\Livewire\Chat\Main::class, '__invoke'])->name('chat');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'show'])->name('dashboard');
});

require __DIR__.'/auth.php';
