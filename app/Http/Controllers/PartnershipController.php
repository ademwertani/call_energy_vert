<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('partner', [
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
            ->route('contact.create')
            ->with('partner_success', 'Votre demande de partenariat a bien été envoyée.');
    }
}