<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function carts (){
        return $this->belongsTo(Cart::class, 'id', 'location_id');
    }

    public function transactions (){
        return $this->belongsTo(Transaction::class, 'id', 'location_id');
    }
}
