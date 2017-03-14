<?php
$factory->define(App\Task_evaluation::class, function (Faker\Generator $faker) {
  $task = App\TaskReport::inRandomOrder()->first();
  $concur = ['yes', 'no', 'maybe'];
  return [
      'task_id' => $task->task_id,
      'individual_report_id' => $task->individual_report_id,
      'concur' => $concur[$faker->numberBetween($min = 0, $max = 2)],
      'comments' => $faker->text($maxNbChars = 250),
  ];
});

// $factory->state(App\Task_evaluation::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
