@extends('base.base')

@section('content')
    <div class="container mx-auto mt-5 px-4">
        <h2 class="mb-4 text-2xl font-bold">Tickets for {{ $movie->movie_title }}</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Customer Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Seat Number</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Checked In</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Check In Time</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th> <!-- New column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $row->customer_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $row->seat_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $row->is_checked_in ? 'Yes' : 'No' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $row->check_in_time}}</td>
                            <td class="border border-gray-300 px-4 py-2"> <!-- Actions column -->
                                @if ($row->is_checked_in == 0)
                                <form action="{{ route('deletes', $row->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                                @endif
                                @if ($row->is_checked_in == 0)
                                <form action="{{ route('checkIn', $row->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:text-green-800">Check In</button>
                                </form>
                                @endif
                                <form action="{{ route('update', $row->id) }}" method="GET" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-800">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
