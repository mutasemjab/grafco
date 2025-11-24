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
   public function index($categorySlug = null)
    {
        $selectedCategory = null;
        $selectedBrand = null;

        // Check if filtering by brand (from query parameter)
        if (request()->has('brand')) {
            $selectedBrand = Brand::findOrFail(request('brand'));
        }

        // Check if filtering by category (from URL path)
        if ($categorySlug) {
            $selectedCategory = Category::where('slug', $categorySlug)
                                        ->with('brands')
                                        ->firstOrFail();
        }

        // Load categories with their relationships
        $categories = Category::mainCategories()
            ->with([
                'children' => function($query) {
                    $query->where('is_active', true);
                },
                'children.brands',
                'brands'
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Load products for each category based on filters
        foreach ($categories as $category) {
            // Check if this category should be filtered
            $shouldFilterThisCategory = !$selectedCategory || $selectedCategory->id == $category->id;

            if ($shouldFilterThisCategory) {
                // Load products for main category
                $categoryProductsQuery = Product::where('category_id', $category->id)
                                                ->where('is_active', true);
                
                if ($selectedBrand) {
                    $categoryProductsQuery->where('brand_id', $selectedBrand->id);
                }
                
                $category->filteredProducts = $categoryProductsQuery->get();

                // Load products for subcategories
                if ($category->children->count() > 0) {
                    foreach ($category->children as $subcategory) {
                        $subProductsQuery = Product::where('category_id', $subcategory->id)
                                                   ->where('is_active', true);
                        
                        if ($selectedBrand) {
                            $subProductsQuery->where('brand_id', $selectedBrand->id);
                        }
                        
                        $subcategory->filteredProducts = $subProductsQuery->get();
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

        return view('user.products', compact('categories', 'selectedCategory', 'selectedBrand'));
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
