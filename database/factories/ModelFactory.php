<?php


$factory->define(App\Character::class, function (Faker\Generator $faker) {
    return [
        'name' => $this->faker->name,
        'description' => $this->faker->text(200),
        'modified' => $this->faker->name,
        'thumbnail'=> $this->faker->name,
        'resourceURI' => $this->faker->name           
    ];
});