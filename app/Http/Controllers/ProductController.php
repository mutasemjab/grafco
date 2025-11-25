<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index($categorySlug = null, $subcategorySlug = null)
{
    $selectedCategory = null;
    $selectedSubcategory = null;
    $selectedBrand = null;

    // Check if filtering by brand (from query parameter)
    if (request()->has('brand')) {
        $selectedBrand = Brand::findOrFail(request('brand'));
    }

    // Check if filtering by subcategory
    if ($subcategorySlug) {
        $selectedSubcategory = Category::where('slug', $subcategorySlug)
                                    ->whereNotNull('parent_id')
                                    ->with('brands')
                                    ->firstOrFail();
        $selectedCategory = $selectedSubcategory->parent;
    }
    // Check if filtering by category (from URL path)
    elseif ($categorySlug) {
        $selectedCategory = Category::where('slug', $categorySlug)
                                    ->whereNull('parent_id')
                                    ->with('brands')
                                    ->firstOrFail();
    }

    // Load categories with their relationships
    $categories = Category::mainCategories()
        ->with([
            'children' => function($query) {
                $query->where('is_active', true)
                      ->orderBy('sort_order')
                      ->with('brands');
            },
            'brands'
        ])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    // Load products for each category/subcategory based on filters
    foreach ($categories as $category) {
        // Check if this category should be filtered
        $shouldFilterThisCategory = !$selectedCategory || $selectedCategory->id == $category->id;

        if ($shouldFilterThisCategory) {
            // Load products for main category (only if no children)
            if ($category->children->count() == 0) {
                $categoryProductsQuery = Product::where('category_id', $category->id)
                                                ->where('is_active', true);
                
                if ($selectedBrand) {
                    $categoryProductsQuery->where('brand_id', $selectedBrand->id);
                }
                
                $category->filteredProducts = $categoryProductsQuery->get();
            } else {
                $category->filteredProducts = collect();
            }

            // Load products for subcategories
            if ($category->children->count() > 0) {
                foreach ($category->children as $subcategory) {
                    $shouldFilterThisSubcategory = !$selectedSubcategory || 
                                                   $selectedSubcategory->id == $subcategory->id;
                    
                    if ($shouldFilterThisSubcategory) {
                        $subProductsQuery = Product::where('category_id', $subcategory->id)
                                                   ->where('is_active', true);
                        
                        if ($selectedBrand) {
                            $subProductsQuery->where('brand_id', $selectedBrand->id);
                        }
                        
                        $subcategory->filteredProducts = $subProductsQuery->get();
                    } else {
                        $subcategory->filteredProducts = collect();
                    }
                }
            }
        } else {
            // Don't load products for other categories
            $category->filteredProducts = collect();
            
            if ($category->children->count() > 0) {
                foreach ($category->children as $subcategory) {
                    $subcategory->filteredProducts = collect();
                }
            }
        }
    }

    return view('user.products', compact('categories', 'selectedCategory', 'selectedSubcategory', 'selectedBrand'));
}

    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'brand', 'features', 'specifications', 'downloads'])
            ->firstOrFail();

        $categories = Category::mainCategories()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $setting = Setting::first();

        return view('user.product-details', compact('product', 'categories','setting'));
    }

    public function storeRequest(Request $request, $productId)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'company_name' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'country' => 'required|string',
            'message' => 'nullable|string',
            'agree_to_policy' => 'required|accepted',
        ]);

        $validated['product_id'] = $productId;
        $validated['status'] = 'pending';

        ProductRequest::create($validated);

        return back()->with('success', __('products.request_sent_successfully'));
    }
}
