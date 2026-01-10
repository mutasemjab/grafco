<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
    'key_features_en' => 'array',
    'key_features_ar' => 'array',
    ];
    
     public function consumable()
    {
        return $this->belongsTo(Consumable::class);
    }
     public function downloads()
    {
        return $this->hasMany(ConsumableProductDownload::class);
    }
}
