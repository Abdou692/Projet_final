<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin - RecycleChic')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div class="p-6 text-center">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold" style="font-family: var(--font-title); color: var(--rc-blue);">
                    RecycleChic
                </a>
                <span class="block text-sm text-gray-500">Admin</span>
            </div>

            <nav class="flex-grow px-4">
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span class="font-medium">Produits</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-3 mt-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <span class="font-medium">Catégories</span>
                </a>
            </nav>

            <div class="p-4">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200">
                        <span class="font-medium">Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800">@yield('title')</h1>
                        <div>
                            @yield('actions')
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>