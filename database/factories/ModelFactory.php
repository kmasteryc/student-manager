<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\User::class, function (Faker\Generator $faker) {
	return [
		'user_name' => $faker->userName,
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'email' => $faker->safeEmail,
		'password' => bcrypt(123456),
		'birthday' => $faker->date('Y-m-d'),
		'role_id' => rand(1,4),
		'info' => $faker->address,
		'remember_token' => str_random(10),
	];
});



