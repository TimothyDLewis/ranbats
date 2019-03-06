<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesStandingsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("series_standings", function(Blueprint $table) {
        	$table->integer("series_id");
        	$table->integer("player_id");

        	$table->integer("wins")->nullable();
        	$table->integer("losses")->nullable();
        	$table->integer("ties")->nullable();
        	$table->integer("points")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop("series_standings");
    }
}
