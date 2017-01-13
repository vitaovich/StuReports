<?php
$factory->define(App\Project_group::class, function (Faker\Generator $faker) {
  return [
      'Class_id' => 1,
      'Project' => $faker->sentence($nbWords = 3, $variableNbWords = true)
  ];
});
