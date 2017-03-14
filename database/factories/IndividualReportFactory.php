<?php
$factory->define(App\IndividualReport::class, function (Faker\Generator $faker) {
  return [
      'private_comments' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
      'student_id' => App\User::where('role', 'Student')->inRandomOrder()->first()->id,
      'sprint' => $faker->numberBetween($min = 0, $max = 3),
      'total_hours' => $faker->numberBetween($min = 0, $max = 20),
  ];
});

// $factory->state(App\IndividualReport::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
