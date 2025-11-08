<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
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

    public function index()
    {
        $products = Product::with(['category', 'brand'])
            ->orderBy('sort_order')
            ->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
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
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
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

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name_en']);

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = uploadImage('assets/admin/uploads', $request->main_image);
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = uploadImage('assets/admin/uploads', $request->thumbnail);
        }

        $product = Product::create($validated);

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
                        'file_size' => $this->formatBytes($file->getSize()),
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
            ->orderBy('sort_order')
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
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'price' => 'nullable|numeric|min:0',
            'show_price' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sort_order' => 'integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name_en']);

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $filePath = base_path('assets/admin/uploads/' . $product['main_image']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $validated['main_image'] = uploadImage('assets/admin/uploads', $request->main_image);
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $filePath = base_path('assets/admin/uploads/' . $product['thumbnail']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $validated['thumbnail'] = uploadImage('assets/admin/uploads', $request->thumbnail);
        }

        $product->update($validated);

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
