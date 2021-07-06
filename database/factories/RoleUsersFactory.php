<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\User,App\Role;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'role_id' => Role::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
