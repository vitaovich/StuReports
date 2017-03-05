<?php
$factory->define(App\Course::class, function (Faker\Generator $faker) {


  return [
      'teacher_id' => 1,
      'year' => $faker->numberBetween($min = 1997, $max = 2017),
      'quarter' => $faker->numberBetween($min = 0, $max = 3),
      'course_title' => 'CSCD 488',
      'sprint_length' => $faker->numberBetween($min = 7, $max = 14)
  ];
});

$factory->state(App\Course::class, 'active', function (Faker\Generator $faker) {
    return [
        'active' => 1,
    ];
});
