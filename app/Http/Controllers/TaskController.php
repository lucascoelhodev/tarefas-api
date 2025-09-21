<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    public function show($id)
    {
        try {
            $task = $this->taskService->show($id);
            return new TaskResource($task);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }
    public function index()
    {
        $paginate = request()->query('per_page', 10);
        $tasks = $this->taskService->index($paginate);
        return TaskResource::collection($tasks);
    }
}
