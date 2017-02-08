<?php
$factory->define(App\Course::class, function (Faker\Generator $faker) {
  $seasons = ['Fall','Winter','Spring','Summer'];

  return [
      'teacher_id' => 2,
      'year' => $faker->numberBetween($min = 1997, $max = 2017),
      'quarter' => $seasons[$faker->numberBetween($min = 0, $max = 3)],
      'course_number' => $faker->numberBetween($min = 1000, $max = 9999),
      'sprint_length' => $faker->numberBetween($min = 1, $max = 4)
  ];
});

$factory->state(App\Course::class, 'active', function (Faker\Generator $faker) {
    return [
        'active' => 1,
    ];
});
