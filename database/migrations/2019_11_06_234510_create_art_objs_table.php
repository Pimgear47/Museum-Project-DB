<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtObjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_objs', function (Blueprint $table) {
            $table->increments('Id_no');
            $table->string('Artist');
            $table->string('Year');
            $table->string('Title');
            $table->longText('Description');
            $table->string('Origin');
            $table->string('Epoch');
            $table->string('picture');
            $table->enum('Type_of_art', ['painting', 'sculpture', 'statue', 'other']);
            $table->enum('Type_of_coll', ['permanent', 'borrowed', 'donated']);
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
        Schema::dropIfExists('art_objs');
    }
}
