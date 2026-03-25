<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Storage;

class CareerApplicationController extends Controller
{
    public function index()
    {
        $applications = CareerApplication::with('career')
            ->latest()
            ->paginate(15);

        return view('admin.applications.index', compact('applications'));
    }

    public function byCareer(Career $career)
    {
        $applications = CareerApplication::with('career')
            ->where('career_id', $career->id)
            ->latest()
            ->paginate(15);

        return view('admin.applications.by-career', compact('career', 'applications'));
    }

    public function show(CareerApplication $application)
    {
        $application->load('career');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(CareerApplication $application)
    {
        if ($application->cv && Storage::disk('public')->exists($application->cv)) {
            Storage::disk('public')->delete($application->cv);
        }

        $application->delete();

        return redirect()->back()->with('success', 'Candidature supprimée avec succès.');
    }
}