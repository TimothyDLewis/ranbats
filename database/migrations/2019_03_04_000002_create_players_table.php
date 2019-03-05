<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("players", function(Blueprint $table) {
        	$table->increments("id");

        	$table->string("prefix", 512)->nullable();
        	$table->string("name", 512);

        	$table->timestamps();
        	$table->softDeletes();
        });

        Schema::table("users", function (Blueprint $table){
        	$table->integer("player_id")->after("id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop("players");

        Schema::table("users", function (Blueprint $table){
			$table->dropColumn("player_id");
		});
    }
}
