<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:100',
            'message' => 'nullable|string',
            'agree_privacy' => 'required|accepted',
        ]);

        Appointment::create($validated);

        return back()->with('appointment_success', __('front.appointment_success_message'));
    }
}