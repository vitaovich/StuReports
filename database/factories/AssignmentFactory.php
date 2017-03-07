<?php
$factory->define(App\Assignment::class, function (Faker\Generator $faker) {
  return [
      'course_id' => 1,
      'assignment_name' => 'Assignment name',
      'code' => 'N/A',
      'sprint' => '1',
      'open_assignment' => $carbon->now(),
      'close_assignment' => $carbon->now(),
  ];
});
