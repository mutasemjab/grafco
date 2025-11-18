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
        $categories = Category::mainCategories()
            ->with(['children.products' => function($query) {
                $query->where('is_active', true);
            }, 'products' => function($query) {
                $query->where('is_active', true);
            }])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $selectedCategory = null;
        $selectedBrand = null;
        $selectedBrands = collect();

        // Check if filtering by brand
        if (request()->has('brand')) {
            $selectedBrand = Brand::findOrFail(request('brand'));
            $selectedBrands = Brand::all();
        }
        // Check if filtering by category
        elseif ($categorySlug) {
            $selectedCategory = Category::where('slug', $categorySlug)->firstOrFail();
            $selectedBrands = Brand::whereHas('products', function($q) use ($selectedCategory) {
                $q->where('category_id', $selectedCategory->id);
            })->get();
        }
        else {
            $selectedBrands = Brand::all();
        }

        return view('user.products', compact('categories', 'selectedCategory', 'selectedBrands', 'selectedBrand'));
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
