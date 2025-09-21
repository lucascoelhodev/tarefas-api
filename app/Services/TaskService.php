<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskService
{
    protected TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
    public function show($id)
    {
        return $this->repository->show($id);
    }
}
