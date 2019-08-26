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
        $this->call(shiftSeeder::class);
        $this->call(sectionSeeder::class);
        $this->call(classSeeder::class);
        $this->call(studentSeeder::class);
        $this->call(adminSeeder::class);


    }
}
