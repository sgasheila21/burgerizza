<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'attribute_id',
        'product_name',
        'product_image_path',
        'product_description',
        'product_price',
        'product_quantity',
        'product_status',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
