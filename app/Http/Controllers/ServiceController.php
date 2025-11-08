<?php

namespace App\Http\Controllers;
use App\Models\Consumable;
use App\Models\News;
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\Setting;

class ServiceController extends Controller
{
    public function index()
    {
        $servicePages = ServicePage::with('sections')->orderBy('order')->get();
        $locale = app()->getLocale();
        $setting = Setting::first();
        
        return view('user.service', compact('servicePages', 'locale', 'setting'));
    }

}