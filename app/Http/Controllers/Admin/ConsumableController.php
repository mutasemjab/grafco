<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consumable;
use Illuminate\Http\Request;



class ConsumableController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:consumable-index')->only('index');
        $this->middleware('permission:consumable-create')->only(['create','store']);
        $this->middleware('permission:consumable-edit')->only(['edit','update']);
        $this->middleware('permission:consumable-delete')->only('destroy');
    }

    public function index()
    {
        $items = Consumable::latest()->paginate(20);
        return view('admin.consumables.index', compact('items'));
    }

    public function create()
    {
        return view('admin.consumables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'key_features_en' => 'nullable|array',
            'key_features_en.*' => 'nullable|string',
            'key_features_ar' => 'nullable|array',
            'key_features_ar.*' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $filename = uploadImage('assets/admin/uploads', $request->photo);

        // Filter out empty key features
        $keyFeaturesEn = $request->key_features_en ? array_filter($request->key_features_en) : null;
        $keyFeaturesAr = $request->key_features_ar ? array_filter($request->key_features_ar) : null;

        Consumable::create([
            'photo' => $filename,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'key_features_en' => $keyFeaturesEn,
            'key_features_ar' => $keyFeaturesAr,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('consumables.index')->with('success', __('messages.created_success'));
    }

    public function edit(Consumable $consumable)
    {
        $item = $consumable;
        return view('admin.consumables.edit', compact('item'));
    }

    public function update(Request $request, Consumable $consumable)
    {
        $request->validate([
            'photo' => 'nullable|image',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'key_features_en' => 'nullable|array',
            'key_features_en.*' => 'nullable|string',
            'key_features_ar' => 'nullable|array',
            'key_features_ar.*' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $filename = $consumable->photo;
        if($request->hasFile('photo')){
            $filename = uploadImage('assets/admin/uploads', $request->photo);
        }

        // Filter out empty key features
        $keyFeaturesEn = $request->key_features_en ? array_filter($request->key_features_en) : null;
        $keyFeaturesAr = $request->key_features_ar ? array_filter($request->key_features_ar) : null;

        $consumable->update([
            'photo' => $filename,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'key_features_en' => $keyFeaturesEn,
            'key_features_ar' => $keyFeaturesAr,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('consumables.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(Consumable $consumable)
    {
        $consumable->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}
