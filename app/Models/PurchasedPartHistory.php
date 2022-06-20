<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedPartHistory extends Model
{
    use HasFactory;
    
    protected $table = 'purchased_part_history';

    protected $fillable = [
      'user_id',
      'part_id'
    ];

    public function accessoryDetails()
    {
        return $this->belongsTo('App\Models\Accessory', 'part_id');
    }
    
    public function userDetails()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
