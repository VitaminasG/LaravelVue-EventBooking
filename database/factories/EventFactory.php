<?php

use App\Event;
use Faker\Generator as Faker;

/** @var array $factory */

$factory->define(Event::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 2),
	    'title' => $faker->realText(20,1),
	    'date' => $date = '2019-03-' . rand(13, 31),
    ];
});
