<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Company Name</label>
        <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $partner->company_name ?? '') }}" required>
        @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Contact Name</label>
        <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name', $partner->contact_name ?? '') }}" required>
        @error('contact_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $partner->email ?? '') }}" required>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $partner->phone ?? '') }}">
        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Business Domain</label>
        <input type="text" name="business_domain" class="form-control" value="{{ old('business_domain', $partner->business_domain ?? '') }}">
        @error('business_domain') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Service Type</label>
        <input type="text" name="service_type" class="form-control" value="{{ old('service_type', $partner->service_type ?? '') }}">
        @error('service_type') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Proposal Description</label>
        <textarea name="proposal_description" rows="6" class="form-control" required>{{ old('proposal_description', $partner->proposal_description ?? '') }}</textarea>
        @error('proposal_description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
</div>