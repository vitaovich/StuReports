<?php
$factory->define(App\Classroom::class, function (Faker\Generator $faker) {
  $seasons = ['Fall','Winter','Spring','Summer'];

  return [
      'Teacher_id' => 2,
      'Year' => $faker->numberBetween($min = 1997, $max = 2017),
      'Quarter' => $seasons[$faker->numberBetween($min = 0, $max = 3)],
      'Course_Number' => $faker->numberBetween($min = 1000, $max = 9999),
      'Sprint_length' => $faker->numberBetween($min = 1, $max = 4)
  ];
});
