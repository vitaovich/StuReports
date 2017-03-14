<?php
$factory->define(App\TeamReport::class, function (Faker\Generator $faker) {
  $student =  App\User::where([['role', '=', 'Student'],
                              ['group_id', '!=', null],
                              ['group_id', '!=', 1]])->inRandomOrder()->first();
  return [
      'easiest_understand' => $faker->text($maxNbChars = 250),
      'hardest_understand' => $faker->text($maxNbChars = 250),
      'easiest_approach' => $faker->text($maxNbChars = 250),
      'hardest_approach' => $faker->text($maxNbChars = 250),
      'easiest_solve' => $faker->text($maxNbChars = 250),
      'hardest_solve' => $faker->text($maxNbChars = 250),
      'easiest_evaluate' => $faker->text($maxNbChars = 250),
      'hardest_evaluate' => $faker->text($maxNbChars = 250),
      'pace' => $faker->text($maxNbChars = 250),
      'client' => $faker->text($maxNbChars = 250),
      'comments' => $faker->text($maxNbChars = 250),
      'sprint' => $faker->numberBetween($min = 1, $max = 20),
      'submitted_by' => $student->id,
      'group_id' => $student->group_id,
  ];
});

// $factory->state(App\TeamReport::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
