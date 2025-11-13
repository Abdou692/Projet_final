@extends('layouts.app')

@section('title', 'Accueil - RecycleChic')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue chez RecycleChic</h1>
        <p class="text-lg text-gray-600">Découvrez notre sélection unique de produits de seconde main, pleins de charme et d'histoire.</p>
    </div>

    <h2 class="text-3xl font-bold mb-8">Nos derniers produits</h2>

    @if($products->isEmpty())
        <p class="text-center text-gray-500">Aucun produit à afficher pour le moment.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                @include('partials.product_card', ['product' => $product])
            @endforeach
        </div>
    @endif

@endsection