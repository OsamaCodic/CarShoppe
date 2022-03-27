<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    protected $table = 'features';

    public function features()
    {
        return $this->hasOne('App\Models\ProductFeature', 'feature_id');
    }
}
