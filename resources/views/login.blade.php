@extends('layout.app')

@section('content')

    <div class="absolute top-20 left-1/2 transform -translate-x-1/2 w-full max-w-lg px-4 z-[60]">
        @if(session('error'))
            <div id="alert-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm text-center transition-opacity duration-1000 opacity-100">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
        <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm text-center transition-opacity duration-1000 opacity-100">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="relative bg-white p-10 rounded-2xl shadow-lg flex gap-8 items-center max-w-4xl min-h-[550px] mx-auto w-full mt-32">

        <div class="flex-1 hidden md:flex flex-col items-center">
            <img src="{{ asset('images/cover1.png') }}" alt="Login" class="w-auto h-90 object-cover rounded-full">
        </div>

        <form action="{{ route('submitLogin') }}" method="POST" class="flex-1 space-y-4">
            @csrf
            <h2 class="text-2xl font-bold text-blue-400 text-center">LOG IN</h2>
            <input type="text" name="username" placeholder="Username" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            <button type="submit"
            class="bg-blue-400 text-white text-center py-2 px-6 rounded-full w-full font-semibold border border-blue-400 hover:border-blue-400 hover:bg-transparent hover:text-blue-400 transition"> Login
            </button>
            {{-- dummy aja kak --}}
            <p class="text-sm text-center text-gray-600">Forget Password? <a href="#" class="font-semibold text-blue-400 hover:underline">Click here</a></p>
        </form>
    </div>
@endsection

<script>
    setTimeout(function() {
        var alert = document.getElementById("alert-message");
        if (alert) {
            alert.style.opacity = "0";
            alert.style.transition = "opacity 1s ease-in-out";
            setTimeout(function() {
                alert.style.display = "none";
            }, 1000);
        }
    }, 2000);
</script>


