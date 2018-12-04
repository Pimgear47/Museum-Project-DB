<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanent_collections', function (Blueprint $table) {
            $table->increments('art_obj_Id_no');
            $table->string('Collections_Name');
            $table->enum('Status', ['on display', 'on loan', 'stored']);
            $table->date('Date_acquired');
            $table->float('Cost');
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
        Schema::dropIfExists('permanent_collections');
    }
}
