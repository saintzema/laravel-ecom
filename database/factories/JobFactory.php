<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>

     */
    public function definition(): array
    {
        return [
            //
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary'=>$this->faker->numberBetween(50000, 500000),
            'description'=> $this->faker->paragraph(),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
                ];
    }
}
