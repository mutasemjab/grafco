<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Child categories relationship
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('sort_order');
    }

    // Get only main categories (no parent)
    public function scopeMainCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    // Get only subcategories
    public function scopeSubcategories($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'category_brands');
    }

    // Dynamic accessor for current locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'name_' . $locale};
    }

    // Get all products including subcategory products
    public function getAllProducts()
    {
        $categoryIds = $this->children->pluck('id')->push($this->id);
        return Product::whereIn('category_id', $categoryIds)->get();
    }
}
