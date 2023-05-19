<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function carts () {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }

    public function transactions () {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function role () {
        return $this->hasOne(Role::class, 'role_id', 'id');
    }
}
