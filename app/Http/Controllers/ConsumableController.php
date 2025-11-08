<?php

namespace App\Http\Controllers;
use App\Models\Consumable;
use App\Models\Setting;

class ConsumableController extends Controller
{
    public function index()
    {
        $consumables = Consumable::with('products')->orderBy('order')->get();
        $locale = app()->getLocale();
        $setting = Setting::first();
        
        return view('user.consumable', compact('consumables', 'locale', 'setting'));
    }
    
   


}