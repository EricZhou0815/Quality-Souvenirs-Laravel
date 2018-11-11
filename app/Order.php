<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        // Table Name
        protected $table = 'orders';
        // Primary Key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;
    
        public function user(){
            return $this->belongsTo('App\User');
        }

        public function orderDetails(){
            return $this->hasMany('App\OrderDetail');
        }
}
