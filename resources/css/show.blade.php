@extends('layouts.app')

@section('title', $product->name . ' - RecycleChic')

@section('content')
    <div class="bg-white p-8 rounded-xl shadow-lg max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

            <!-- Image du produit -->
            <div>
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/600' }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-md">
            </div>

            <!-- Détails du produit -->
            <div class="flex flex-col h-full">
                @if($product->category)
                    <span class="text-sm text-gray-500 mb-2">{{ $product->category->name }}</span>
                @endif

                <h1 class="text-4xl font-bold mb-4" style="color: var(--rc-blue);">{{ $product->name }}</h1>

                <p class="text-gray-700 mb-6 leading-relaxed">{{ $product->description }}</p>

                <div class="mt-auto">
                    <p class="text-3xl font-bold mb-6" style="color: var(--rc-blue);">
                        {{ number_format($product->price, 2, ',', ' ') }} €
                    </p>

                    <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-accent w-full text-lg">
                            Ajouter au panier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Produits similaires -->
    @if(isset($similarProducts) && $similarProducts->isNotEmpty())
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Produits similaires</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($similarProducts as $similarProduct)
                    @include('partials.product_card', ['product' => $similarProduct])
                @endforeach
            </div>
        </div>
    @endif

@endsection