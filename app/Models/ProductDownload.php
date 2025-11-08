<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDownload extends Model
{
    use HasFactory;

     protected $guarded = [];

      protected $dates = ['updated_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'title_' . $locale};
    }

    public function getFormattedSizeAttribute()
    {
        return $this->file_size;
    }

    public function getFormattedDateAttribute()
    {
        return $this->updated_date ? $this->updated_date->format('Y-m-d') : null;
    }
}
