<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'user_id' => 1,
	    'title' => $faker->realText(30,1),
	    'date' => $date = '2019-03-' . rand(13, 31),
    ];
});
