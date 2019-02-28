<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("games", function(Blueprint $table) {
        	$table->increments("id");

        	$table->string("name", 512);
        	$table->string("slug", 512);
        	$table->string("boxart", 256)->nullable();
        	$table->text("description");
        	$table->string("abbreviation", 12)->nullable();
        	$table->timestamp("release_date")->nullable();
        	$table->string("platforms", 256)->nullable();

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
        Schema::drop("games");
    }
}
