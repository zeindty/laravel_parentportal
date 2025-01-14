<?php

use App\Http\Controllers\ChildController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    

    Route::resource('reports', ReportController::class);
    Route::resource('events', EventController::class);
    Route::resource('childs', ChildController::class);
    Route::put('/childs/{child}', [ChildController::class, 'update'])->name('childs.update');
    Route::delete('/childs/{child}', [ChildController::class, 'destroy'])->name('childs.destroy');

    Route::resource('meetings', MeetingController::class);

    Route::get('/export/pdf', [MeetingController::class, 'cetakPdf'])->name('cetak.pdf');
    Route::get('/export', [MeetingController::class, 'cetak'])->name('cetak');
    


});

require __DIR__ . '/auth.php';
