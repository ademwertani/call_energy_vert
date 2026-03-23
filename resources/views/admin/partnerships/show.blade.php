@extends('layouts.back')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="mb-0">Détail de la demande de partenariat</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="mb-3">
                <strong>Entreprise :</strong>
                <div>{{ $partnership->company_name }}</div>
            </div>

            <div class="mb-3">
                <strong>Nom du contact :</strong>
                <div>{{ $partnership->contact_name }}</div>
            </div>

            <div class="mb-3">
                <strong>Email :</strong>
                <div>{{ $partnership->email }}</div>
            </div>

            <div class="mb-3">
                <strong>Téléphone :</strong>
                <div>{{ $partnership->phone ?? '-' }}</div>
            </div>

            <div class="mb-3">
                <strong>Domaine d’activité :</strong>
                <div>{{ $partnership->business_domain ?? '-' }}</div>
            </div>

            <div class="mb-3">
                <strong>Type de service :</strong>
                <div>{{ $partnership->service_type ?? '-' }}</div>
            </div>

            <div class="mb-3">
                <strong>Description de la proposition :</strong>
                <div class="border rounded p-3 bg-light" style="white-space: pre-line;">
                    {{ $partnership->proposal_description }}
                </div>
            </div>

            <div class="mb-3">
                <strong>Date d’envoi :</strong>
                <div>{{ $partnership->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <a href="{{ route('admin.partnerships.index') }}" class="btn btn-secondary">
                    Retour
                </a>

                <a href="{{ route('admin.partnerships.edit', $partnership) }}" class="btn btn-warning text-dark">
                    Modifier
                </a>

                <form action="{{ route('admin.partnerships.destroy', $partnership) }}" method="POST" onsubmit="return confirm('Supprimer cette demande ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection