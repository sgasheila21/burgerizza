<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    public function users () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function locations (){
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
    
    public function products () {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
