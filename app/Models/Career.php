<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $guarded = [];
    
   public function availablePositions()
    {
        return $this->hasMany(AvailablePosition::class);
    }

    // Dynamic accessors for current locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $field = 'name_' . $locale;
        return $this->$field;
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'description_' . $locale;
        return $this->$field;
    }

    public function getBottomNameAttribute()
    {
        $locale = app()->getLocale();
        $field = 'bottom_name_' . $locale;
        return $this->$field;
    }

    public function getBottomDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $field = 'bottom_description_' . $locale;
        return $this->$field;
    }
}
