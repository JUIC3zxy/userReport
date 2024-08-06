<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewUser>
 */
class NewUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_name'=>$this->faker->userName,
            'user_id'=>$this->faker->unique()->numberBetween(1,1000),
            'start_date' => $this->faker->dateTimeBetween('2020-01-01','now'),
            'verified'=>$this->faker->boolean()
            
        ];
    }
}

    

