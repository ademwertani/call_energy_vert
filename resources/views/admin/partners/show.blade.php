@extends('layouts.admin')

@section('title', 'Partnership Details')

@section('content')
<h2 class="mb-4">Partnership Details</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Company Name:</strong>
                <div>{{ $partner->company_name }}</div>
            </div>
            <div class="col-md-6">
                <strong>Contact Name:</strong>
                <div>{{ $partner->contact_name }}</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Email:</strong>
                <div>{{ $partner->email }}</div>
            </div>
            <div class="col-md-6">
                <strong>Phone:</strong>
                <div>{{ $partner->phone ?? '-' }}</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Business Domain:</strong>
                <div>{{ $partner->business_domain ?? '-' }}</div>
            </div>
            <div class="col-md-6">
                <strong>Service Type:</strong>
                <div>{{ $partner->service_type ?? '-' }}</div>
            </div>
        </div>

        <div class="mb-3">
            <strong>Proposal Description:</strong>
            <div class="mt-2 p-3 bg-light rounded">
                {{ $partner->proposal_description }}
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
</div>
@endsection