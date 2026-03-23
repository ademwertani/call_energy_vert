@extends('layouts.back')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="mb-0">Modifier la demande de partenariat</h1>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.partnerships.update', $partnership) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Entreprise</label>
                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $partnership->company_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nom du contact</label>
                    <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name', $partnership->contact_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $partnership->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $partnership->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Domaine d’activité</label>
                    <input type="text" name="business_domain" class="form-control" value="{{ old('business_domain', $partnership->business_domain) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Type de service</label>
                    <input type="text" name="service_type" class="form-control" value="{{ old('service_type', $partnership->service_type) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description de la proposition</label>
                    <textarea name="proposal_description" class="form-control" rows="6" required>{{ old('proposal_description', $partnership->proposal_description) }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.partnerships.index') }}" class="btn btn-secondary">
                        Retour
                    </a>

                    <button type="submit" class="btn btn-success">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection