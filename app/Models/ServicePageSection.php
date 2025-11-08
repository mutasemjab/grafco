<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePageSection extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'features_en' => 'array',
        'features_ar' => 'array',
        'image_right' => 'boolean',
    ];

    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class);
    }
}
