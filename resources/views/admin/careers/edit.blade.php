@extends('layouts.back')

@section('title', 'Modifier un poste')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Modifier un poste</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.careers._form')
            </form>
        </div>
    </div>
</div>
@endsection