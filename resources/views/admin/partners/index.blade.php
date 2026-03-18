@extends('layouts.admin')

@section('title', 'Partnerships')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Partnerships</h2>
    <a href="{{ route('admin.partners.create') }}" class="btn btn-success">
        <i class="fas fa-plus me-2"></i>Add Partnership
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle" id="table">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Company</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Business Domain</th>
                <th>Service Type</th>
                <th>Date</th>
                <th style="width:220px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partners as $partner)
                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->company_name }}</td>
                    <td>{{ $partner->contact_name }}</td>
                    <td>{{ $partner->email }}</td>
                    <td>{{ $partner->phone ?? '-' }}</td>
                    <td>{{ $partner->business_domain ?? '-' }}</td>
                    <td>{{ $partner->service_type ?? '-' }}</td>
                    <td>{{ $partner->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Supprimer ce partenariat ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No partnerships found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $partners->links() }}
</div>
@endsection