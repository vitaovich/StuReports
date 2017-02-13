<?php
$factory->define(App\Project_group::class, function (Faker\Generator $faker) {
  return [
      'course_id' => 2,
      'project' => $faker->sentence($nbWords = 3, $variableNbWords = true)
  ];
});
