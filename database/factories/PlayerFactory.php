<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'event_id' => $faker->numberBetween($min=1 , $max=50),
        'shuttlecocks' => $faker->numberBetween($min=0 , $max=10),
        'totalFee' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 30.00)
    ];
});
