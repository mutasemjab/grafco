<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-index')->only('index');
        $this->middleware('permission:service-create')->only(['create','store']);
        $this->middleware('permission:service-edit')->only(['edit','update']);
        $this->middleware('permission:service-delete')->only('destroy');
    }

    public function index()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'icon' => 'required|image',
        ]);

        $icon = uploadImage('assets/admin/uploads', $request->icon);

        Service::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'icon' => $icon,
        ]);

        return redirect()->route('services.index')->with('success', __('messages.created_success'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'icon' => 'nullable|image',
        ]);

        $icon = $service->icon;
        if($request->hasFile('icon')){
            $icon = uploadImage('assets/admin/uploads', $request->icon);
        }

        $service->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'icon' => $icon,
        ]);

        return redirect()->route('services.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}
