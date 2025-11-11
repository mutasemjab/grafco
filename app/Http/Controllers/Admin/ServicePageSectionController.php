<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use App\Models\ServicePageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicePageSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-page-section-index')->only('index');
        $this->middleware('permission:service-page-section-create')->only(['create','store']);
        $this->middleware('permission:service-page-section-edit')->only(['edit','update']);
        $this->middleware('permission:service-page-section-delete')->only('destroy');
    }

    public function index()
    {
        $items = ServicePageSection::with('servicePage')->orderBy('order')->paginate(20);
        return view('admin.service-page-sections.index', compact('items'));
    }

    public function create()
    {
        $servicePages = ServicePage::orderBy('order')->get();
        return view('admin.service-page-sections.create', compact('servicePages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_page_id' => 'required|exists:service_pages,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'features_en' => 'nullable|array',
            'features_en.*' => 'nullable|string',
            'features_ar' => 'nullable|array',
            'features_ar.*' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $filename = uploadImage('assets/admin/uploads', $request->photo);

        // Filter out empty features
        $featuresEn = $request->features_en ? array_filter($request->features_en) : null;
        $featuresAr = $request->features_ar ? array_filter($request->features_ar) : null;

        ServicePageSection::create([
            'service_page_id' => $request->service_page_id,
            'photo' => $filename,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'features_en' => $featuresEn,
            'features_ar' => $featuresAr,
            'image_right' => $request->has('image_right'),
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('service-page-sections.index')->with('success', __('messages.created_success'));
    }

    public function edit(ServicePageSection $servicePageSection)
    {
        $item = $servicePageSection;
        $servicePages = ServicePage::orderBy('order')->get();
        return view('admin.service-page-sections.edit', compact('item', 'servicePages'));
    }

    public function update(Request $request, ServicePageSection $servicePageSection)
    {
        $validated = $request->validate([
            'service_page_id' => 'required|exists:service_pages,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'features_en' => 'nullable|array',
            'features_en.*' => 'nullable|string',
            'features_ar' => 'nullable|array',
            'features_ar.*' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $filename = $servicePageSection->photo;
        if($request->hasFile('photo')){
            $filename = uploadImage('assets/admin/uploads', $request->photo);
        }

        // Filter out empty features
        $featuresEn = $request->features_en ? array_filter($request->features_en) : null;
        $featuresAr = $request->features_ar ? array_filter($request->features_ar) : null;

        $servicePageSection->update([
            'service_page_id' => $request->service_page_id,
            'photo' => $filename,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'features_en' => $featuresEn,
            'features_ar' => $featuresAr,
            'image_right' => $request->has('image_right'),
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('service-page-sections.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(ServicePageSection $servicePageSection)
    {
        $servicePageSection->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}