<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("tournaments", function(Blueprint $table) {
        	$table->increments("id");

        	$table->integer("series_id");

        	$table->string("name", 512);
        	$table->string("slug", 512);
        	
        	$table->timestamp("date");
        	$table->string("overview_link", 512)->nullable();

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
        Schema::drop("tournaments");
    }
}
