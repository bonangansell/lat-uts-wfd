@extends('base.base')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow dark:bg-gray-800">
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Book Tickets for {{ $movie->movie_title }}</h2>
    
    <!-- Booking Form -->
    <form action="{{ route('ticket.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <div class="mb-4">
            <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Name</label>
            <input type="text" name="customer_name" id="customer_name" class="block w-full p-3 border rounded-lg bg-gray-50 dark:bg-gray-700" required>
        </div>
        @error('name')
            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
        @enderror
        <div class="mb-4">
            <label for="seat_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seat Number</label>
            <input type="text" name="seat_number" id="seat_number" class="block w-full p-3 border rounded-lg bg-gray-50 dark:bg-gray-700" required>
        </div>
        @error('seat_number')
            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
        @enderror

        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-600">Submit</button>
    </form>
</div>
@endsection
