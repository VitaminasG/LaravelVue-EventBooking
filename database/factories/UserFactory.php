<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/** @var array $factory */

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'email' => Str::random(1) . '@example.com',
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
	    'api_token' => Str::random(60),
    ];
});
