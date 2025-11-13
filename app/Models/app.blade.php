<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'RecycleChic')</title>

    <!-- Scripts et Styles avec Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased">
    <div id="app" class="flex flex-col min-h-screen bg-gray-50">

        <!-- Barre de navigation -->
        <header class="bg-white shadow-md sticky top-0 z-10">
            <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('welcome') }}" class="text-3xl font-bold" style="font-family: var(--font-title); color: var(--rc-blue);">
                            RecycleChic
                        </a>
                    </div>

                    <!-- Liens de navigation -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
                            <a href="{{ route('contact.show') }}" class="text-gray-700 hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Contenu principal -->
        <main class="flex-grow container mx-auto p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>

        <!-- Pied de page -->
        <footer class="bg-white mt-auto">
            <div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                &copy; {{ date('Y') }} RecycleChic. Tous droits réservés.
            </div>
        </footer>

    </div>
</body>
</html>