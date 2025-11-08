<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailablePosition extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    // Dynamic accessor for current locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $field = 'name_' . $locale;
        return $this->$field;
    }
}
