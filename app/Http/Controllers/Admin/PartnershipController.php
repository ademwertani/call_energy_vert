<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::latest()->paginate(10);

        return view('admin.partnerships.index', compact('partnerships'));
    }

    public function show(Partnership $partnership)
    {
        return view('admin.partnerships.show', compact('partnership'));
    }

    public function edit(Partnership $partnership)
    {
        return view('admin.partnerships.edit', compact('partnership'));
    }

    public function update(Request $request, Partnership $partnership)
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

        $partnership->update($validated);

        return redirect()
            ->route('admin.partnerships.index')
            ->with('success', 'Demande de partenariat modifiée avec succès.');
    }

    public function destroy(Partnership $partnership)
    {
        $partnership->delete();

        return redirect()
            ->route('admin.partnerships.index')
            ->with('success', 'Demande de partenariat supprimée avec succès.');
    }
}