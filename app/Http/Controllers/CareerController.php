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

    public function apply(Request $request, $id)
    {
        $career = Career::where('is_active', true)->findOrFail($id);

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'phone'     => ['nullable', 'string', 'max:50'],
            'cv'        => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:4096'],
            'message'   => ['nullable', 'string'],
        ]);

        $cvPath = null;

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('career-cv', 'public');
        }

        CareerApplication::create([
            'career_id' => $career->id,
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'cv'        => $cvPath,
            'message'   => $request->message,
            'status'    => 'new',
        ]);

        return redirect()
            ->route('carriere')
            ->with('career_success', 'Votre candidature a été envoyée avec succès.');
    }
}