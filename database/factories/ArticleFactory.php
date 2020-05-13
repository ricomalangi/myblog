<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Article;
use App\User;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Article::class, function (Faker $faker) {
    $judul = $faker->sentence(4);
    return [
        'judul' => $judul,
        'slug' => Str::slug($judul, '-'),
        'konten' => $faker->sentence(60),
        'sampul' => 'null.jpg',
        'user_id' => User::inRandomOrder()->first()->id,
        'category_id'=> Category::inRandomOrder()->first()->category_id,
        'status' => 'draft'
    ];
});
