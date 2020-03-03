<?php

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Anissa',
            'user_id' => 1,
            'difficulty' => 'easy',
            'score' => '25',
        ];
        Player::insert($data);
    }
}
