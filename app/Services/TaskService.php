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
    public function index(int $paginate = 10)
    {
        return $this->repository->index($paginate);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
