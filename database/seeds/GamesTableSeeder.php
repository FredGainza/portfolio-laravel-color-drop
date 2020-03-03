<?php

use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'player_id' => '1',
            'level_id' => '1',
            'score_level' => '3',
        ];
        Game::insert($data);
    }
}
