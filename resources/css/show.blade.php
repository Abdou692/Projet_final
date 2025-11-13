@extends('layouts.app')

@section('title', 'Catégorie : ' . $category->name . ' - RecycleChic')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Catégorie : {{ $category->name }}</h1>
        <p class="text-lg text-gray-600">Découvrez tous les produits de cette catégorie.</p>
    </div>

    @if($products->isEmpty())
        <p class="text-center text-gray-500">Aucun produit à afficher dans cette catégorie pour le moment.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                @include('partials.product_card', ['product' => $product])
            @endforeach
        </div>
    @endif

@endsection