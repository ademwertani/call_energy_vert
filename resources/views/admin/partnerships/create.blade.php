@extends('layouts.back')

@section('title', 'Create Partnership')

@section('content')
<h2 class="mb-4">Create Partnership</h2>

<form action="{{ route('admin.partners.store') }}" method="POST">
    @csrf
    @include('admin.partners._form')

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>Save
        </button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection