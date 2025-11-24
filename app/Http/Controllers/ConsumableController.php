<?php

namespace App\Http\Controllers;
use App\Models\Consumable;
use App\Models\ConsumableProduct;
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
    
   

      public function show($id)
    {
        $product = ConsumableProduct::with('consumable')->findOrFail($id);
        $consumables = Consumable::all();
        $locale = app()->getLocale();
        $setting = Setting::first();
        
        return view('user.product-consumable-details', compact('product', 'consumables','locale','setting'));
    }

}