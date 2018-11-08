<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table Name
    protected $table = 'categories';
    // Primary Key
    public $primaryKey = 'id';
    // category name
    // Timestamps
    public $timestamps = true;

    public function souvenirs(){
        return $this->hasMany('App\Souvenir');
    }
}
