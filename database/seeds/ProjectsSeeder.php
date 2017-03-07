<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('project_groups')->insert([
          'course_id' => 1,
          'project' => 'Empty project.',
      ]);
      factory(App\Project_group::class, 10)->create();
      DB::table('project_groups')->insert([
            'course_id' => 10001,
            'project' => "exchange'a'grams"
        ]);
      DB::table('project_groups')->insert([
            'course_id' => 10001,
            'project' => "myFace"
        ]);
    }
}
