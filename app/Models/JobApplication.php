<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(AvailablePosition::class, 'position_id');
    }
}