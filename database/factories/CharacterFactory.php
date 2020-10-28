<?php

namespace Database\Factories;

use App\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(200),
            'modified' => $this->faker->iso8601,
            'thumbnail'=> $this->faker->imageUrl,
        ];
    }
}
