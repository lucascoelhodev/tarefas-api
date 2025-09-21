<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function store(TaskCreateRequest $request)
    {
        $data = $request->getOnlyData();
        $task = $this->taskService->create($data);
        return response()->json([
            'task' => new TaskResource($task)
        ], 201);
    }
}
