<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta
    name="description"
    content="At present, information about movies and managing lists of movies that one would like to see is too cumbersome for many competitors.
    By creating a more user-focused experience, this process can be facilitated and thus attract more visitors.
    With an increased interest in the service can also publish and administer film content">
    <meta name="keywords" content="meta tags, meta description, meta keywords, SEO, search engine optimization, movies, filters, categories, genres, film>

    <title>TheMovieHub</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased min-w-screen min-h-screen bg-color">
    <div class="min-h-screen  overflow-x-hidden ">
        <!-- Page Content -->
        <header>
            @include('layouts.navigation')
        </header>
        <!-- Page Content -->
        <main id="app" class="min-h-screen">
            {{ $slot }}
        </main>
        <!-- Page Footer -->
        <footer>
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>
