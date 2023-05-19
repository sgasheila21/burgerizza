<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function users () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products () {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
