<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name' => "Jugal Kishore Chanda",
          'email' => "jugal@jugal.com",
          'password' => bcrypt('123456'),
        ]);
    }
}
