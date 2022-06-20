<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedProductHistory extends Model
{
    use HasFactory;
    
    protected $table = 'purchased_product_history';
    // protected $guarded = [];

    
    protected $fillable = [
        'user_id',
        'product_id'
      ];

      public function productDetails()
      {
          return $this->belongsTo('App\Models\Product', 'product_id');
      }
      
      public function userDetails()
      {
          return $this->belongsTo('App\Models\User', 'user_id');
      }
}
