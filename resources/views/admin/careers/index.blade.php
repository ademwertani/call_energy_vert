@extends('layouts.back')

@section('title', 'Gestion des carrières')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Postes disponibles</h1>
        <a href="{{ route('admin.careers.create') }}" class="btn btn-success">+ Ajouter un poste</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Lieu</th>
                        <th>Contrat</th>
                        <th>Actif</th>
                        <th>Ordre</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($careers as $career)
                        <tr>
                            <td>{{ $career->id }}</td>
                            <td>
                                @if($career->image)
                                    <img src="{{ asset('storage/' . $career->image) }}" width="70" style="border-radius:8px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $career->title }}</td>
                            <td>{{ $career->location }}</td>
                            <td>{{ $career->contract_type }}</td>
                            <td>
                                @if($career->is_active)
                                    <span class="badge bg-success">Oui</span>
                                @else
                                    <span class="badge bg-secondary">Non</span>
                                @endif
                            </td>
                            <td>{{ $career->sort_order }}</td>
                            <td>
                                <a href="{{ route('admin.careers.edit', $career->id) }}" class="btn btn-primary btn-sm">
                                    Modifier
                                </a>

                                <form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Supprimer ce poste ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucun poste disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $careers->links() }}
        </div>
    </div>
</div>
@endsection