<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use HasFactory;

    protected $guarded = [];

     public function sections()
    {
        return $this->hasMany(ServicePageSection::class)->orderBy('order');
    }
}
