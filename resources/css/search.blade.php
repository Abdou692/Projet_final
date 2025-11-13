@extends('layouts.app')

@section('title', 'Résultats de recherche - RecycleChic')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Résultats pour "{{ request('query') }}"</h1>
        <p class="text-lg text-gray-600">{{ $products->count() }} produit(s) trouvé(s).</p>
    </div>

    @if($products->isEmpty())
        <p class="text-center text-gray-500">Désolé, aucun produit ne correspond à votre recherche.</p>
        <div class="text-center mt-4">
            <a href="{{ route('welcome') }}" class="btn btn-primary">Retour à l'accueil</a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                @include('partials.product_card', ['product' => $product])
            @endforeach
        </div>
    @endif

@endsection