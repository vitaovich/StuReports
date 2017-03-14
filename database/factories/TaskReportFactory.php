<?php
$factory->define(App\TaskReport::class, function (Faker\Generator $faker) {

  return [
      'individual_report_id' => App\IndividualReport::inRandomOrder()->first()->id,
      'latest_progress' => $faker->text($maxNbChars = 250),
      'task_id' => App\Task::find(1)->id,
      'sprint' => $faker->numberBetween($min = 1, $max = 20),
      'remaining_sprints' => $faker->numberBetween($min = 1, $max = 14),
      'reassigned' => 0,
  ];
});

// $factory->state(App\TaskReport::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
