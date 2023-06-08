<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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
    Route::resource('tickets', TicketController::class);

    Route::get('history/tickets', [TicketController::class,'history']);
    Route::get('in-process/tickets', [TicketController::class,'inProcess']);

    Route::post('tickets/{ticket}/close', [TicketController::class,'close_ticket']);
    Route::post('tickets/{ticket}/in_process', [TicketController::class,'in_process_ticket']);
    Route::post('tickets/{ticket}/open', [TicketController::class,'open_ticket']);
});


require __DIR__.'/auth.php';
