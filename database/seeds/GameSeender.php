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
			"description" => "Master all 16 characters, each with their own special abilities and moves. Under Night In-Birth offers stunning anime/comic book style visuals and explosive special attacks.<br/><br/>Accessible to Everyone - Under Night In-Birth is made with all gamers in mind. The controls are accessible to everyone, but also advanced enough for even the most experienced fighting gamers.<br/><br/>More than a Fighting Game - Cult-favorite developer French Bread lends its creative talents to build the world of Under Night In-Birth with a compelling, dark tale filled with stylish visuals and mind-blowing fighting.<br/><br/>Legendary Network Mode Along with arcade versus and training modes Under Night In-Birth offers players the ability to battle with opponents from around the world.",
			"abbreviation" => "unist",
			"release_date" => Carbon::parse("September 20th, 2012"),
			"platforms" => "ps4"
		]);

		$this->command->info("Created Game: ".$unist->name);

		$ggxr2 = Game::create([
			"name" => "Guilty Gear Xrd REV 2",
			"slug" => $this->slugger->sluggify("Guilty Gear Xrd REV 2"),
			"boxart" => "/img/boxarts/ggxr2_boxart.jpg",
			"description" => "Two new characters, Baiken and Answer enter the battle! New stages and moves are just the beginning of new content to explore!<br/><br/>Expanded story and arcade modes shed new light on your favorite fighters.<br/><br/>A complete rebalancing of each fighter means that everything old is new again! Explore different fighting techniques with your favorite characters or start fresh with new brawlers.<br/><br/>Upgrades, Lots of Upgrades.",
			"abbreviation" => "ggxr2",
			"release_date" => Carbon::parse("May 26th, 2017"),
			"platforms" => "arcade,pc,ps3,ps4",
		]);

		$this->command->info("Created Game: ".$ggxr2->name);

		$bbcf = Game::create([
			"name" => "BlazBlue: Central Fiction",
			"slug" => $this->slugger->sluggify("BlazBlue: Central Fiction"),
			"boxart" => "/img/boxarts/bbcf_boxart.png",
			"description" => "BlazBlue: Central Fiction is the newest installment in the storied BlazBlue franchise and stands alone as the pinnacle of next gen 2D fighters! Like a well-timed 2D punch, BlazBlue: Central Fiction bashes massive amounts of content and innovation into one slick title that hits hard and keeps the pummeling steady! Prepare yourself for a brand new story, new characters, levels, modes, system mechanics and more! Choose from over 33 unimaginable fighters as you battle for 2D supremacy!<br/><br/>A Brand New Chapter in the Saga<br/>A massive story mode coupled with new modes and mechanics will keep you coming back for more!<br/><br/>Epic Aesthetic<br/>Insanely detailed 2D hand-drawn sprites coupled with astonishing 3D rendered backgrounds create a world unlike anything you've seen before!<br/><br/>Kick Your Beat Downs Up a Notch<br/>A packed roster of over 30+ characters new and old rumble for glory in the post apocalypse!",
			"abbreviation" => "bbcf",
			"release_date" => Carbon::parse("November 19, 2015"),
			"platforms" => "arcade,pc,ps3,ps4,switch",
		]);

		$this->command->info("Created Game: ".$bbcf->name);

		$maab = Game::create([
			"name" => "Millon Arthur: Arcana Blood",
			"slug" => $this->slugger->sluggify("Millon Arthur: Arcana Blood"),
			"boxart" => "/img/boxarts/maab_boxart.jpg",
			"description" => "This smash-hit game series is set in the world of 'Britain,' home to a million King Arthurs and a million Excaliburs. The Arthurs each strive to become the one true king, wielding the power of the knights and the faeries of antiquity. They fight to unite a Britain where civil wars are a common occurence and to protect from outside threats.<br/><br/>Million Arthur: Arcana Blood features a variety of guest fighters including 'Otherworldly Riesz' from 'Seiken Densetsu 3', 'Otherworldly Koume Sakiyama' from 'LORD of VERMILION IV and ‘Otherworldly Iori Yagami' from 'THE KING OF FIGHTERS XIV' as well as the popular characters from the Million Arthur franchise.<br/><br/>Control any one of 13 playable characters, plus a team of three support characters chosen from a selection of 31, enabling you to craft your own unique battle style!",
			"abbreviation" => "maab",
			"release_date" => Carbon::parse("November 21, 2017"),
			"platforms" => "ps4",
		]);

		$this->command->info("Created Game: ".$maab->name);

		$scvi = Game::create([
			"name" => "SoulCalibur VI",
			"slug" => $this->slugger->sluggify("SoulCalibur VI"),
			"boxart" => "/img/boxarts/scvi_boxart.jpg",
			"description" => "SOULCALIBUR VI represents the latest entry in the premier weapons-based, head-to-head fighting series and continues the epic struggle of warriors searching for the legendary Soul Swords. The heroic battles transpire in a beautiful and fluid world, with eye-popping graphics and visual appeal. SOULCALIBUR VI tunes the battle, movement, and visual systems so players can execute visceral and dynamic attacks with ease. SOULCALIBUR VI marks a new era of the historic franchise and its legendary struggle between the mighty Soul Swords!<br/><br/>Unreal Engine<br/>For the first time in franchise history, beautiful and jaw-dropping 3D character models, visual effects and stages rendered in Unreal Engine.<br/><br/>New Battle Mechanics<br/>Read opponents’ attacks to execute a strategic Reversal Edge to land a counter attack while in guard.<br/><br/>Multiple Fighting Styles<br/>Choose from a worldly roster of warriors, each with their own deadly weapons, fighting styles and visual flare.<br/><br/>Dynamic Battles<br/>Spectacular, high-speed battles featuring all-new battle mechanics taking gameplay to the next level.",
			"abbreviation" => "scvi",
			"release_date" => Carbon::parse("October 19, 2018"),
			"platforms" => "pc,ps4,xbone",
		]);

		$this->command->info("Created Game: ".$scvi->name);

		$t7 = Game::create([
			"name" => "Tekken 7",
			"slug" => $this->slugger->sluggify("Tekken 7"),
			"boxart" => "/img/boxarts/t7_boxart.png",
			"description" => "Raise your fists and get ready for the ultimate battle on the newest generation of home consoles. Powered by the Unreal Engine 4, the storied fighting franchise returns for another round in TEKKEN 7. With the faithful 3D battle system and gameplay intact, TEKKEN 7 takes the franchise to the next level with photo-realistic graphics and innovative features and fighting mechanics. TEKKEN 7 resurrects the attitude, competiveness rooted in its arcade DNA to provide the ultimate fighting experience.<br/><br/>Experience The Final Chapter Of The Mishima Blood Saga<br/>Play though a seamless story experience with Hollywood-like, over-the-top action sequences blended seamlessly into fierce battles. Tekken 7 represents the final chapter of the 20-year-long Mishima feud. Unveil the epic ending to the emotionally charged family warfare between the members of the Mishima Clan as they struggle to settle old scores and wrestle for control of a global empire, putting the balance of the world in peril.<br/><br/>All-New Fighters Join the Tekken Universe<br/>Select from an impressive roster of over 30+ fan-favorites and all-new fighters, each with a distinct set of deadly techniques, martial arts moves and devastating combos. The new characters fill TEKKEN 7’s already colorful & robust roster with entrants from all around the globe. Street Fighter’s Akuma makes his debut and flawlessly transitions into the 3D space to fulfill every fighting game fan’s dream. Akuma comes complete with all his trademark shoto-style move set and fireballs.<br/><br/>Fight For The Ultimate Bragging Rights<br/>Compete with up to 7 other players in TEKKEN 7’s all-new tournament mode. This mode features single and double elimination formats seen in many offline, live FGC tournaments. Take the trash talk to the next level with text & voice chat and witness the rise of a new generation of players with spectator features. Do you have what it takes to reign supreme?",
			"abbreviation" => "t7",
			"release_date" => Carbon::parse("March 18, 2015"),
			"platforms" => "ps4,xbone",
		]);

		$this->command->info("Created Game: ".$t7->name);

		$dbfz = Game::create([
			"name" => "Dragon Ball FighterZ",
			"slug" => $this->slugger->sluggify("Dragon Ball FighterZ"),
			"boxart" => "/img/boxarts/dbfz_boxart.jpg",
			"description" => "After the success of the Xenoverse series, it's time to introduce a new classic 2D DRAGON BALL fighting game for this generation's consoles. DRAGON BALL FighterZ is born from what makes the DRAGON BALL series so loved and famous: endless spectacular fights with its allpowerful fighters. Partnering with Arc System Works, DRAGON BALL FighterZ maximizes high end Anime graphics and brings easy to learn but difficult to master fighting gameplay to audiences worldwide.<br/><br/>3vs3 Tag/Support<br/>Allows players to train and master more than one fighter/style which brings deeper gameplay.<br/><br/>High-End Anime Graphics<br/>Using the power of the Unreal engine and the talented team at Arc System Works, DRAGON BALL FighterZ is a visual tour-de-force.<br/><br/>Spectacular Fights<br/>Experience aerial combos, destructible stages, famous scenes from the DRAGON BALL anime reproduced in 60FPS and 1080p resolution (Higher resolution will be supported on PS4 Pro and Xbox One.)",
			"abbreviation" => "dbfz",
			"release_date" => Carbon::parse("January 26, 2018"),
			"platforms" => "pc,ps4,switch,xbone",
		]);

		$this->command->info("Created Game: ".$dbfz->name);

		$sfvae = Game::create([
			"name" => "Street Fighter V: Arcade Edition",
			"slug" => $this->slugger->sluggify("Street Fighter V: Arcade Edition"),
			"boxart" => "/img/boxarts/sfvae_boxart.jpg",
			"description" => "Street Fighter V: Arcade Edition will include all base content from the original Street Fighter V release, Arcade Mode and a code for Character Pass 1 and 2 content, which includes 12 playable characters and 12 premium costumes. An internet connection is required to redeem this Character Pass content and download additional modes. SFV: AE owners and current Street Fighter V players will also receive new gameplay modes and updates listed below for free via an in-game update when Street Fighter V: Arcade Edition releases.<br/><br/>Current players of Street Fighter V and future owners of Street Fighter V: Arcade Edition will be placed into the same player pool, with PS4 and PC cross-platform play continuing to unite fans into a unified player base. The initial Street Fighter V purchase is still the only one that consumers need to make to ensure they always have the most up-to-date version of the title. All future game mode additions and balance updates are free for Street Fighter V and Street Fighter V: Arcade Edition owners. Additionally, all DLC characters are earnable completely free.",
			"abbreviation" => "sfvae",
			"release_date" => Carbon::parse("January 16, 2018"),
			"platforms" => "arcade,pc,ps4",
		]);

		$this->command->info("Created Game: ".$sfvae->name);

		$usfiv = Game::create([
			"name" => "Ultra Street Fighter IV",
			"slug" => $this->slugger->sluggify("Ultra Street Fighter IV"),
			"boxart" => "/img/boxarts/usfiv_boxart.jpg",
			"description" => "The Street Fighter® IV series evolves to a whole new level with Ultra Street Fighter® IV for PlayStation 3, Xbox 360, and PC. Continuing the tradition of excellence the series is known for, five new characters and six new stages have been added for even more fighting mayhem, with rebalanced gameplay and original modes topping off this ultimate offering.<br/><br/>New Characters<br/>Five new characters: Poison, Hugo, Elena, Rolento, and Decapre join the fight, complete with their own unique play styles, bringing the current roster count to a massive 44 characters.<br/><br/>New Stages<br/>Six new battle environments: Pitstop 109, Mad Gear Hideout, Cosmic Elevator, Blast Furnace, Half Pipe, and Jurassic Era Research Facility, have been added for even more visual variety.<br/><br/>Rebalanced Gameplay<br/>Direct fan feedback was gathered on all of Super Street Fighter IV AE’s original 39 characters and core system mechanics in order to achieve the most balanced Street Fighter ever.",
			"abbreviation" => "usfiv",
			"release_date" => Carbon::parse("June 3, 2014"),
			"platforms" => "pc,ps3,ps4,x360",
		]);

		$this->command->info("Created Game: ".$usfiv->name);
	}
}