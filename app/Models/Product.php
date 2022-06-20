<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo('App\Models\brand');
    }

    public function product_history()
    {
        return $this->hasOne('App\Models\PurchasedProductHistory', 'product_id');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }
    public function productFeatures()
    {
        return $this->hasMany('App\Models\ProductFeature', 'product_id');
    }
}
