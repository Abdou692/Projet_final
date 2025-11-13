@extends('layouts.admin')

@section('title', 'Modifier la catégorie')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Champ Titre -->
            <div>
                <label for="titre" class="form-label">Titre de la catégorie</label>
                <input type="text" id="titre" name="titre" class="form-input" value="{{ old('titre', $category->titre) }}" required>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection