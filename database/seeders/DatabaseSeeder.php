<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $this->call(Jobseeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(EmployerSeeder::class);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    $employers = Employer::factory(3)->create(); // Create 3 employers

    // Distribute 10 jobs among the 3 employers
    foreach ($employers as $employer) {
        Job::factory(18)->create(['employer_id' => $employer->id]); // Create 3 jobs for each employer
    }

    // Create 1 additional job for a random employer to make a total of 10
    // Job::factory()->create(['employer_id' => $employers->random()->id]);
}

// $job = Job::factory(10)->create();

// Employer::factory(3)->hasAttached($job)->create();
//     }

}
