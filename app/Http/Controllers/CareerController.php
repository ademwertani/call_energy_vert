<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('pages.carriere', compact('careers'));
    }

    public function show(Career $career)
    {
        abort_unless($career->is_active, 404);

        return view('pages.carriere-show', compact('career'));
    }

    public function apply(Request $request, Career $career)
    {
        abort_unless($career->is_active, 404);

        $request->validate([
            'full_name'              => ['required', 'string', 'max:255'],
            'email'                  => ['required', 'email', 'max:255'],
            'phone'                  => ['nullable', 'string', 'max:50'],
            'cv'                     => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:4096'],
            'message'                => ['nullable', 'string'],
            'experience_level'       => ['nullable', 'string', 'max:100'],
            'immediate_availability' => ['nullable', 'in:Oui,Non'],
        ]);

        $cvPath = null;

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('career-cv', 'public');
        }

        CareerApplication::create([
            'career_id'              => $career->id,
            'full_name'              => $request->full_name,
            'email'                  => $request->email,
            'phone'                  => $request->phone,
            'cv'                     => $cvPath,
            'message'                => $request->message,
            'experience_level'       => $request->experience_level,
            'immediate_availability' => $request->immediate_availability,
            'status'                 => 'new',
        ]);

        return redirect()
            ->route('carriere.show', $career->id)
            ->with('career_success', 'Votre candidature a été envoyée avec succès.');
    }
}