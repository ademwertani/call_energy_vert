@extends('layouts.back')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Demandes de partenariat</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($partnerships->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Entreprise</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Domaine</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th style="width:260px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($partnerships as $partnership)
                                <tr>
                                    <td>{{ $partnership->id }}</td>
                                    <td>{{ $partnership->company_name }}</td>
                                    <td>{{ $partnership->contact_name }}</td>
                                    <td>{{ $partnership->email }}</td>
                                    <td>{{ $partnership->phone ?? '-' }}</td>
                                    <td>{{ $partnership->business_domain ?? '-' }}</td>
                                    <td>{{ $partnership->service_type ?? '-' }}</td>
                                    <td>{{ $partnership->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="{{ route('admin.partnerships.show', $partnership) }}" class="btn btn-sm btn-primary">
                                                Voir
                                            </a>

                                            <a href="{{ route('admin.partnerships.edit', $partnership) }}" class="btn btn-sm btn-warning text-dark">
                                                Modifier
                                            </a>

                                            <form action="{{ route('admin.partnerships.destroy', $partnership) }}" method="POST" onsubmit="return confirm('Supprimer cette demande ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Aucune demande trouvée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $partnerships->links() }}
                </div>
            @else
                <p class="mb-0">Aucune demande de partenariat trouvée.</p>
            @endif
        </div>
    </div>
</div>
@endsection