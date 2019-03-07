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

		$players = collect([]);

		$unistSeason1 = Series::create([
			"game_id" => 1,
			"name" => "LFGC UNIST RanBats Season 1",
			"slug" => $this->slugger->sluggify("LFGC UNIST RanBats Season 1"),
			"description" => "Season 1 (Spring, 2019) of LFGC's Ranked Battles for UNIST.",
		]);

		$this->command->info("Created Series: ".$unistSeason1->name);

		$week1 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 1",
			"slug" => $this->slugger->sluggify("Week 1"),
			"date" => Carbon::parse("2019-02-27"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB1",
		]);

		$this->command->info("Created Tournament: ".$week1->name);

		$week2 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 2",
			"slug" => $this->slugger->sluggify("Week 2"),
			"date" => Carbon::parse("2019-03-06"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB2",
		]);

		$this->command->info("Created Tournament: ".$week2->name);

		$week3 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 3",
			"slug" => $this->slugger->sluggify("Week 3"),
			"date" => Carbon::parse("2019-03-13")
		]);

		$this->command->info("Created Tournament: ".$week3->name);

		$player = Player::create([
			"name" => "TENMA"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 5,
					"losses" => 1,
					"ties" => 0,
					"points" => 50
				], $week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 20
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Never Block"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 5,
					"losses" => 1,
					"ties" => 0,
					"points" => 35
				], $week2->id => [
					"wins" => 4,
					"losses" => 0,
					"ties" => 0,
					"points" => 50
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Play Melty"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 4,
					"losses" => 2,
					"ties" => 0,
					"points" => 20
				], $week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 10
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Sean003"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 3,
					"losses" => 3,
					"ties" => 0,
					"points" => 10
				], $week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 3
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Play Hyde (Richard)"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 3,
					"losses" => 3,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Day 0 Merkava"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 1,
					"losses" => 5,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "WANZ-494"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week1->id => [
					"wins" => 0,
					"losses" => 6,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "gemi+"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 35
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Wertville"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 3
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Alacszander"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 1
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Reeshard"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 1
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Dan"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Koore"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Never Dead"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Riley"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "VThirteen"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$week2->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		foreach($players AS $player){
			foreach($player->seriesStandings AS $seriesId => $tournamentStandings){

				foreach($tournamentStandings AS $tournamentId => $tournamentStanding){
					$player->tournaments()->attach($tournamentId, $tournamentStanding);
				}

				$player->series()->attach($seriesId, [
					"wins" => $tournamentStandings->sum("wins"),
					"losses" => $tournamentStandings->sum("losses"),
					"ties" => $tournamentStandings->sum("ties"),
					"points" => $tournamentStandings->sum("points")
				]);
			}
		}

		$this->command->info("Updated Tournament and Series Standings");
	}
}