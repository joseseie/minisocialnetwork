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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'username' => $faker->word,
        'job' => Carbon\Carbon::parse('July 3 1993'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
        'live' => $faker->boolean(),
        'post_on' => Carbon\Carbon::parse('+1 week')
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'sender_user_id' => App\User::all()->random()->id,
        'receiver_user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
        'assunto' => $faker->text(10)
    ];
});
