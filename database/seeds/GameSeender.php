<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use RanBats\Classes\Slugger;

use RanBats\Models\Game;

class GameSeeder extends Seeder {
	private $slugger = null;

	public function __construct(){
		$this->slugger = new Slugger();
	}
    
    public function run(){
    	$unist = Game::create([
			"name" => "Under Night In-Birth Exe:Late[st]",
			"slug" => $this->slugger->sluggify("Under Night In-Birth Exe:Late[st]"),
			"boxart" => "/img/boxarts/unist_boxart.jpg",
			"description" => "Explore the Unknown – Play through an all-new Chronicle mode and unravel the mystery behind the mysterious Hollow Night.\nCommand the Night – Choose from 20 unique characters, from series veterans like Hyde, Merkava, and Linne, to one of the four newly-introduced characters: Phonon, Mika, Wagner, and Enkidu. Unleash their power to become the ruler of the night!\nMaster the Darkness – Hone your skills in brand new single-player modes, including all-encompassing practical and combat missions that will turn any fledgling into Lord of the Under Night.\nDevour the Competition – Jump straight into the action and battle it out in local battles or face off against anyone in the world with online multiplayer.",
			"abbreviation" => "unist",
			"release_date" => Carbon::parse("September 20th, 2012"),
			"platforms" => "ps4"
		]);

		$this->command->info("Created Game: ".$unist->name);

		$ggxr2 = Game::create([
			"name" => "Guilty Gear Xrd REV 2",
			"slug" => $this->slugger->sluggify("Guilty Gear Xrd REV 2"),
			"boxart" => "/img/boxarts/ggxr2_boxart.jpg",
			"description" => "Two new characters, Baiken and Answer enter the battle! New stages and moves are just the beginning of new content to explore!\nExpanded story and arcade modes shed new light on your favorite fighters.\nA complete rebalancing of each fighter means that everything old is new again! Explore different fighting techniques with your favorite characters or start fresh with new brawlers.\nUpgrades, Lots of Upgrades.",
			"abbreviation" => "ggxr2",
			"release_date" => Carbon::parse("May 26th, 2017"),
			"platforms" => "arcade,pc,ps3,ps4",
		]);

		$this->command->info("Created Game: ".$ggxr2->name);

		$bbcf = Game::create([
			"name" => "BlazBlue: Central Fiction",
			"slug" => $this->slugger->sluggify("BlazBlue: Central Fiction"),
			"boxart" => "/img/boxarts/bbcf_boxart.png",
			"description" => "BlazBlue: Central Fiction is the newest installment in the storied BlazBlue franchise and stands alone as the pinnacle of next gen 2D fighters! Like a well-timed 2D punch,BlazBlue: Central Fictionbashes massive amounts of content and innovation into one slick title that hits hard and keeps the pummeling steady! Prepare yourself for a brand new story, new characters, levels, modes, system mechanics and more! Choose from over 33 unimaginable fighters as you battle for 2D supremacy!\nA massive story mode coupled with new modes and mechanics will keep you coming back for more!\nInsanely detailed 2D hand-drawn sprites coupled with astonishing 3D rendered backgrounds create a world unlike anything you’ve seen before!\nA packed roster of over 30+ characters new and old rumble for glory in the post apocalypse!",
			"abbreviation" => "bbcf",
			"release_date" => Carbon::parse("November 19, 2015"),
			"platforms" => "arcade,pc,ps3,ps4,switch",
		]);

		$this->command->info("Created Game: ".$bbcf->name);
    }
}