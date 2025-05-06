@extends('layout.app')

@include('component.navbar')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-10 mt-32">
    <div class="flex items-center space-x-8">

        <img
            src="{{ asset('images/'. $user['image']) }}"
            alt="Profile Picture"
            class="w-auto h-80  object-cover"
        >

        <div class="flex-1">
            <h2 class="text-2xl font-semibold text-gray-600">{{ $user['name'] }}</h2>
            <p class="text-gray-500 py-2">{{ $user['email'] }}</p>

            <div class="mt-6 flex space-x-4">
                <button class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Edit Profile
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-900 rounded text-white px-4 py-2 border border-red-900 hover:border-red-900 hover:bg-transparent hover:text-red-900">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

