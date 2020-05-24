<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Setting::create([
        'site_name' => 'Jugal\'s Blog',
        'contact_number' => '+880-015-214-616-43',
        'contact_email' => 'contact@blog.com',
        'address' => 'Habiganj'
      ]);
    }
}
