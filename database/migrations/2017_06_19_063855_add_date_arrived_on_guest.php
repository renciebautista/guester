<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateArrivedOnGuest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guests', function(Blueprint $table)
        {
          $table->datetime('arrived_date')->after('arrived')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('guests', function(Blueprint $table)
      {
        $table->dropColumn('arrived_date');
      });
    }
}
