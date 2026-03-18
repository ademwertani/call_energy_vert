<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $heroBannerImg = optional(Banner::query()->orderByDesc('id')->first())->image;
        $heroBannerImg = $heroBannerImg
            ? asset('storage/' . ltrim($heroBannerImg, '/'))
            : asset('img/contact-hero.png');

        return view('contact.create', compact('heroBannerImg'));
    }

    public function store(Request $request)
    {
        $validated = $request->validateWithBag('offer', [
            'company_name'    => ['required', 'string', 'max:255'],
            'contact_name'    => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255'],
            'phone'           => ['nullable', 'string', 'max:255'],
            'activity_sector' => ['nullable', 'string', 'max:255'],
            'service_type'    => ['nullable', 'string', 'max:255'],
            'hear_about_us'   => ['nullable', 'string', 'max:255'],
            'message'         => ['required', 'string'],
        ]);

        Contact::create($validated);

        return redirect()
            ->back()
            ->with('offer_success', 'Votre demande a été envoyée avec succès !');
    }
}