<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
        // Table Name
        protected $table = 'orderDetails';
        // Primary Key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;
    
        public function order(){
            return $this->belongsTo('App\Order');
        }

        public function souvenir(){
            return $this->belongsTo('App\Souvenir');
        }
}
