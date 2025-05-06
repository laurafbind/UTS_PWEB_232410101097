@extends('layout.app')

@include('component.navbar')

@section('title', 'dashboard')
@section('content')
<div class="pt-24 font-[Poppins] min-h-screen w-full ">
    <h1 class="text-2xl font-bold text-center mb-10 text-neutral-50">Dashboard</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-md flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-2xl text-gray-700">Hi, {{ $data['user'] }}!</h2>
                    <p class="text-gray-600">Welcome back! Here's dashboard for some information.</p>
                </div>
                <img src="{{ asset('images/cover2.png') }}" alt="welcome" class="w-70">
            </div>

            <div class="h-fit">
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-lg font-bold mb-4 text-gray-700">Best Selling Tickets</h3>
                    <ol class="space-y-4 list-decimal list-inside text-gray-600">
                        @foreach($data['best_selling_tickets'] as $ticket)
                        <li class="flex justify-between items-center ">
                            <span>{{ $ticket['name'] }}</span>
                            <span class="text-sm text-gray-600">{{ $ticket['sold'] }}/sold</span>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 lg:w-2/3">
            <div class="bg-white p-4 rounded-xl shadow-md">
                <p class="text-sm text-gray-600">Recently Monthly Income</p>
                <p class="font-bold text-xl text-emerald-700">Rp {{ number_format($data['monthly_income'], 0) }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow-md">
                <p class="text-sm text-gray-600">Tickets Booked</p>
                <p class="font-bold text-xl text-gray-700">{{ $data['tickets_booked'] }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow-md">
                <p class="text-sm text-gray-600">Tickets Completed</p>
                <p class="font-bold text-xl text-gray-700">{{ $data['tickets_completed'] }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow-md">
                <p class="text-sm text-gray-600">Total Tickets</p>
                <p class="font-bold text-xl text-gray-700">{{ $data['total_tickets'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
