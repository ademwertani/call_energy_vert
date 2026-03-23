<div class="mb-3">
    <label class="form-label">Titre du poste</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $career->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($career->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $career->image) }}" width="120" style="border-radius:10px;">
        </div>
    @endif
</div>
<div class="form-check mb-4">
    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
        {{ old('is_active', $career->is_active ?? 1) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">
        Poste actif
    </label>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Langue</label>
        <input type="text" name="language" class="form-control" value="{{ old('language', $career->language ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Lieu</label>
        <input type="text" name="location" class="form-control" value="{{ old('location', $career->location ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Type de contrat</label>
        <input type="text" name="contract_type" class="form-control" value="{{ old('contract_type', $career->contract_type ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Ordre d'affichage</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $career->sort_order ?? 0) }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Petite description</label>
    <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $career->short_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Missions</label>
    <textarea name="missions" class="form-control" rows="6">{{ old('missions', $career->missions ?? '') }}</textarea>
    <small class="text-muted">Une mission par ligne</small>
</div>

<div class="mb-3">
    <label class="form-label">Exigences</label>
    <textarea name="requirements" class="form-control" rows="6">{{ old('requirements', $career->requirements ?? '') }}</textarea>
    <small class="text-muted">Une exigence par ligne</small>
</div>

<div class="form-check mb-4">
    <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
           {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">
        Poste actif
    </label>
</div>

<button type="submit" class="btn btn-success">Enregistrer</button>
<a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">Retour</a>