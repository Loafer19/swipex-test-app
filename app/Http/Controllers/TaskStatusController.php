<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskStatusController extends Controller
{
    public function complete(Task $task)
    {
        $task->complete();

        return redirect()->route('tasks.index')->with('success', "Task completed successfully!");
    }
}
