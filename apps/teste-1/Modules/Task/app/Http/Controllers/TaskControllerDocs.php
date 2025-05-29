<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Http\Requests\StoreTaskRequest;
use Modules\Task\Http\Requests\UpdateTaskStatusRequest;
use Modules\Task\Services\TaskService;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Tarefas",
 *     description="Endpoints para gerenciamento de tarefas"
 * )
 * 
 * @OA\Schema(
 *     schema="Task",
 *     title="Task",
 *     description="Modelo de uma tarefa na aplicação",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Estudar Swagger"),
 *     @OA\Property(property="description", type="string", example="Ler a documentação do Swagger para anotações OpenAPI"),
 *     @OA\Property(property="status", type="string", enum={"pendente", "em andamento", "concluída"}, example="pendente"),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-05-28T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-05-28T12:00:00Z")
 * )
 */
class TaskControllerDocs 
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @OA\Get(
     *     path="/api/tasks",
     *     summary="Listar tarefas do usuário",
     *     tags={"Tarefas"},
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Filtrar tarefas por status: pendente, em andamento, concluída",
     *         required=false,
     *         @OA\Schema(type="string", enum={"pendente", "em andamento", "concluída"})
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tarefas",
     *         @OA\JsonContent(type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Comprar pão"),
     *                 @OA\Property(property="description", type="string", example="Ir à padaria amanhã cedo"),
     *                 @OA\Property(property="status", type="string", example="pendente"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=500, description="Erro interno")
     * )
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Criar uma nova tarefa",
     *     tags={"Tarefas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="title", type="string", example="Comprar pão"),
     *             @OA\Property(property="description", type="string", example="Ir à padaria amanhã cedo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarefa criada com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Tarefa criada com sucesso."),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Comprar pão"),
     *                 @OA\Property(property="description", type="string", example="Ir à padaria amanhã cedo"),
     *                 @OA\Property(property="status", type="string", example="pendente")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=422, description="Erro de validação"),
     *     @OA\Response(response=500, description="Erro interno")
     * )
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/tasks/{id}",
     *     summary="Atualizar status da tarefa",
     *     tags={"Tarefas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID da tarefa",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"status"},
     *             @OA\Property(property="status", type="string", example="concluída", enum={"pendente", "em andamento", "concluída"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Status atualizado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Status atualizado com sucesso."),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="status", type="string", example="concluída")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=422, description="Erro de validação"),
     *     @OA\Response(response=500, description="Erro interno")
     * )
     */
    public function update(UpdateTaskStatusRequest $request, $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *     path="/api/tasks/{id}",
     *     summary="Deletar tarefa",
     *     tags={"Tarefas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID da tarefa",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(response=200, description="Tarefa deletada com sucesso"),
     *     @OA\Response(response=500, description="Erro interno")
     * )
     */
    public function destroy($id)
    {
        //
    }
}
