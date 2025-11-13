@extends('layouts.admin')

@section('title', 'Ajouter une catégorie')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Champ Titre -->
            <div>
                <label for="titre" class="form-label">Titre de la catégorie</label>
                <input type="text" id="titre" name="titre" class="form-input" placeholder="ex: Vêtements" value="{{ old('titre') }}" required>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">
                    Créer la catégorie
                </button>
            </div>
        </form>
    </div>
@endsection