<?php

use Illuminate\Database\Seeder;

use RanBats\Classes\Slugger;

use RanBats\Models\Role;
use RanBats\Models\User;

class InitialSeeder extends Seeder {
	private $slugger = null;

	public function __construct(){
		$this->slugger = new Slugger();
	}

	public function run(){

		$superuserEmail = env("SUPERUSER_EMAIL", null);
		if(!$superuserEmail){
			throw new \Exception("Unable to Seed Database; Superuser Email not set in .env", 500);
		}

		$superuserPassword = env("SUPERUSER_PASSWORD", null);
		if(!$superuserPassword){
			throw new \Exception("Unable to Seed Database; Superuser Password not set in .env", 500);
		}

		$defaultPassword = env("DEFAULT_PASSWORD", 'pa$$w0rd');
		$this->command->info("Using default password of ".$defaultPassword." for non-Superuser Accounts.");

		// Create initial roles (SuperUser, Admin, and User)
		$superUser = Role::create([
			"slug" => "superuser",
			"name" => "Superuser",
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$adminRole = Role::create([
			"slug" => "admin",
			"name" => "Admin",
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$userRole = Role::create([
			"slug" => "user",
			"name" => "User",
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		// Create and Activate Superuser Account
		$user = User::create([
			"email" => $superuserEmail,
			"password" => \Hash::make($superuserPassword),
			"first_name" => "Super",
			"last_name" => "User"
		]);

		$activation = Activation::create($user);
		Activation::complete($user, $activation->code);

		$superUser->users()->attach($user, [
			"created_at" => date("Y-m-d H:i:s"),
			"updated_at" => date("Y-m-d H:i:s"),
		]);

		$this->command->info("Created and Activated User:".$user->email." (".$user->roles->first()->name.")");
	}
}