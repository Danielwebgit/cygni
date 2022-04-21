<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$sj4hDtuxjg86Pb6o14iV1.N5YLWh.7/4M5bBcAgNO1X5P7Uip.zRS',
            'created_at' =>  new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }
}
