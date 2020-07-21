<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\UserInfo::class, function (Faker $faker) {

    $gender = mt_rand(1,2) == 1 ? 'f' : 'm';

    return [
        'user_nickname' => $faker->name,
        'gender' => $gender,
        'user_tel' => $faker->phoneNumber,
        'user_avatar' => $faker->imageUrl(),
        'user_department_id' => mt_rand(1,10),
        'user_remark' => $faker->text,
    ];
});
