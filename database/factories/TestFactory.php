<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$date = Carbon::create(2018, 5, 14, 0, 0, 0);

$factory->define(App\Test::class, function (Faker $faker) use($date) {
    return [
    	'nama' => $faker->name,
        'tgl_buat' => $date->addDays(rand(1,10))->format('Y-m-d H:i:s'),
    ];
});
