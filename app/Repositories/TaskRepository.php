<?php

namespace App\Repositories;

use App\Models\Task;
use App\Services\Logger\LoggerInterface;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;
    protected LoggerInterface $logger;
    public function __construct(Task $model, LoggerInterface $logger)
    {
        $this->model = $model;
        $this->logger = $logger;
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $task = $this->model->create($data);
            $this->logger->log('Tarefa criada', "Tarefa {$task->id} criada. Título: {$task->titulo}", $task->id);
            return $task;
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
        return DB::transaction(function () use ($id) {
            $task = $this->model->findOrFail($id);
            $this->logger->log('Tarefa Excluída', "Tarefa {$task->id} excluída. Título: {$task->titulo}", $task->id);
            $task->delete();
            return true;
        });
    }

    public function update($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $task = $this->model->findOrFail($id);
            $task->update($data);
            $this->logger->log('Tarefa Atualizada', "Tarefa {$task->id} atualizada. Título: {$task->titulo}", $task->id);
            return $task;
        });
    }
}
