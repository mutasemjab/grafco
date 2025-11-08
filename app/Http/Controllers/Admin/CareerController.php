<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\AvailablePosition;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:career-index')->only('index');
        $this->middleware('permission:career-create')->only(['create','store']);
        $this->middleware('permission:career-edit')->only(['edit','update']);
        $this->middleware('permission:career-delete')->only('destroy');

        $this->middleware('permission:position-create')->only('storePosition');
        $this->middleware('permission:position-edit')->only('updatePosition');
        $this->middleware('permission:position-delete')->only('destroyPosition');
    }

    public function index()
    {
        $items = Career::latest()->paginate(20);
        return view('admin.careers.index',compact('items'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'bottom_name_en'=>'required',
            'bottom_name_ar'=>'required',
            'bottom_description_en'=>'required',
            'bottom_description_ar'=>'required',
        ]);

        Career::create($request->all());

        return redirect()->route('careers.index')->with('success', __('messages.created_success'));
    }

    public function edit(Career $career)
    {
        $item = $career;
        return view('admin.careers.edit',compact('item'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'bottom_name_en'=>'required',
            'bottom_name_ar'=>'required',
            'bottom_description_en'=>'required',
            'bottom_description_ar'=>'required',
        ]);

        $career->update($request->all());
        return redirect()->route('careers.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return back()->with('success', __('messages.deleted_success'));
    }

    // ======== Available Positions inside Career ========
    public function storePosition(Request $request, Career $career)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'photo'=>'required|image'
        ]);

        $path = uploadImage('assets/admin/uploads', $request->photo);

        $career->positions()->create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'photo'=>$path
        ]);

        return back()->with('success', __('messages.created_success'));
    }

    public function updatePosition(Request $request, AvailablePosition $position)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'photo'=>'nullable|image'
        ]);

        $path = $position->photo;
        if($request->hasFile('photo')){
            $path = uploadImage('assets/admin/uploads', $request->photo);
        }

        $position->update([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'photo'=>$path
        ]);

        return back()->with('success', __('messages.updated_success'));
    }

    public function destroyPosition(AvailablePosition $position)
    {
        $position->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}
