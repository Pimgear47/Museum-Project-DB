<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSculpturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sculptures', function (Blueprint $table) {
            $table->increments('art_obj_Id_no');
            $table->string('Material');
            $table->string('Height');
            $table->string('Weight');
            $table->string('Style');
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
        Schema::dropIfExists('sculptures');
    }
}
