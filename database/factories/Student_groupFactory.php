<?php
$factory->define(App\Student_group::class, function (Faker\Generator $faker) {
  return [
      'Student_id' => $faker->unique()->numberBetween($min = 3, $max = 13),
      'Group_id' => $faker->numberBetween($min = 1, $max = 10),
      'Class_id' => 1
  ];
});
