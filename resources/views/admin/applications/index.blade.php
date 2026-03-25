@extends('layouts.back')

@section('title', 'Candidatures')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Toutes les candidatures</h1>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Poste</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Niveau d’expérience</th>
                        <th>Disponibilité</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->id }}</td>
                            <td>{{ $application->career->title ?? '-' }}</td>
                            <td>{{ $application->full_name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->phone ?: '-' }}</td>
                            <td>{{ $application->experience_level ?: '-' }}</td>
                            <td>{{ $application->immediate_availability ?: '-' }}</td>
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
                            <td colspan="9" class="text-center">Aucune candidature trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection