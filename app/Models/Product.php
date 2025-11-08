<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $guarded = [];

       public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class)->orderBy('sort_order');
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class)->orderBy('sort_order');
    }

    public function downloads()
    {
        return $this->hasMany(ProductDownload::class)->orderBy('sort_order');
    }

    public function requests()
    {
        return $this->hasMany(ProductRequest::class);
    }

    // Dynamic accessors for current locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'name_' . $locale};
    }

    public function getSubtitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'subtitle_' . $locale} ?? '';
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'description_' . $locale} ?? '';
    }

    public function getPriceDisplayAttribute()
    {
        return $this->show_price ? number_format($this->price, 2) : 'POA';
    }

    // Get parent category if product is in subcategory
    public function getMainCategoryAttribute()
    {
        if ($this->category->parent_id) {
            return $this->category->parent;
        }
        return $this->category;
    }

    // Get subcategory if exists
    public function getSubcategoryAttribute()
    {
        if ($this->category->parent_id) {
            return $this->category;
        }
        return null;
    }
}
