<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('guests', function (Blueprint $table) {
          $table->increments('id');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('company')->nullable();
          $table->string('email')->nullable();
          $table->string('contact_number')->nullable();
          $table->integer('table_number')->nullable();
          $table->string('note')->nullable();
          $table->boolean('arrived')->default(false);
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
        Schema::drop('guests');
    }
}
