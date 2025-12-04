<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ConsumableProduct;
use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumableProductController extends Controller
{
   public function index(Request $request)
    {
        $query = ConsumableProduct::with('consumable');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name_en', 'LIKE', "%{$search}%")
                ->orWhere('name_ar', 'LIKE', "%{$search}%")
                ->orWhereHas('consumable', function($q) use ($search) {
                    $q->where('name_en', 'LIKE', "%{$search}%")
                        ->orWhere('name_ar', 'LIKE', "%{$search}%");
                });
            });
        }

        // Filter by Consumable
        if ($request->filled('consumable')) {
            $query->where('consumable_id', $request->consumable);
        }

        // Filter by Type (from parent consumable)
        if ($request->filled('type')) {
            $query->whereHas('consumable', function($q) use ($request) {
                $q->where('type', $request->type);
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        if ($sortBy === 'name') {
            $query->orderBy('name_en', $sortOrder);
        } elseif ($sortBy === 'consumable') {
            $query->join('consumables', 'consumable_products.consumable_id', '=', 'consumables.id')
                ->orderBy('consumables.name_en', $sortOrder)
                ->select('consumable_products.*');
        } else {
            $query->orderBy('created_at', $sortOrder);
        }

        $items = $query->paginate(20)->withQueryString();

        // Get filter options
        $consumables = \App\Models\Consumable::orderBy('name_en')->get();

        return view('admin.consumable_products.index', compact('items', 'consumables'));
    }

    public function create()
    {
        $consumables = Consumable::all();
        return view('admin.consumable_products.create', compact('consumables'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'key_features_en' => 'nullable|array',
            'key_features_ar' => 'nullable|array',
            'consumable_id' => 'required|exists:consumables,id',
            'photo' => 'required|image',
        ]);

        $data['photo'] = uploadImage('assets/admin/uploads', $request->photo);
        
        // Convert key_features to JSON
        if (isset($data['key_features_en'])) {
            $data['key_features_en'] = json_encode(array_filter($data['key_features_en']));
        }
        if (isset($data['key_features_ar'])) {
            $data['key_features_ar'] = json_encode(array_filter($data['key_features_ar']));
        }

        ConsumableProduct::create($data);

        return redirect()->route('consumable_products.index')->with('success', __('saved_successfully'));
    }

    public function edit($id)
    {
        $item = ConsumableProduct::findOrFail($id);
        $consumables = Consumable::all();
        return view('admin.consumable_products.edit', compact('item', 'consumables'));
    }

    public function update(Request $request, $id)
    {
        $item = ConsumableProduct::findOrFail($id);

        $data = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'key_features_en' => 'nullable|array',
            'key_features_ar' => 'nullable|array',
            'consumable_id' => 'required|exists:consumables,id',
            'photo' => 'nullable|image',
        ]);

        if($request->hasFile('photo')){
            $data['photo'] = uploadImage('assets/admin/uploads', $request->photo);
        }

        // Convert key_features to JSON
        if (isset($data['key_features_en'])) {
            $data['key_features_en'] = json_encode(array_filter($data['key_features_en']));
        }
        if (isset($data['key_features_ar'])) {
            $data['key_features_ar'] = json_encode(array_filter($data['key_features_ar']));
        }

        $item->update($data);

        return redirect()->route('consumable_products.index')->with('success', __('updated_successfully'));
    }

    public function destroy($id)
    {
        ConsumableProduct::destroy($id);
        return redirect()->route('consumable_products.index')->with('success', __('deleted_successfully'));
    }
}