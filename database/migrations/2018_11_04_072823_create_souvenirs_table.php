<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSouvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->decimal('price');
            $table->string('pathOfImage');
            $table->string('categoryName');
            $table->string('supplierName');
        
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('souvenirs');
    }
}
