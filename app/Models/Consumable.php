<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $guarded = [];

      protected $casts = [
        'key_features_en' => 'array',
        'key_features_ar' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(ConsumableProduct::class);
    }
}
