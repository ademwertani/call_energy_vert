<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:4096',
            'language' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'missions' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'contract_type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('careers', 'public');
        }

        Career::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . uniqid()),
            'image' => $imagePath,
            'language' => $request->language,
            'short_description' => $request->short_description,
            'missions' => $request->missions,
            'requirements' => $request->requirements,
            'location' => $request->location,
            'contract_type' => $request->contract_type,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Poste ajouté avec succès.');
    }

    public function show(Career $career)
    {
        return redirect()->route('admin.careers.edit', $career->id);
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:4096',
            'language' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'missions' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'contract_type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $imagePath = $career->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('careers', 'public');
        }

        $career->update([
            'title' => $request->title,
            'image' => $imagePath,
            'language' => $request->language,
            'short_description' => $request->short_description,
            'missions' => $request->missions,
            'requirements' => $request->requirements,
            'location' => $request->location,
            'contract_type' => $request->contract_type,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Poste modifié avec succès.');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Poste supprimé avec succès.');
    }
}