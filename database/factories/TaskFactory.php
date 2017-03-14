<?php
$factory->define(App\Task::class, function (Faker\Generator $faker) {
  $student =  App\User::where([['role', '=', 'Student'],
                              ['group_id', '!=', null]])->inRandomOrder()->first();
  $status = ['continuing', 'abandoned', 'new', 'completed'];
  return [
      'description' => $faker->text($maxNbChars = 250),
      'task_name' => $faker->words($nb = 3, $asText = true) ,
      'student_id' => $student->id,
      'sprint_started' => $faker->numberBetween($min = 1, $max = 10),
      'sprint_ended' => $faker->numberBetween($min = 11, $max = 20),
      'status' => $status[$faker->numberBetween($min = 0, $max = 3)],
      'group_id' => $student->group_id,
  ];
});

// $factory->state(App\Task::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
