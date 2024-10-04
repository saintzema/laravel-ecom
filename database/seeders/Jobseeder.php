<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class Jobseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employers = Employer::factory()->count(10)->create();
        foreach ($employers as $employer){
        Job::factory()->count(50)->create(['employer_id' => $employer->id]);}
        //
    }
}
