<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
	$sentence = $faker->sentence(3);
    return [
        'title' => substr($sentence, 0, strlen($sentence) - 1),
		'content' => $faker->paragraphs(5, true),
    ];
});
