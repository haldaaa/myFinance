<?php

namespace Database\Seeders;

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
        // Appel de vos seeders personnalisés
        $this->call([
            CommercialSeeder::class,
            ActionSeeder::class,
        ]);
    }
}
