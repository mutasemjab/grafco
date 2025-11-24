<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\AvailablePosition;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $career = Career::with('availablePositions')->first();
        $positions = AvailablePosition::with('career')->get();
        
        return view('user.career', compact('career', 'positions'));
    }

    public function apply(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'position_name' => 'required|string',
            'position_id' => 'nullable|exists:available_positions,id',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
            'cover_letter' => 'nullable|string',
        ]);

        // Handle CV upload
        if ($request->hasFile('cv')) {
            $cvPath = uploadImage('assets/admin/uploads/cvs', $request->file('cv'));
            $validated['cv_path'] = $cvPath;
        }

        // Create job application record
        JobApplication::create($validated);

        return redirect()->back()->with('success', __('front.application_submitted_success'));
    }
}