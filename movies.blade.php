@extends('base.base')

@section('content')
@if(session('success'))
    <div id="success-alert" class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 w-1/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md z-50" role="alert">
        <div class="flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-green-700 hover:text-green-900 font-bold ml-4">
                &times;
            </button>
        </div>
    </div>

    <script>
        // Hide the alert after 2 seconds (2000 ms)
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 2000);
    </script>
@endif


<div class="grid grid-cols-3 gap-6 p-6"> <!-- Divided into 3 columns with proper padding and spacing -->
    @foreach ($list_movies as $row)
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden dark:bg-gray-800 dark:border-gray-700 transition hover:scale-105 duration-300 ease-in-out"> <!-- Added hover effect and shadow -->
        <a href="#">
            <img class="w-full h-48 object-cover" src="/path/to/your/movie/image.jpg" alt="{{ $row->movie_title }}" /> <!-- Replace with actual movie image path -->
        </a>
        <div class="p-6">
            <a href="#">
                <h5 class="mb-3 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $row->movie_title }}</h5>
            </a>
            <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
                <span class="font-semibold">Duration:</span> {{ $row->duration }} minutes
            </p>
            <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
                <span class="font-semibold">Release Date:</span> {{ $row->release_date }}
            </p>

            <!-- Ticket Order Button -->
            <a href="{{ route('book', ['movie' => $row->id]) }}" class="mt-4 inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition duration-150 ease-in-out">
                Order Tickets
                <svg class="w-4 h-4 ml-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <a href="{{ route('tickets', ['movie' => $row->id]) }}" class="mt-4 inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition duration-150 ease-in-out">
                List Ticket
                <svg class="w-4 h-4 ml-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
