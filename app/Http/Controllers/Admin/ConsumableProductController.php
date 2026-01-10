<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsumableProduct;
use App\Models\Consumable;
use App\Models\ConsumableProductDownload;
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

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
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
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'key_features_en' => 'nullable|array',
            'key_features_ar' => 'nullable|array',
            'consumable_id' => 'required|exists:consumables,id',
            'photo' => 'required|image',
            'is_active' => 'boolean',

            // Downloads
            'downloads.*.title_en' => 'nullable|string',
            'downloads.*.title_ar' => 'nullable|string',
            'downloads.*.file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'downloads.*.updated_date' => 'nullable|date',
            'downloads.*.sort_order' => 'nullable|integer',
        ]);

        // Prepare data
        $data = [
            'name_en' => $validated['name_en'],
            'name_ar' => $validated['name_ar'],
            'description_en' => $validated['description_en'],
            'description_ar' => $validated['description_ar'],
            'consumable_id' => $validated['consumable_id'],
            'is_active' => $validated['is_active'] ?? true,
        ];

        // Handle photo upload
        $data['photo'] = uploadImage('assets/admin/uploads', $request->photo);
        
        // Convert key_features to JSON
        if (isset($validated['key_features_en'])) {
            $data['key_features_en'] = json_encode(array_filter($validated['key_features_en']));
        }
        if (isset($validated['key_features_ar'])) {
            $data['key_features_ar'] = json_encode(array_filter($validated['key_features_ar']));
        }

        $consumableProduct = ConsumableProduct::create($data);

        // Save Downloads
        if ($request->has('downloads')) {
            foreach ($request->downloads as $index => $download) {
                if (!empty($download['title_en']) && $request->hasFile("downloads.$index.file")) {
                    $file = $request->file("downloads.$index.file");

                    // Upload file
                    $filePath = uploadImage('assets/admin/uploads/downloads', $file);

                    $consumableProduct->downloads()->create([
                        'title_en' => $download['title_en'],
                        'title_ar' => $download['title_ar'] ?? $download['title_en'],
                        'file_path' => $filePath,
                        'file_type' => strtoupper($file->getClientOriginalExtension()),
                        'file_size' => null,
                        'updated_date' => $download['updated_date'] ?? now(),
                        'sort_order' => $download['sort_order'] ?? $index,
                    ]);
                }
            }
        }

        return redirect()->route('consumable_products.index')->with('success', __('saved_successfully'));
    }

    public function edit($id)
    {
        $item = ConsumableProduct::with('downloads')->findOrFail($id);
        $consumables = Consumable::all();
        return view('admin.consumable_products.edit', compact('item', 'consumables'));
    }

    public function update(Request $request, $id)
    {
        $item = ConsumableProduct::findOrFail($id);

        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'key_features_en' => 'nullable|array',
            'key_features_ar' => 'nullable|array',
            'consumable_id' => 'required|exists:consumables,id',
            'photo' => 'nullable|image',
            'is_active' => 'boolean',

            // Downloads
            'downloads.*.id' => 'nullable|exists:consumable_product_downloads,id',
            'downloads.*.title_en' => 'nullable|string',
            'downloads.*.title_ar' => 'nullable|string',
            'downloads.*.file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'downloads.*.updated_date' => 'nullable|date',
            'downloads.*.sort_order' => 'nullable|integer',
            'deleted_downloads' => 'nullable|string',
        ]);

        // Prepare data
        $data = [
            'name_en' => $validated['name_en'],
            'name_ar' => $validated['name_ar'],
            'description_en' => $validated['description_en'],
            'description_ar' => $validated['description_ar'],
            'consumable_id' => $validated['consumable_id'],
            'is_active' => $request->has('is_active') ? true : false,
        ];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($item->photo) {
                $oldPath = base_path('assets/admin/uploads/' . $item->photo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $data['photo'] = uploadImage('assets/admin/uploads', $request->photo);
        }

        // Convert key_features to JSON
        if (isset($validated['key_features_en'])) {
            $data['key_features_en'] = json_encode(array_filter($validated['key_features_en']));
        }
        if (isset($validated['key_features_ar'])) {
            $data['key_features_ar'] = json_encode(array_filter($validated['key_features_ar']));
        }

        $item->update($data);

        // Handle deleted downloads
        if ($request->filled('deleted_downloads')) {
            $deletedIds = explode(',', $request->deleted_downloads);
            $downloads = ConsumableProductDownload::whereIn('id', $deletedIds)->get();
            foreach ($downloads as $download) {
                // Delete file
                if ($download->file_path) {
                    $filePath = base_path('assets/admin/uploads/downloads/' . $download->file_path);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            ConsumableProductDownload::whereIn('id', $deletedIds)->delete();
        }

        // Update or create downloads
        if ($request->has('downloads')) {
            foreach ($request->downloads as $index => $downloadData) {
                if (!empty($downloadData['title_en'])) {
                    $data = [
                        'title_en' => $downloadData['title_en'],
                        'title_ar' => $downloadData['title_ar'] ?? $downloadData['title_en'],
                        'updated_date' => $downloadData['updated_date'] ?? now(),
                        'sort_order' => $downloadData['sort_order'] ?? $index,
                    ];

                    // Handle file upload
                    if ($request->hasFile("downloads.$index.file")) {
                        $file = $request->file("downloads.$index.file");

                        // If updating existing, delete old file
                        if (!empty($downloadData['id'])) {
                            $oldDownload = ConsumableProductDownload::find($downloadData['id']);
                            if ($oldDownload && $oldDownload->file_path) {
                                $oldPath = base_path('assets/admin/uploads/downloads/' . $oldDownload->file_path);
                                if (file_exists($oldPath)) {
                                    unlink($oldPath);
                                }
                            }
                        }

                        $filePath = uploadImage('assets/admin/uploads/downloads', $file);
                        $data['file_path'] = $filePath;
                        $data['file_type'] = strtoupper($file->getClientOriginalExtension());
                        $data['file_size'] = null;
                    }

                    if (!empty($downloadData['id'])) {
                        // Update existing
                        ConsumableProductDownload::where('id', $downloadData['id'])->update($data);
                    } else {
                        // Create new (only if file is provided)
                        if ($request->hasFile("downloads.$index.file")) {
                            $item->downloads()->create($data);
                        }
                    }
                }
            }
        }

        return redirect()->route('consumable_products.index')->with('success', __('updated_successfully'));
    }

    public function destroy($id)
    {
        $item = ConsumableProduct::findOrFail($id);

        // Delete photo
        if ($item->photo) {
            $filePath = base_path('assets/admin/uploads/' . $item->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete download files
        foreach ($item->downloads as $download) {
            if ($download->file_path) {
                $filePath = base_path('assets/admin/uploads/downloads/' . $download->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $item->delete();

        return redirect()->route('consumable_products.index')->with('success', __('deleted_successfully'));
    }
}