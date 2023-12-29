<?php

use App\Models\GameLink;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScriptAddImages extends Migration
{
    public function up(): void
    {
        $imageMapper = [
            'https://flagle-game.com/' => 'flagle2.png',
            'https://wordle-israel.web.app/cities' => 'wordle-israel-cities.png',
            'https://citydle-il.web.app/' => 'citydle.png',
            'https://cloudle.app/' => 'cloudle.png',
            'https://countryle.com/' => 'countryle.png',
            'https://cowordle.org/' => 'victordle.png',
            'https://wordle.louan.me/' => 'le-mot.png',
            'https://likewisetv.com/arcade/posterdle' => 'postordle.png',
            'https://guessthe.game/' => 'guesst-the-game.png',
            'https://www.gamedle.wtf/' => 'gamedle.png',
            'https://globle-capitals.com/game' => 'globe-capitals.png',
            'https://wheretakenusa.teuteuf.fr/' => 'whaere-taken-usa.png',
            'https://www.haaretz.co.il/riddles/ty-page/haaretz-wordle' => 'israel-wordle.png',
            'https://www.nytimes.com/games/wordle/index.html' => 'wordle.png',
            'https://globle-game.com/' => 'globe.png',
            'https://worldle.teuteuf.fr/' => 'worldle.png',
            'https://sweardle.com/' => 'sweardle.png',
            'https://framed.wtf/' => 'framed-wtf.png',
            'https://www.britannica.com/games/octordle/?mwrd=646be83fc80330b14f5462d1' => 'octordle.png',
            'https://wordlegame.org/' => 'wordle-game.png',
            'https://plotwords.com/daily' => 'plotwords.png',
            'https://likewisetv.com/arcade/moviedle' => 'likewisetv.png',
            'https://semantle.ishefi.com/?guesses=[]' => 'smentle.png',
            'https://episode.wtf/?ref=framed' => 'episode-wtf.png',
            'https://degle.ishefi.com/' => 'degle.png',
            'https://statele.teuteuf.fr/' => 'statle.png',
            'https://lapalabradeldia.com/' => 'palabra.png',
            'https://virtualvacation.us/guess' => 'cityguesser.png',
            'https://wheretaken.teuteuf.fr/' => 'wheretaken.png',
            'https://emovi.teuteuf.fr/' => 'emovi.png',
            'https://mimamu.ishefi.com/' => 'mimamu.png',
            'https://www.flagle.io/' => 'flagle.png',
            'https://ducc.pythonanywhere.com/flaggle/' => 'flaggle.png',
            'https://flagle.net/' => 'flagle2.png',
        ];
        $gameLinks = GameLink::all();
        foreach ($gameLinks as $gameLink) {
            if (! isset($imageMapper[$gameLink->link])) {
                continue;
            }
            $gameLink->image = $imageMapper[$gameLink->link];
            $gameLink->save();
        }

    }

    public function down()
    {
        //
    }
}
