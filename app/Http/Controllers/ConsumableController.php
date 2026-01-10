<?php

namespace App\Http\Controllers;
use App\Models\Consumable;
use App\Models\ConsumableProduct;
use App\Models\Setting;

class ConsumableController extends Controller
{
    public function index()
    {
        // Get consumables grouped by type with only active products
        $offsetConsumables = Consumable::with(['products' => function($query) {
                $query->where('is_active', true);
            }])
            ->where('type', 'offset')
            ->orderBy('order')
            ->get();
        
        $digitalConsumables = Consumable::with(['products' => function($query) {
                $query->where('is_active', true);
            }])
            ->where('type', 'digital')
            ->orderBy('order')
            ->get();
        
        $locale = app()->getLocale();
        $setting = Setting::first();
        
        return view('user.consumable', compact('offsetConsumables', 'digitalConsumables', 'locale', 'setting'));
    }
   

    public function show($id)
    {
        // Find active product only
        $product = ConsumableProduct::with('consumable')
            ->where('is_active', true)
            ->findOrFail($id);
            
        $consumables = Consumable::all();
        $locale = app()->getLocale();
        $setting = Setting::first();
        
        return view('user.product-consumable-details', compact('product', 'consumables','locale','setting'));
    }

}