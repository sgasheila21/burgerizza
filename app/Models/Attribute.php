<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    protected $fillable = [
        'category_id',
        'attribute_name',
        'attribute_description',
        'attribute_status',
        'multiple_choice',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
