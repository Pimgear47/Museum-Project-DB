<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('Artist_id');
            $table->string('Name');
            $table->date('Date_Born');
            $table->date('Date_Died');
            $table->string('Country_of_origin');
            $table->string('Epoch');
            $table->string('Main_style');
            $table->longText('Description');
            $table->string('picture');
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
        Schema::dropIfExists('artists');
    }
}
