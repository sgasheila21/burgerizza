<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = [
        'payment_methods_name',
        'payment_methods_description',
        'payment_methods_image_path',
        'payment_methods_status'
    ];

    protected $primaryKey = 'id';
}
