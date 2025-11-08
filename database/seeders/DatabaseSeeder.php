<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(PermissionSeeder::class);
         $this->call([
            BannerSeeder::class,
            SettingSeeder::class,
            BottomSectionHomeSeeder::class,
            ConsumableSeeder::class,
            NewsSeeder::class,
            ServicePageSeeder::class,
            CareerSeeder::class,
            ProductSeeder::class,

        ]);
    }
}
