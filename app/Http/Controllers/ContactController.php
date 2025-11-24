<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        $setting = Setting::first();
        $brands = Brand::get();
        
        return view('user.contact', compact('locale', 'setting','brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:sales_call,technical_issue',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company_name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'message' => 'required|string',
            'agree' => 'required|accepted',
        ]);

        Contact::create($validated);

        return back()->with('contact_success', __('front.contact_success_message'));
    }
}