<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected $table = "accessories";
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo('App\Models\brand');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'category_id');
    }
    
    public function part_history()
    {
        return $this->hasOne('App\Models\PurchasedPartHistory', 'part_id');
    }

}
