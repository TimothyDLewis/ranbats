<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use RanBats\Classes\Slugger;

use RanBats\Models\Role;
use RanBats\Models\User;

class TestSeeder extends Seeder {
	private $slugger = null;

	public function __construct(){
		$this->slugger = new Slugger();
	}
    
    public function run(){
    	$defaultPassword = env("DEFAULT_PASSWORD", 'pa$$w0rd');
		$this->command->info("Using default password of ".$defaultPassword." for non-Superuser Accounts.");

		$adminRole = Role::where("slug", "=", "admin")->first();
    	$userRole = Role::where("slug", "=", "user")->first();

    	$adminUser = User::create([
			"email" => "admin@ranbats.com",
			"password" => \Hash::make($defaultPassword),
			"first_name" => "Admin",
			"last_name" => "User"
		]);

		$activation = Activation::create($adminUser);
		Activation::complete($adminUser, $activation->code);

		$adminRole->users()->attach($adminUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$userRole->users()->attach($adminUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$this->command->info("Created and Activated User:".$adminUser->email." (".$adminUser->roles->first()->name.")");

		$userUser = User::create([
			"email" => "user@ranbats.com",
			"password" => \Hash::make($defaultPassword),
			"first_name" => "User",
			"last_name" => "User"
		]);

		$activation = Activation::create($userUser);
		Activation::complete($userUser, $activation->code);

		$userRole->users()->attach($userUser, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$this->command->info("Created and Activated User:".$userUser->email." (".$userUser->roles->first()->name.")");
    }
}
