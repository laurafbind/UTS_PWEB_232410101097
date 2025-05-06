<nav class="fixed top-0 left-0 w-full z-50 bg-white shadow-md px-6 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-2 pl-10">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-blue-400 font-bold' : '' }}">
            <img src="{{ asset('images/logo3.png') }}" alt="Tripivel Logo" class="h-15 w-auto">
        </a>
        <span class="text-xl font-bold text-blue-400">Tripivel</span>
    </div>

    <ul class="flex space-x-8 text-gray-600 text-lg pr-35">
        <li>
            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'text-blue-400 font-semibold' : 'hover:text-blue-400 transition-colors' }}">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('pengelolaan') }}"
                class="{{ request()->routeIs('pengelolaan') ? 'text-blue-400 font-semibold' : 'hover:text-blue-400 transition-colors' }}">
                Management
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}"
                class="{{ request()->routeIs('profile') ? 'text-blue-400 font-semibold' : 'hover:text-blue-400 transition-colors' }}">
                Profile
            </a>
        </li>
    </ul>
</nav>
