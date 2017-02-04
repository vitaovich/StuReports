@extends('layouts.app')

@section('title', 'Create class')

@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Create a course</div>

              <div class="panel-body">
                <form method="POST" action="/course">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                  Professor:
                    <!-- <input type="text" name="teacher_id" id="teacher_id"> -->
                    <?php
                        $instructors = App\User::where('role', '=', 'Instructor')->get()->toArray();
                        $options = [];
                        //echo json_encode($instructors);
                        foreach($instructors as $instructor)
                            $options[$instructor['id']] = $instructor['name'];
                    ?>
                    {{ Form::select('teacher_id', $options) }}
                </div>
                <div>
                  Year:
                  <input type="number" name="year" id="year">
                </div>
                <div>
                  Quarter:
                  <select name="quarter">
                    <option value="Fall">Fall</option>
                    <option value="Winter">Winter</option>
                    <option value="Spring">Spring</option>
                    <option value="Summer">Summer</option>
                  </select>
                </div>
                <div class="form-group row">
                    {{ Form::label('active', 'Active') }}
                    {{ Form::hidden('active', 0) }}
                    {{ Form::checkbox('active', 1) }}
                </div>
                <div>
                  Course Number:
                  <input type="number" name="course_number" id="course_number">
                </div>
                <div>
                  Sprint Length:
                  <input type="number" name="sprint_length" id="sprint_length">
                </div>
                <div>
                  <button type="submit">Create</button>
                </div>
                </form>
              </div>
          </div>
      </div>
  </div>

@endsection
