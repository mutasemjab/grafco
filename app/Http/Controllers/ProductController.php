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
            ->with(['children.products', 'products'])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        $selectedCategory = null;
        $selectedBrands = collect();
        
        if ($categorySlug) {
            $selectedCategory = Category::where('slug', $categorySlug)->firstOrFail();
            $selectedBrands = Brand::whereHas('products', function($q) use ($selectedCategory) {
                $q->where('category_id', $selectedCategory->id);
            })->get();
        } else {
            $selectedBrands = Brand::all();
        }
        
        return view('user.products', compact('categories', 'selectedCategory', 'selectedBrands'));
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