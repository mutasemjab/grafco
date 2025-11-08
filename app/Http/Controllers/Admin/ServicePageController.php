<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use App\Models\ServicePage;
use Illuminate\Http\Request;



class ServicePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-page-index')->only('index');
        $this->middleware('permission:service-page-create')->only(['create','store']);
        $this->middleware('permission:service-page-edit')->only(['edit','update']);
        $this->middleware('permission:service-page-delete')->only('destroy');
    }

    public function index()
    {
        $items = ServicePage::withCount('sections')->orderBy('order')->paginate(20);
        return view('admin.service-pages.index', compact('items'));
    }

    public function create()
    {
        return view('admin.service-pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:service_pages,slug|max:255',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'subtitle_en' => 'nullable|string',
            'subtitle_ar' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        ServicePage::create($validated);

        return redirect()->route('service-pages.index')->with('success', __('messages.created_success'));
    }

    public function edit(ServicePage $servicePage)
    {
        $item = $servicePage;
        return view('admin.service-pages.edit', compact('item'));
    }

    public function update(Request $request, ServicePage $servicePage)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:service_pages,slug,' . $servicePage->id,
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'subtitle_en' => 'nullable|string',
            'subtitle_ar' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $servicePage->update($validated);

        return redirect()->route('service-pages.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(ServicePage $servicePage)
    {
        $servicePage->delete();
        return back()->with('success', __('messages.deleted_success'));
    }

    public function show(ServicePage $servicePage)
    {
        $item = $servicePage;
        $sections = $servicePage->sections()->orderBy('order')->get();
        return view('admin.service-pages.show', compact('item', 'sections'));
    }
}
