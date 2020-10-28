<?php

namespace Database\Factories;

use App\Url;
use Illuminate\Database\Eloquent\Factories\Factory;

class UrlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Url::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl,
            'type' => $this->faker->name,
        ];
    }
}
