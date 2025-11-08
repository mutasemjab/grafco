<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

     protected $guarded = [];

     public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getLabelAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'label_' . $locale};
    }

    public function getValueAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'value_' . $locale};
    }
}
