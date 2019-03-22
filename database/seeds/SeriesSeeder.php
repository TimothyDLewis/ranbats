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

		$unistSeason1Week1 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 1",
			"slug" => $this->slugger->sluggify("Week 1"),
			"date" => Carbon::parse("2019-02-27"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB1",
			"format" => "round_robin"
		]);

		$this->command->info("Created Tournament: ".$unistSeason1Week1->name);

		$unistSeason1Week2 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 2",
			"slug" => $this->slugger->sluggify("Week 2"),
			"date" => Carbon::parse("2019-03-06"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB2",
			"format" => "double_elimination"
		]);

		$this->command->info("Created Tournament: ".$unistSeason1Week2->name);

		$unistSeason1Week3 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 3",
			"slug" => $this->slugger->sluggify("Week 3"),
			"date" => Carbon::parse("2019-03-13"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB3",
			"format" => "double_elimination"
		]);

		$this->command->info("Created Tournament: ".$unistSeason1Week3->name);

		$unistSeason1Week4 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 4",
			"slug" => $this->slugger->sluggify("Week 4"),
			"date" => Carbon::parse("2019-03-20"),
			"overview_link" => "https://challonge.com/LFGCUNISTRB4",
			"format" => "double_elimination"
		]);

		$this->command->info("Created Tournament: ".$unistSeason1Week4->name);

		$unistSeason1Week5 = Tournament::create([
			"series_id" => $unistSeason1->id,
			"name" => "Week 5",
			"slug" => $this->slugger->sluggify("Week 5"),
			"date" => Carbon::parse("2019-03-27")
		]);

		$this->command->info("Created Tournament: ".$unistSeason1Week5->name);

		$player = Player::create([
			"name" => "TENMA"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week1->id => [
					"wins" => 5,
					"losses" => 1,
					"ties" => 0,
					"points" => 50,
					"tie_breakers" => 1
				], $unistSeason1Week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 20,
					"tie_breakers" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Never Block" // Lazy Phonon Player
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week1->id => [
					"wins" => 5,
					"losses" => 1,
					"ties" => 0,
					"points" => 35,
					"tie_breakers" => 0
				], $unistSeason1Week2->id => [
					"wins" => 4,
					"losses" => 0,
					"ties" => 0,
					"points" => 50,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 4,
					"losses" => 0,
					"ties" => 0,
					"points" => 50,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 4,
					"losses" => 1,
					"ties" => 0,
					"points" => 50,
					"tie_breakers" => 0
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
				$unistSeason1Week1->id => [
					"wins" => 4,
					"losses" => 2,
					"ties" => 0,
					"points" => 20,
					"tie_breakers" => 0
				], $unistSeason1Week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 10,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 2,
					"losses" => 2,
					"ties" => 0,
					"points" => 10,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 20,
					"tie_breakers" => 0
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
				$unistSeason1Week1->id => [
					"wins" => 3,
					"losses" => 3,
					"ties" => 0,
					"points" => 10,
					"tie_breakers" => 1
				], $unistSeason1Week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 3,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 4,
					"losses" => 2,
					"ties" => 0,
					"points" => 20,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 2,
					"losses" => 2,
					"ties" => 0,
					"points" => 10,
					"tie_breakers" => 0
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
				$unistSeason1Week1->id => [
					"wins" => 3,
					"losses" => 3,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week1->id => [
					"wins" => 1,
					"losses" => 5,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week1->id => [
					"wins" => 0,
					"losses" => 6,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 35,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 35,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 4,
					"losses" => 2,
					"ties" => 0,
					"points" => 35,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 3,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 2,
					"losses" => 2,
					"ties" => 0,
					"points" => 1,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 1,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 3,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 3,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 1,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 2,
					"losses" => 2,
					"ties" => 0,
					"points" => 1,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Koore" // Aika-chan plea$e $it on my face
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 3,
					"losses" => 2,
					"ties" => 0,
					"points" => 3,
					"tie_breakers" => 0
				], $unistSeason1Week4->id => [
					"wins" => 2,
					"losses" => 2,
					"ties" => 0,
					"points" => 3,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
				$unistSeason1Week2->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				], $unistSeason1Week3->id => [
					"wins" => 1,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Play Smash"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week3->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Squid"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week3->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				]
			])
		]);

		$players->push($player);

		$player = Player::create([
			"name" => "Turbo2Tone"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week3->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
				]
			])
		]);

		$players->push($player);

		$this->command->info("Created Player: ".$player->name);

		$player = Player::create([
			"name" => "Scooch"
		]);

		$player->seriesStandings = collect([
			$unistSeason1->id => collect([
				$unistSeason1Week3->id => [
					"wins" => 0,
					"losses" => 2,
					"ties" => 0,
					"points" => 0,
					"tie_breakers" => 0
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
					"points" => $tournamentStandings->sum("points"),
					"tie_breakers" => $tournamentStandings->sum("tie_breakers")
				]);
			}
		}

		$this->command->info("Updated Tournament and Series Standings");
	}
}