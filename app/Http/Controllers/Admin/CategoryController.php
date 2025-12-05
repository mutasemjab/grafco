<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-index', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

   public function index(Request $request)
    {
        $query = Category::with(['parent', 'children', 'brands'])
            ->orderBy('sort_order');
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                ->orWhere('name_ar', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%");
            });
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }
        
        // Filter by parent category
        if ($request->filled('parent_id')) {
            if ($request->parent_id == 'main') {
                $query->whereNull('parent_id');
            } else {
                $query->where('parent_id', $request->parent_id);
            }
        }
        
        $categories = $query->get();
        $parentCategories = Category::whereNull('parent_id')->get();
        
        return view('admin.categories.index', compact('categories', 'parentCategories'));
    }

    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();
        
        $brands = Brand::get();
        
        return view('admin.categories.create', compact('parentCategories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'brands' => 'nullable|array',
            'brands.*' => 'exists:brands,id'
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name_en']);

        // extract brands first
        $brands = $validated['brands'] ?? [];
        unset($validated['brands']); // important

        // create category without brands field
        $category = Category::create($validated);

        // sync brands pivot
        $category->brands()->sync($brands);

        return redirect()->route('admin.categories.index')
            ->with('success', __('messages.category_created_successfully'));
    }


    public function edit(Category $category)
    {
        $parentCategories = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->orderBy('sort_order')
            ->get();
        
        $brands = Brand::get();
        
        $category->load('brands');
        
        return view('admin.categories.edit', compact('category', 'parentCategories', 'brands'));
    }

   public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug,' . $category->id,
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'brands' => 'nullable|array',
            'brands.*' => 'exists:brands,id'
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name_en']);

        // extract brands array
        $brands = $validated['brands'] ?? [];
        unset($validated['brands']);

        // update category basic fields
        $category->update($validated);

        // sync brands pivot:
        $category->brands()->sync($brands);

        return redirect()->route('admin.categories.index')
            ->with('success', __('messages.category_updated_successfully'));
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', __('messages.category_deleted_successfully'));
    }
}