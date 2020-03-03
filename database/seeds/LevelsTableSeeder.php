<?php

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $data = [
                ['level_name' => 'niveau1', 'two_stars' => '20s', 'three_stars' => '10s'],
                ['level_name' => 'niveau2', 'two_stars' => '20s', 'three_stars' => '10s'],
                ['level_name' => 'niveau3', 'two_stars' => '30s', 'three_stars' => '20s'],
                ['level_name' => 'niveau4', 'two_stars' => '30s', 'three_stars' => '20s'],
                ['level_name' => 'niveau5', 'two_stars' => '30s', 'three_stars' => '20s'],
                ['level_name' => 'niveau6', 'two_stars' => '30s', 'three_stars' => '20s'],
                ['level_name' => 'niveau7', 'two_stars' => '40s', 'three_stars' => '30s'],
                ['level_name' => 'niveau8', 'two_stars' => '40s', 'three_stars' => '30s'],
                ['level_name' => 'niveau9', 'two_stars' => '40s', 'three_stars' => '30s'],
                ['level_name' => 'niveau10', 'two_stars' => '40s', 'three_stars' => '30s'],
            ];
            Level::insert($data);
    }
}

