<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->name(),
            "email"=> $this->faker->unique()->safeEmail(),
            "username"=> $this->faker->name(),
            "phone"=> $this->faker->numberBetween(),
            "dob"=> $this->faker->date(),
        ];
    }
}
