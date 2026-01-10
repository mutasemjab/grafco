<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableProductDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'consumable_product_id',
        'title_en',
        'title_ar',
        'file_path',
        'file_type',
        'file_size',
        'updated_date',
        'sort_order',
    ];

    protected $casts = [
        'updated_date' => 'date',
        'sort_order' => 'integer',
    ];

    /**
     * Get the consumable product that owns the download.
     */
    public function consumableProduct()
    {
        return $this->belongsTo(ConsumableProduct::class);
    }
}