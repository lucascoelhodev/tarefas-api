<?php

namespace Tests\Feature;

use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\Passport;
use Mockery;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tasks()
    {
        Task::factory()
            ->count(3)
            ->create();
        $response = $this->getJson('/api/tasks');
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }
    public function test_can_create_task()
    {
        $task = Task::factory()
            ->make()
            ->toArray();
        $response = $this->postJson('/api/tasks', $task, []);
        $response->assertStatus(201)
            ->assertJsonFragment(['titulo' => $task['titulo']]);
    }
    public function test_can_show_task()
    {
        $task = Task::factory()->create();
        $response = $this->getJson("/api/tasks/{$task->id}");
        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $task->id]);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $title = fake()->sentence(3);
        $data = ['titulo' => $title];
        $response = $this->putJson("/api/tasks/{$task->id}", $data);
        $response->assertStatus(200)
            ->assertJsonFragment(['titulo' => $title]);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();
        $response = $this->deleteJson("/api/tasks/{$task->id}", []);
        $response->assertStatus(204);
        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }


    public function test_show_returns_404_if_task_not_found()
    {
        $invalidId = 9999;
        $this->mock(TaskService::class, function ($mock) use ($invalidId) {
            $mock->shouldReceive('show')->with($invalidId)->once()->andReturn(null);
        });
        $response = $this->getJson("/api/tasks/{$invalidId}");
        $response->assertStatus(404);
        $response->assertExactJson([
            'message' => 'Task not found'
        ]);
    }
    public function test_update_returns_404_if_task_not_found()
    {
        $invalidId = 9999;

        $this->mock(TaskService::class, function ($mock) use ($invalidId) {
            $mock->shouldReceive('update')
                ->with($invalidId, Mockery::any())
                ->once()
                ->andThrow(ModelNotFoundException::class);
        });

        $response = $this->putJson("/api/tasks/{$invalidId}", [
            'titulo' => 'Teste'
        ]);

        $response->assertStatus(404);
        $response->assertExactJson([
            'message' => 'Task not found'
        ]);
    }
    public function test_delete_returns_404_if_task_not_found()
    {
        $invalidId = 9999;
        $this->mock(TaskService::class, function ($mock) use ($invalidId) {
            $mock->shouldReceive('delete')
                ->with($invalidId)
                ->once()
                ->andThrow(ModelNotFoundException::class);
        });
        $response = $this->deleteJson("/api/tasks/{$invalidId}");
        $response->assertStatus(404);
        $response->assertExactJson([
            'message' => 'Task not found'
        ]);
    }
    public function test_index_returns_empty_collection_if_no_tasks_found()
    {
        $emptyPaginator = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
        $this->mock(TaskService::class, function ($mock) use ($emptyPaginator) {
            $mock->shouldReceive('index')->once()->andReturn($emptyPaginator);
        });
        $response = $this->getJson('/api/tasks');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [],
        ]);
    }
}
