<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ConsumableProduct;
use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumableProductController extends Controller
{
    public function index()
    {
        $items = ConsumableProduct::with('consumable')->latest()->paginate(20);
        return view('admin.consumable_products.index', compact('items'));
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
            'consumable_id' => 'required|exists:consumables,id',
            'photo' => 'required|image',
        ]);

        $data['photo'] = uploadImage('assets/admin/uploads', $request->photo);

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
            'consumable_id' => 'required|exists:consumables,id',
            'photo' => 'nullable|image',
        ]);

        if($request->hasFile('photo')){
            $data['photo'] = uploadImage('assets/admin/uploads', $request->photo);
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

