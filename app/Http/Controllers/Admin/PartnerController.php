<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partnership::latest()->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'business_domain' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'proposal_description' => 'required|string',
        ]);

        Partnership::create($validated);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partnership created successfully.');
    }

    public function show(string $id)
    {
        $partner = Partnership::findOrFail($id);
        return view('admin.partners.show', compact('partner'));
    }

    public function edit(string $id)
    {
        $partner = Partnership::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, string $id)
    {
        $partner = Partnership::findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'business_domain' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'proposal_description' => 'required|string',
        ]);

        $partner->update($validated);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partnership updated successfully.');
    }

    public function destroy(string $id)
    {
        $partner = Partnership::findOrFail($id);
        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partnership deleted successfully.');
    }
}