<?php

use App\Livewire\Dashboard\DashboardIndex;
use App\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index');
Route::get('/user', UserIndex::class)->name('user.index');
