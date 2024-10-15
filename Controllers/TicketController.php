<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Movie;
use Illuminate\Support\Carbon;

class TicketController extends Controller
{
    public function showBookingForm($movie)
    {
        $movies = Movie::all();
        
        // Find the specific movie by its ID from the collection
        $movie = $movies->firstWhere('id', $movie);

        // Pass the movie instance and all movies to the view
        return view('book')->with(['movie' => $movie]);
    }
    public function showUpdateForm(Ticket $ticket)
{
    // Now $ticket is the single ticket instance passed from the route.
    return view('update')->with('ticket', $ticket);
}


    public function insert(Request $r)
    {

        $r->validate([
            'customer_name' => 'required | max:100',
            'seat_number' => 'required | max:5'
        ], [
            'customer_name.required' => 'nama customer harus diisi',
            'customer_name.max' => 'nama customer maksimal 100 karakter',
            'seat_number.required' => 'nomor kursi harus diisi',
            'seat_number.max' => 'nomor kursi maksimal 5 karakter'
        ]);


        $ticket = new Ticket;
        $ticket->movie_id = $r->movie_id;
        $ticket->customer_name = $r->customer_name;
        $ticket->seat_number = $r->seat_number;
        $ticket->save();

        return redirect()->route("movies")->with("success","Berhasil");
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete(); // Delete the ticket
        return redirect()->route('movies')->with('success', 'Ticket deleted successfully.'); // Redirect after deletion
    }
    public function checkIn(Ticket $ticket)
    {
        $ticket->is_checked_in = 1;
        $ticket->check_in_time = Carbon::now(); //carbon now untuk ngisi waktu sekarang
        $ticket->save();
        return redirect()->route('movies')->with('success', 'Ticket Updated successfully.'); // Redirect after deletion
    }
    
    public function update(Request $r, $id)
{
    // Validate the input
    $r->validate([
        'customer_name' => 'required|string|max:255',
        'seat_number' => 'required|string|max:10',
    ]);

    // Find the ticket by its ID
    $ticket = Ticket::find($id);

    // Update the ticket with the request data
    $ticket->customer_name = $r->customer_name;
    $ticket->seat_number = $r->seat_number;
    $ticket->save(); // Save the changes

    // Redirect to a route with a success message
    return redirect()->route('movies')->with('success', 'Ticket updated successfully!');
}

}
