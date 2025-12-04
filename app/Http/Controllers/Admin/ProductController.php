<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductDownload;
use App\Models\ProductFeature;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-index', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name_en', 'LIKE', "%{$search}%")
                ->orWhere('name_ar', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhereHas('brand', function($q) use ($search) {
                    $q->where('name_en', 'LIKE', "%{$search}%")
                        ->orWhere('name_ar', 'LIKE', "%{$search}%");
                });
            });
        }

        // Filter by Category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by Brand
        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        // Filter by Featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured);
        }

        // Filter by Price Display
        if ($request->filled('price_display')) {
            $query->where('show_price', $request->price_display);
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortOrder = $request->get('sort_order', 'asc');
        
        if ($sortBy === 'name') {
            $query->orderBy('name_en', $sortOrder);
        } elseif ($sortBy === 'price') {
            $query->orderBy('price', $sortOrder);
        } elseif ($sortBy === 'created_at') {
            $query->orderBy('created_at', $sortOrder);
        } else {
            $query->orderBy('sort_order', 'asc');
        }

        $products = $query->paginate(20)->withQueryString();

        // Get filter options
        $categories = \App\Models\Category::where('is_active', true)
            ->orderBy('name_en')
            ->get();
        
        $brands = \App\Models\Brand::get();

        return view('admin.products.index', compact('products', 'categories', 'brands'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)
            ->where('parent_id','!=',null)
            ->get();

        $brands = Brand::get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug',
            'subtitle_en' => 'nullable|string',
            'subtitle_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'model' => 'nullable|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'price' => 'nullable|numeric|min:0',
            'show_price' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sort_order' => 'integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',

            // Features
            'features.*.feature_en' => 'nullable|string',
            'features.*.feature_ar' => 'nullable|string',
            'features.*.sort_order' => 'nullable|integer',

            // Specifications
            'specifications.*.label_en' => 'nullable|string',
            'specifications.*.label_ar' => 'nullable|string',
            'specifications.*.value_en' => 'nullable|string',
            'specifications.*.value_ar' => 'nullable|string',
            'specifications.*.sort_order' => 'nullable|integer',

            // Downloads
            'downloads.*.title_en' => 'nullable|string',
            'downloads.*.title_ar' => 'nullable|string',
            'downloads.*.file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'downloads.*.updated_date' => 'nullable|date',
            'downloads.*.sort_order' => 'nullable|integer',
        ]);

        // Extract only product-related data (exclude nested arrays)
        $productData = [
            'name_en' => $validated['name_en'],
            'name_ar' => $validated['name_ar'],
            'slug' => $validated['slug'] ?? Str::slug($validated['name_en']),
            'subtitle_en' => $validated['subtitle_en'] ?? null,
            'subtitle_ar' => $validated['subtitle_ar'] ?? null,
            'description_en' => $validated['description_en'] ?? null,
            'description_ar' => $validated['description_ar'] ?? null,
            'model' => $validated['model'] ?? null,
            'price' => $validated['price'] ?? null,
            'show_price' => $validated['show_price'] ?? false,
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_featured' => $validated['is_featured'] ?? false,
            'is_active' => $validated['is_active'] ?? true,
        ];

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $productData['main_image'] = uploadImage('assets/admin/uploads', $request->main_image);
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $productData['thumbnail'] = uploadImage('assets/admin/uploads', $request->thumbnail);
        }

        $product = Product::create($productData);

        // Save Features
        if ($request->has('features')) {
            foreach ($request->features as $index => $feature) {
                if (!empty($feature['feature_en']) && !empty($feature['feature_ar'])) {
                    $product->features()->create([
                        'feature_en' => $feature['feature_en'],
                        'feature_ar' => $feature['feature_ar'],
                        'sort_order' => $feature['sort_order'] ?? $index,
                    ]);
                }
            }
        }

        // Save Specifications
        if ($request->has('specifications')) {
            foreach ($request->specifications as $index => $spec) {
                if (!empty($spec['label_en']) && !empty($spec['value_en'])) {
                    $product->specifications()->create([
                        'label_en' => $spec['label_en'],
                        'label_ar' => $spec['label_ar'] ?? $spec['label_en'],
                        'value_en' => $spec['value_en'],
                        'value_ar' => $spec['value_ar'] ?? $spec['value_en'],
                        'sort_order' => $spec['sort_order'] ?? $index,
                    ]);
                }
            }
        }

        // Save Downloads
        if ($request->has('downloads')) {
            foreach ($request->downloads as $index => $download) {
                if (!empty($download['title_en']) && $request->hasFile("downloads.$index.file")) {
                    $file = $request->file("downloads.$index.file");

                    // Upload file using the same method as images
                    $filePath = uploadImage('assets/admin/uploads/downloads', $file);

                    $product->downloads()->create([
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

        return redirect()->route('admin.products.index')
            ->with('success', __('messages.product_created_successfully'));
    }

    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)
            ->where('parent_id','!=',null)
            ->get();

        $brands = Brand::get();

        $product->load(['features', 'specifications', 'downloads']);

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug,' . $product->id,
            'subtitle_en' => 'nullable|string',
            'subtitle_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'model' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'price' => 'nullable|numeric|min:0',
            'show_price' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sort_order' => 'integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',

            // Features
            'features.*.id' => 'nullable|exists:product_features,id',
            'features.*.feature_en' => 'nullable|string',
            'features.*.feature_ar' => 'nullable|string',
            'features.*.sort_order' => 'nullable|integer',
            'deleted_features' => 'nullable|string',

            // Specifications
            'specifications.*.id' => 'nullable|exists:product_specifications,id',
            'specifications.*.label_en' => 'nullable|string',
            'specifications.*.label_ar' => 'nullable|string',
            'specifications.*.value_en' => 'nullable|string',
            'specifications.*.value_ar' => 'nullable|string',
            'specifications.*.sort_order' => 'nullable|integer',
            'deleted_specifications' => 'nullable|string',

            // Downloads
            'downloads.*.id' => 'nullable|exists:product_downloads,id',
            'downloads.*.title_en' => 'nullable|string',
            'downloads.*.title_ar' => 'nullable|string',
            'downloads.*.file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'downloads.*.updated_date' => 'nullable|date',
            'downloads.*.sort_order' => 'nullable|integer',
            'deleted_downloads' => 'nullable|string',
        ]);

        // Extract product data
        $productData = [
            'name_en' => $validated['name_en'],
            'name_ar' => $validated['name_ar'],
            'slug' => $validated['slug'] ?? Str::slug($validated['name_en']),
            'subtitle_en' => $validated['subtitle_en'] ?? null,
            'subtitle_ar' => $validated['subtitle_ar'] ?? null,
            'description_en' => $validated['description_en'] ?? null,
            'description_ar' => $validated['description_ar'] ?? null,
            'model' => $validated['model'] ?? null,
            'price' => $validated['price'] ?? null,
            'show_price' => $request->has('show_price') ? true : false,
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_featured' => $request->has('is_featured') ? true : false,
            'is_active' => $request->has('is_active') ? true : false,
        ];

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($product->main_image) {
                $oldPath = public_path('assets/admin/uploads/' . $product->main_image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $productData['main_image'] = uploadImage('assets/admin/uploads', $request->main_image);
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($product->thumbnail) {
                $oldPath = public_path('assets/admin/uploads/' . $product->thumbnail);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $productData['thumbnail'] = uploadImage('assets/admin/uploads', $request->thumbnail);
        }

        // Update product
        $product->update($productData);

        // Handle deleted features
        if ($request->filled('deleted_features')) {
            $deletedIds = explode(',', $request->deleted_features);
            ProductFeature::whereIn('id', $deletedIds)->delete();
        }

        // Update or create features
        if ($request->has('features')) {
            foreach ($request->features as $index => $featureData) {
                if (!empty($featureData['feature_en']) && !empty($featureData['feature_ar'])) {
                    if (!empty($featureData['id'])) {
                        // Update existing
                        ProductFeature::where('id', $featureData['id'])->update([
                            'feature_en' => $featureData['feature_en'],
                            'feature_ar' => $featureData['feature_ar'],
                            'sort_order' => $featureData['sort_order'] ?? $index,
                        ]);
                    } else {
                        // Create new
                        $product->features()->create([
                            'feature_en' => $featureData['feature_en'],
                            'feature_ar' => $featureData['feature_ar'],
                            'sort_order' => $featureData['sort_order'] ?? $index,
                        ]);
                    }
                }
            }
        }

        // Handle deleted specifications
        if ($request->filled('deleted_specifications')) {
            $deletedIds = explode(',', $request->deleted_specifications);
            ProductSpecification::whereIn('id', $deletedIds)->delete();
        }

        // Update or create specifications
        if ($request->has('specifications')) {
            foreach ($request->specifications as $index => $specData) {
                if (!empty($specData['label_en']) && !empty($specData['value_en'])) {
                    if (!empty($specData['id'])) {
                        // Update existing
                        ProductSpecification::where('id', $specData['id'])->update([
                            'label_en' => $specData['label_en'],
                            'label_ar' => $specData['label_ar'] ?? $specData['label_en'],
                            'value_en' => $specData['value_en'],
                            'value_ar' => $specData['value_ar'] ?? $specData['value_en'],
                            'sort_order' => $specData['sort_order'] ?? $index,
                        ]);
                    } else {
                        // Create new
                        $product->specifications()->create([
                            'label_en' => $specData['label_en'],
                            'label_ar' => $specData['label_ar'] ?? $specData['label_en'],
                            'value_en' => $specData['value_en'],
                            'value_ar' => $specData['value_ar'] ?? $specData['value_en'],
                            'sort_order' => $specData['sort_order'] ?? $index,
                        ]);
                    }
                }
            }
        }

        // Handle deleted downloads
        if ($request->filled('deleted_downloads')) {
            $deletedIds = explode(',', $request->deleted_downloads);
            $downloads = ProductDownload::whereIn('id', $deletedIds)->get();
            foreach ($downloads as $download) {
                // Delete file
                if ($download->file_path) {
                    $filePath = public_path('assets/admin/uploads/downloads/' . $download->file_path);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            ProductDownload::whereIn('id', $deletedIds)->delete();
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
                            $oldDownload = ProductDownload::find($downloadData['id']);
                            if ($oldDownload && $oldDownload->file_path) {
                                $oldPath = public_path('assets/admin/uploads/downloads/' . $oldDownload->file_path);
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
                        ProductDownload::where('id', $downloadData['id'])->update($data);
                    } else {
                        // Create new (only if file is provided)
                        if ($request->hasFile("downloads.$index.file")) {
                            $product->downloads()->create($data);
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', __('messages.product_updated_successfully'));
    }


    public function destroy(Product $product)
    {
        // Delete images
        if ($product->main_image) {
            $filePath = base_path('assets/admin/uploads/' . $product['main_image']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        if ($product->thumbnail) {
            $filePath = base_path('assets/admin/uploads/' . $product['thumbnail']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete download files
        foreach ($product->downloads as $download) {
            if ($download->file_path) {
                $filePath = base_path('assets/admin/uploads/downloads/' . $download->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', __('messages.product_deleted_successfully'));
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
