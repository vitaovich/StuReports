<?php
$factory->define(App\IndividualTimeLog::class, function (Faker\Generator $faker) {
  return [
      'individual_report_id' => App\IndividualReport::inRandomOrder()->first()->id,
      'day' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'hours' => $faker->numberBetween($min = 0, $max = 20),
      'description' => $faker->text($maxNbChars = 250) ,
  ];
});

// $factory->state(App\IndividualTimeLog::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
