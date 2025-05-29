<?php

namespace Modules\Task\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Task\Models\Task;
use App\Models\User;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria e autentica um usuário antes de cada teste
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_it_creates_a_task()
    {
        $payload = [
            'title' => 'Nova Tarefa',
            'description' => 'Descrição da tarefa',
        ];

        $response = $this->postJson('/api/tasks', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'title' => 'Nova Tarefa',
                     'description' => 'Descrição da tarefa',
                     'user_id' => $this->user->id,
                 ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Nova Tarefa',
            'description' => 'Descrição da tarefa',
            'user_id' => $this->user->id,
        ]);
    }

    public function test_it_lists_all_tasks()
    {
        Task::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_it_filters_tasks_by_status()
    {
        Task::factory()->count(2)->create([
            'user_id' => $this->user->id,
            'status' => 'pendente'
        ]);
        Task::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'concluida'
        ]);

        $response = $this->getJson('/api/tasks?status=pendente');

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_it_updates_task_status()
    {
        $task = Task::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'pendente',
        ]);

        $response = $this->putJson("/api/tasks/{$task->id}", ['status' => 'concluida']);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'concluida']);

        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'concluida']);
    }

    public function test_it_deletes_a_task()
    {
        $task = Task::factory()->create([
            'user_id' => $this->user->id,
        ]);

        $response = $this->deleteJson("/api/tasks/{$task->id}");

       $response->assertStatus(200)
         ->assertJson([
             'message' => 'Tarefa deletada com sucesso.'
         ]);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
