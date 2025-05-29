<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Http\Requests\StoreTaskRequest;
use Modules\Task\Http\Requests\UpdateTaskStatusRequest;
use Modules\Task\Services\TaskService;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        try {
            $tasks = $this->taskService->listTasks($request->get('status'));
            return response()->json($tasks, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar tarefas'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            $task = $this->taskService->createTask($request->validated());
            return response()->json(['message' => 'Tarefa criada com sucesso.', 'data' => $task], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar tarefa'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateTaskStatusRequest $request, $id)
    {
        try {
            $task = $this->taskService->updateStatus($id, $request->status);
            return response()->json(['message' => 'Status atualizado com sucesso.', 'data' => $task], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar status'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $this->taskService->deleteTask($id);
            return response()->json(['message' => 'Tarefa deletada com sucesso.'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar tarefa'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
