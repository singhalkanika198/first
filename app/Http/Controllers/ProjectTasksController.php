<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;
class ProjectTasksController extends Controller
{
    //
    public function update(Task $task)
    {
        $task->completed = 1;
        $task->save();
        return $task;
        return request()->all();
    }

    public function store(Project $project)
    {
        $project->addTask(request()->all());
            //request()->validate(['description'=>'required']));
        $project->save();
        //);



        //        Task::create([
        //            'project_id' => $project->id,
        //            'body' => request('body')
        //        ]);


        //        $task = new Task();
        //        $task->body=request('body');
        //        $task->project_id=request('project_id');
        // $task->save();
        return back();
    }
}
