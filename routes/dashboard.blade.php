@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4 playfair-display">Tableau de bord</h1>
    <p class="lead">Bienvenue dans l'espace d'administration de RecycleChic.</p>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gérer le site</h5>
                    <p class="card-text">Ajoutez, modifiez ou supprimez des produits et des catégories.</p>
                    <a href="{{ route('admin.products.create') }}" class="btn" style="background-color: var(--rc-bleu); color:white;">Nouveau Produit</a>
                    <a href="{{ route('admin.categories.create') }}" class="btn" style="background-color: var(--rc-jaune); color:black;">Nouvelle Catégorie</a>
                </div>
            </div>
        </div>
    </div>
@endsection