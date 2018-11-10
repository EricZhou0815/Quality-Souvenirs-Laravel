<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    // Table Name
    protected $table = 'shoppingCarts';
    // Primary Key
    public $primaryKey = 'id';
    // category name
    // Timestamps
    public $timestamps = true;

    public function shoppingCart(){
        return $this->hasMany('App\CartItem');
    }
}
