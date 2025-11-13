@extends('layouts.admin')

@section('title', 'Modifier le produit')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Champ Nom -->
            <div>
                <label for="name" class="form-label">Nom du produit</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $product->name) }}" required>
            </div>

            <!-- Champ Description -->
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="4" class="form-input">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Champ Prix -->
            <div>
                <label for="price" class="form-label">Prix</label>
                <input type="number" step="0.01" id="price" name="price" class="form-input" value="{{ old('price', $product->price) }}" required>
            </div>

            <!-- Champ Catégorie -->
            <div>
                <label for="category_id" class="form-label">Catégorie</label>
                <select id="category_id" name="category_id" class="form-input" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Champ Image URL -->
            <div>
                <label for="image_url" class="form-label">URL de l'image</label>
                <input type="text" id="image_url" name="image_url" class="form-input" value="{{ old('image_url', $product->image_url) }}">
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection