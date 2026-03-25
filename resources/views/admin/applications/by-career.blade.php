@extends('layouts.back')

@section('title', 'Candidatures du poste')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Candidatures : {{ $career->title }}</h1>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">Retour</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Niveau d’expérience</th>
                        <th>Disponibilité</th>
                        <th>CV</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->id }}</td>
                            <td>{{ $application->full_name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->phone ?: '-' }}</td>
                            <td>{{ $application->experience_level ?: '-' }}</td>
                            <td>{{ $application->immediate_availability ?: '-' }}</td>
                            <td>
                                @if($application->cv)
                                    <a href="{{ asset('storage/' . $application->cv) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                        Voir CV
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $application->created_at?->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.applications.show', $application->id) }}" class="btn btn-primary btn-sm">
                                    Voir
                                </a>

                                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Supprimer cette candidature ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Aucune candidature pour ce poste.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection