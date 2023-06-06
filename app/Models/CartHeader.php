<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHeader extends Model
{
    protected $table = 'cart_headers';

    protected $fillable = [
        'user_id',
        'category_id',
        'quantity',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
