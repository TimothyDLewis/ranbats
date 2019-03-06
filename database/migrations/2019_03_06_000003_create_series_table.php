<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("series", function(Blueprint $table) {
        	$table->increments("id");

        	$table->integer("game_id");

        	$table->string("name", 512);
        	$table->string("slug", 512);
        	$table->text("description")->nullable();

        	$table->timestamps();
        	$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop("series");
    }
}
