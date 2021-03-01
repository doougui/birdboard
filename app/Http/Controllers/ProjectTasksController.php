<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        request()->validate(['body' => 'required']);
        $project->addTask(request('body'));

        return redirect($project->path());
    }
}
