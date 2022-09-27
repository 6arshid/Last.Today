<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UsersSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(TokenSeeder::class);
        $this->call(FeedsSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(LivesSeeder::class);
        }
}
