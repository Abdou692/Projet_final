@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Nos derniers trésors</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($produits as $produit)
                <div class="col">
                    <div class="product-card">
                        <img src="{{ $produit->image ? Storage::url($produit->image) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="{{ $produit->titre }}">
                        <div class="card-body">
                            <p class="card-category">{{ $produit->categorie->titre ?? 'Non classé' }}</p>
                            <h5 class="card-title">{{ $produit->titre }}</h5>
                            <p class="card-price">{{ $produit->prix }} €</p>
                            <a href="{{ route('produit.detail', $produit->id) }}" class="btn btn-accent mt-auto">Voir le produit</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Aucun produit à afficher pour le moment.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
