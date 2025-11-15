@extends('layouts.admin')

@section('title', 'Gestion des Catégories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des Catégories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>

    <div class="admin-card">
        <table class="table table-hover table-admin">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th class="text-end" style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->titre }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.categories.edit', $categorie) }}" class="btn btn-accent btn-sm">Modifier</a>
                            <form action="{{ route('admin.categories.destroy', $categorie) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Aucune catégorie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection