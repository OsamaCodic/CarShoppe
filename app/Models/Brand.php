<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function accessories()
    {
        return $this->hasMany('App\Models\Accessory');
    }
}
