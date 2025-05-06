@extends('layout.app')

@include('component.navbar')

@section('title', 'Pengelolaan Tiket Wisata')

@section('content')
<div class="container mx-auto p-20">
    <h1 class="text-2xl font-bold text-center mb-10 text-neutral-50">Manajemen Tiket Wisata</h1>

    <table class="min-w-full overflow-hidden rounded-lg border border-gray-600 mt-15">
        <thead class="bg-blue-400 text-white">
            <tr>

                <th class="border border-gray-300 p-5">ID</th>
                <th class="border border-gray-300 p-5 ">Picture</th>
                <th class="border border-gray-300 p-5">Destination</th>
                <th class="border border-gray-300 p-5">Price</th>
                <th class="border border-gray-300 p-5">Location</th>
                <th class="border border-gray-300 p-5">Availability</th>
                <th class="border border-gray-300 p-5">Statue</th>
                <th class="border border-gray-300 p-5">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr class="text-center bg-gray-100/55">
                    <td class="border border-gray-300 p-5 text-gray-800">{{ $ticket['id'] }}</td>
                    <td class="border border-gray-100 p-3">
                        <img src="{{ asset('images/' . $ticket['image']) }}" alt="{{ $ticket['name'] }}" class="w-70 h-auto rounded-br-lg">
                    </td>
                    <td class="border border-gray-300 p-2 text-gray-800">{{ $ticket['name'] }}</td>
                    <td class="border border-gray-300 p-2 text-gray-800">Rp{{ number_format($ticket['price'], 0, ',', '.') }}</td>
                    <td class="border border-gray-300 p-2 text-gray-800">{{ $ticket['location'] }}</td>
                    <td class="border border-gray-300 p-2 text-gray-800">{{ $ticket['availability'] }}</td>

                        <td class="border border-gray-300 p-2">
                        <span class="px-4 py-2 rounded text-white
                            @if($ticket['status'] === 'Available') bg-emerald-400
                            @elseif($ticket['status'] === 'Sold Out') bg-amber-500 @endif">
                            {{ $ticket['status'] }}
                        </span>
                    </td>
                    <td class="border border-gray-300 p-5">
                        <form action="{{ route('ticket.delete', $ticket['id']) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-cyan-900 text-white px-3 py-2 rounded hover:bg-red-800">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm("Yakin menghapus tiket ?");
    }
</script>
@endsection
