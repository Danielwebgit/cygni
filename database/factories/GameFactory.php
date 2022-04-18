<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Ping Pong',
            'description' => $this->faker->text(),
            'category' => 'Tênis de mesa',
            'created_at' =>  new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }
}
