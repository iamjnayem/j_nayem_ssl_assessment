<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\StudentSubjectSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
           DepartmentSeeder::class,
           SubjectSeeder::class,
           StudentSeeder::class,
           StudentSubjectSeeder::class
        ]);

    }
}
