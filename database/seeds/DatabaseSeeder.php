<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->call(InitialSeeder::class);
        if(env("APP_ENV", "production") == "local"){
        	$this->call(TestSeeder::class);
        }
    }
}
