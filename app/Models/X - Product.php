<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productType () {
        return $this->hasOne(ProductType::class, 'product_type_id', 'id');
    }

    public function carts () {
        return $this->belongsTo(Cart::class, 'product_id', 'id');
    }

    public function transactions () {
        return $this->belongsTo(Transaction::class, 'product_id', 'id');
    }
}
