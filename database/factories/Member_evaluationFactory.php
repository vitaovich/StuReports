<?php
$factory->define(App\Member_evaluation::class, function (Faker\Generator $faker) {
  $report =  App\IndividualReport::inRandomOrder()->first();
  $concur = ['yes', 'no', 'maybe'];
  return [
      'student_id' => $report->student_id,
      'individual_report_id' => $report->id,
      'concur_hours' => $concur[$faker->numberBetween($min = 0, $max = 2)],
      'performing' => $concur[$faker->numberBetween($min = 0, $max = 2)],
      'comments' => $faker->text($maxNbChars = 250),
      'comments_hours' => $faker->text($maxNbChars = 250),
  ];
});

// $factory->state(App\Member_evaluation::class, 'active', function (Faker\Generator $faker) {
//     return [
//         'active' => 1,
//     ];
// });
