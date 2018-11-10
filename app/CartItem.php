<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartItem extends Model
{
    // Table Name
    protected $table = 'cartItems';
    // Primary Key
    public $primaryKey = 'id';
    // category name
    // Timestamps
    public $timestamps = true;

    public function souvenir(){
        return $this->belongsTo('App\Souvenir');
    }

    public function shoppingCart(){
        return $this->belongsTo('App\ShoppingCart');
    }
}
