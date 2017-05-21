<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(OperationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
