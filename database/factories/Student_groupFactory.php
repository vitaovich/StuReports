<?php
$factory->define(App\Student_group::class, function (Faker\Generator $faker) {
  return [
      'student_id' => $faker->unique()->numberBetween($min = 3, $max = 23),
      'group_id' => $faker->numberBetween($min = 1, $max = 10),
      'course_id' => 1
  ];
});
