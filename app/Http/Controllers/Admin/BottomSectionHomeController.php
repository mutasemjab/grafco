<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BottomSectionHome;
use Illuminate\Http\Request;

class BottomSectionHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bottomSectionHome-index')->only('index');
        $this->middleware('permission:bottomSectionHome-create')->only(['create','store']);
        $this->middleware('permission:bottomSectionHome-edit')->only(['edit','update']);
        $this->middleware('permission:bottomSectionHome-delete')->only('destroy');
    }

    public function index()
    {
        $items = BottomSectionHome::latest()->paginate(20);
        return view('admin.bottomSectionHomes.index', compact('items'));
    }

    public function create()
    {
        return view('admin.bottomSectionHomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'short_description_en' => 'required',
            'short_description_ar' => 'required',
            'tall_description_en' => 'required',
            'tall_description_ar' => 'required',
            'photo' => 'required|image',
        ]);

        $photo = uploadImage('assets/admin/uploads', $request->photo);

        BottomSectionHome::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'short_description_en' => $request->short_description_en,
            'short_description_ar' => $request->short_description_ar,
            'tall_description_en' => $request->tall_description_en,
            'tall_description_ar' => $request->tall_description_ar,
            'photo' => $photo,
        ]);

        return redirect()->route('bottomSectionHomes.index')->with('success', __('messages.created_success'));
    }

    public function edit(BottomSectionHome $bottomSectionHome)
    {
        $item = $bottomSectionHome;
        return view('admin.bottomSectionHomes.edit', compact('item'));
    }

    public function update(Request $request, BottomSectionHome $bottomSectionHome)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'short_description_en' => 'required',
            'short_description_ar' => 'required',
            'tall_description_en' => 'required',
            'tall_description_ar' => 'required',
            'photo' => 'nullable|image',
        ]);

        $photo = $bottomSectionHome->photo;
        if($request->hasFile('photo')){
            $photo = uploadImage('assets/admin/uploads', $request->photo);
        }

        $bottomSectionHome->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'short_description_en' => $request->short_description_en,
            'short_description_ar' => $request->short_description_ar,
            'tall_description_en' => $request->tall_description_en,
            'tall_description_ar' => $request->tall_description_ar,
            'photo' => $photo,
        ]);

        return redirect()->route('bottomSectionHomes.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(BottomSectionHome $bottomSectionHome)
    {
        $bottomSectionHome->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}
