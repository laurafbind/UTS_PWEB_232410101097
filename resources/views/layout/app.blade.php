<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>
</head>
<body class="min-h-screen flex flex-col bg-cover bg-center" style="background-image: url('{{ asset('images/bg.jpg') }}');">

    @if (Route::currentRouteName() !== 'login')
        @include('component.navbar')
    @endif

    <main class="flex-1 w-full">
        <div class="max-w-screen-xl mx-auto px-4 py-10">
            @yield('content')
        </div>
    </main>

    @include('component.footer')
</body>
</html>
