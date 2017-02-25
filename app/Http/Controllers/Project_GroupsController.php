<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_group;
use App\User;

class Project_GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Project_group;
        $group->course_id = $request->course_id;
        $group->project = $request->project;
        $group->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_group = Project_group::find($id);
        return view('Group.edit', ['project_group' => $project_group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Project_group::find($id);
        if($request->project_leader == 0) {
          $group->project_leader = null;
        }
        else {
          $group->project_leader = $request->project_leader;
        }
        $group->course_id = $request->course_id;
        $group->project = $request->project;
        $group->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Project_group::find($id);
        $members = $group->students;
        foreach($members as $member)
        {
            $member->group_id = 1;
            $member->save();
        }
        $group->delete();

        return redirect('/home');
    }
}
