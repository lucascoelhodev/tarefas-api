<?php

namespace Tests\Unit\Services;

use App\Repositories\TaskRepositoryInterface;
use App\Services\TaskService;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class TaskServiceTest extends TestCase
{
    use WithFaker;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
    public function test_create_task()
    {
        $inputData = [
            'titulo' => 'Teste',
            'descricao' => 'Teste',
            'status' => 1,
        ];
        $mockRepo = Mockery::mock(TaskRepositoryInterface::class);
        $mockRepo->shouldReceive('create')
            ->once()
            ->with(Mockery::on(fn($arg) => $arg['status'] === 1))
            ->andReturn((object) array_merge($inputData, ['manager_id' => 99]));

        $service = new TaskService($mockRepo);
        $result = $service->create($inputData);

        $this->assertEquals(1, $result->status);
    }
    public function test_update_task()
    {
        $inputData = ['titulo' => 'Test Updated'];
        $mockRepo = Mockery::mock(TaskRepositoryInterface::class);
        $mockRepo->shouldReceive('update')
            ->once()
            ->with(1, $inputData)
            ->andReturn((object) array_merge($inputData, ['id' => 1, 'status' => 1]));
        $service = new TaskService($mockRepo);
        $result = $service->update(1, $inputData);
        $this->assertEquals('Test Updated', $result->titulo);
    }
    public function test_delete_task()
    {
        $mockRepo = Mockery::mock(TaskRepositoryInterface::class);
        $mockRepo->shouldReceive('delete')
            ->once()
            ->with(1)
            ->andReturnTrue(); // retorna true, como o serviço faz
        $service = new TaskService($mockRepo);
        $result = $service->delete(1);
        $this->assertTrue($result); // agora o teste verifica true
    }
}
