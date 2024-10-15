<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Models\Ticket;
use App\Http\Controllers\TicketController;

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

Route::get('/movies', function () {
    return view('movies', ['list_movies' =>Movie::all()]);
})->name('movies');

Route::get('/movies/tickets/{movie:id}', function ($movieId) {
    return view('tickets', [
        'tickets' => Ticket::with(['Movies'])->where('movie_id', $movieId)->get(),
        'movie' => Movie::with(['tickets'])->findOrFail($movieId)
    ]);
})->name('tickets');
    
Route::get('/movies/book/{movie:id}', [TicketController::class, 'showBookingForm'])->name('book');
Route::post('/ticket/submit', [TicketController::class, 'insert'])->name('ticket.submit');


Route::delete('/ticket/delete/{ticket:id}',[TicketController::class, 'delete'])->name('deletes');
Route::put('/ticket/delete/{ticket:id}',[TicketController::class, 'checkIn'])->name('checkIn');

// Display the update form for a specific ticket
Route::get('/ticket/{ticket}', [TicketController::class, 'showUpdateForm'])->name('update');

// Handle the update of a specific ticket
Route::put('/ticket/update/{ticket}', [TicketController::class, 'update'])->name('ticket.update');




