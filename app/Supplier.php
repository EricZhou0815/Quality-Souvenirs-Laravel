<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
        // Table Name
        protected $table = 'suppliers';
        // Primary Key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;
    
        public function souvenirs(){
            return $this->hasMany('App\Souvneir');
        }
}
