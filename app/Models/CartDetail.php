<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_details';
    
    protected $fillable = [
        'cart_header_id',
        'product_id',
        'quantity',
    ];
}
