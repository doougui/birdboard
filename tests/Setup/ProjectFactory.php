<?php

namespace Tests\Setup;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectFactory
{
    protected $tasksCount = 0;
    protected $user;

    public function ownerBy($user)
    {
        $this->user = $user;

        return $this;
    }

    public function withTasks($count)
    {
        $this->tasksCount = $count;

        return $this;
    }

    public function create()
    {
        $project = Project::factory()->create([
            'owner_id' => $this->user ?? User::factory(),
        ]);

        Task::factory()->count($this->tasksCount)->create([
            'project_id' => $project->id,
        ]);

        return $project;
    }
}
