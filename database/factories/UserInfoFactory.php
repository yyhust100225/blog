<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\UserInfo::class, function (Faker $faker) {

    $gender = mt_rand(1,2) == 1 ? 'f' : 'm';

    return [
        'nickname' => $faker->name,
        'gender' => $gender,
        'tel' => $faker->phoneNumber,
        'avatar' => $faker->imageUrl(),
        'department_id' => mt_rand(1,10),
        'remark' => $faker->text,
    ];
});
