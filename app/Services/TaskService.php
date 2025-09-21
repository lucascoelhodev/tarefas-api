<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model ?? new Task();
    }
    public function create($data)
    {
        DB::beginTransaction();
        $task = $this->model->create($data);
        DB::commit();
        return $task;
    }    
}
