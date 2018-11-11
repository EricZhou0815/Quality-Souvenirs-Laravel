<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
        // Table Name
        protected $table = 'souvenirs';
        // Primary Key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;
    
        public function category(){
            return $this->belongsTo('App\Category');
        }

        public function supplier(){
            return $this->belongsTo('App\Supplier');
        }

        public function OrderDetails(){
            return $this->hasMany('App\OrderDetail');
        }
}
