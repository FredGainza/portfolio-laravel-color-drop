<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Nourtier',
            'email' => 'nour@gmail.fr',
            'password' => Hash::make('000000'),
            'cgu' => '1',
        ];
        User::insert($data);
    }
}
