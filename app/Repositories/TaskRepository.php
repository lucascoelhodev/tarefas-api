<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->model->create($data);
        });
    }
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    public function index($paginate)
    {
        return $this->model->paginate($paginate);
    }
    public function delete($id)
    {
        $task = $this->model->findOrFail($id);
        $task->delete();
        return true;
    }
}
