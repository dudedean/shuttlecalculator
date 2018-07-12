<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'place' => $faker->address(),
        'hall' => $faker->randomElement($array = array(10, 15, 20)),
        'shuttlecockfees' => 2,
        'dateEvent' => $faker->date(),
        'timeEvent' => $faker->time(),
    ];
});


// factory(App\Event::class, 50)->create();
