<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(GamesTableSeeder::class);
    }
}
