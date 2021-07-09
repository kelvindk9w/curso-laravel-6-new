<?php

namespace Database\Factories;

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->sentence(),
        'price' => 12.2,
    ];
});
