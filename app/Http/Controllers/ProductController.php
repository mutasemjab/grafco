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
        // Eager load categories with their brands (from the pivot table)
        $categories = Category::mainCategories()
            ->with([
                'children.products' => function($query) {
                    $query->where('is_active', true);
                },
                'children.brands', // Load brands for subcategories
                'products' => function($query) {
                    $query->where('is_active', true);
                },
                'brands' // Load brands for main categories
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $selectedCategory = null;
        $selectedBrand = null;

        // Check if filtering by category
        if ($categorySlug) {
            $selectedCategory = Category::where('slug', $categorySlug)
                                        ->with('brands')
                                        ->firstOrFail();
        }

        // Check if filtering by brand
        if (request()->has('brand')) {
            $selectedBrand = Brand::findOrFail(request('brand'));
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
