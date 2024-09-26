<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;
use App\Illuminate\Database\Factories\JobFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => $this->faker->company(),
            // 'job' => $this->faker->jobTitle(),
            'location'=> $this->faker->city(),
            'description' =>$this->faker->text(),
            //
        ];
    }
    public function withJobs($count = 3){
        return $this->has(Job::factory()->count($count), 'jobs');
    }
}
