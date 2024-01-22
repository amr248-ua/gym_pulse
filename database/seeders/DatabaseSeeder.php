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
        \App\Models\User::factory(100)->create();
        $this->call( ActivitiesTableSeeder ::class );
        $this->call( InstallationsTableSeeder ::class );
        $this->call( FeesTableSeeder ::class );
        $this->call( CalendarsTableSeeder ::class );
        $this->call( UsersSeeder ::class );
        
    }
}
