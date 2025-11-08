<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:brand-index')->only('index');
        $this->middleware('permission:brand-create')->only(['create','store']);
        $this->middleware('permission:brand-edit')->only(['edit','update']);
        $this->middleware('permission:brand-delete')->only('destroy');
    }

    public function index()
    {
        $brands = Brand::latest()->paginate(20);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'photo' => 'required|image',
        ]);

        $photoPath = uploadImage('assets/admin/uploads', $request->photo);

        Brand::create([
            'name'  => $request->name,
            'photo' => $photoPath
        ]);

        return redirect()->route('brands.index')->with('success', __('messages.created_success'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'  => 'required|string',
            'photo' => 'nullable|image',
        ]);

        $photoPath = $brand->photo;

        if($request->hasFile('photo')){
            $photoPath = uploadImage('assets/admin/uploads', $request->photo);
        }

        $brand->update([
            'name'  => $request->name,
            'photo' => $photoPath
        ]);

        return redirect()->route('brands.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}