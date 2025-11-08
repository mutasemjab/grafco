<?php

namespace App\Http\Controllers;

use App\Models\PartsRequest;
use Illuminate\Http\Request;

class PartsRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'equipment_model' => 'nullable|string|max:255',
            'parts_needed' => 'required|string',
            'agree_privacy' => 'required|accepted',
        ]);

        PartsRequest::create($validated);

        return back()->with('parts_success', __('front.parts_request_success_message'));
    }
}