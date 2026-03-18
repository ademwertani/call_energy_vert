@extends('layouts.admin')

@section('title', 'Edit Partnership')

@section('content')
<h2 class="mb-4">Edit Partnership</h2>

<form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">
    @csrf
    @method('PUT')

    @include('admin.partners._form')

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Update
        </button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection