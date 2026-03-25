@extends('layouts.back')

@section('title', 'Détail candidature')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Détail candidature</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Poste :</strong> {{ $application->career->title ?? '-' }}</p>
            <p><strong>Nom :</strong> {{ $application->full_name }}</p>
            <p><strong>Email :</strong> {{ $application->email }}</p>
            <p><strong>Téléphone :</strong> {{ $application->phone ?: '-' }}</p>
            <p><strong>Niveau d’expérience :</strong> {{ $application->experience_level ?: '-' }}</p>
            <p><strong>Disponibilité immédiate :</strong> {{ $application->immediate_availability ?: '-' }}</p>
            <p><strong>Date :</strong> {{ $application->created_at?->format('d/m/Y H:i') }}</p>

            <p><strong>Message :</strong></p>
            <div class="border rounded p-3 bg-light mb-3">
                {{ $application->message ?: 'Aucun message' }}
            </div>

            <p><strong>CV :</strong>
                @if($application->cv)
                    <a href="{{ asset('storage/' . $application->cv) }}" target="_blank" class="btn btn-success btn-sm ms-2">
                        Ouvrir le CV
                    </a>
                @else
                    Aucun CV
                @endif
            </p>
        </div>
    </div>
</div>
@endsection