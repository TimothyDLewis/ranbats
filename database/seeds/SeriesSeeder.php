<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use RanBats\Classes\Slugger;

use RanBats\Models\Player;
use RanBats\Models\Series;
use RanBats\Models\Tournament;

class SeriesSeeder extends Seeder {
	private $slugger = null;

	public function __construct(){
		$this->slugger = new Slugger();
	}

	public function run(){
		$series = Series::create([
			"game_id" => 1, // UNIST
			"name" => "LFGC UNIST RanBats Season 1",
			"slug" => $this->slugger->sluggify("LFGC UNIST RanBats Season 1"),
			"description" => "Season 1 (Spring, 2019) of LFGC's Ranked Battles for UNIST.",
		]);

		$this->command->info("Created Series: ".$series->name);

		$tournament = Tournament::create([
			"series_id" => $series->id,
			"name" => "Week 1",
			"slug" => $this->slugger->sluggify("Week 1"),
			"date" => Carbon::parse("2019-02-27"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB1",
		]);

		$this->command->info("Created Tournament: ".$tournament->name);

		$player = Player::create([
			"name" => "TENMA"
		]);

		$standings = [
			"wins" => 5,
			"losses" => 1,
			"ties" => 0,
			"points" => 50
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Never Block"
		]);

		$standings = [
			"wins" => 5,
			"losses" => 1,
			"ties" => 0,
			"points" => 35
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Play Melty"
		]);

		$standings = [
			"wins" => 4,
			"losses" => 2,
			"ties" => 0,
			"points" => 20
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Sean003"
		]);

		$standings = [
			"wins" => 3,
			"losses" => 3,
			"ties" => 0,
			"points" => 10
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Play Hyde (Richard)"
		]);

		$standings = [
			"wins" => 3,
			"losses" => 3,
			"ties" => 0,
			"points" => 0
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Day 0 Merkava"
		]);

		$standings = [
			"wins" => 1,
			"losses" => 5,
			"ties" => 0,
			"points" => 0
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "WANZ-494"
		]);

		$standings = [
			"wins" => 0,
			"losses" => 6,
			"ties" => 0,
			"points" => 0
		];

		$series->entrants()->attach($player, $standings);
		$tournament->entrants()->attach($player, $standings);

		$this->command->info("Created Player: ".$player->name);
	}
}