<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nama'  => $faker->name,
        'alamat'    => $faker->address,
        'umur'  => $faker->randomNumber(16, 35),
        'bio'   => $faker->text(),
        'status' => $faker->randomElement(['Remaja', 'Dewasa'])
    ];
});
