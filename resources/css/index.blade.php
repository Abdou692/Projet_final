@extends('layouts.admin')

@section('title', 'Gestion des Catégories')

@section('actions')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        Ajouter une catégorie
    </a>
@endsection

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6">
        @if($categories->isEmpty())
            <p class="text-center text-gray-500">Aucune catégorie trouvée.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th class="w-1/4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->titre }}</td>
                            <td class="flex items-center space-x-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-accent btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection