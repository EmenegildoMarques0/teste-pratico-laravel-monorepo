<?php

namespace Modules\Task\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Task\Repositories\Contracts\TaskRepositoryInterface;

class TaskService
{
    protected $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listTasks($status = null)
    {
        $userId = Auth::id() ??  9;
        return $this->repository->allByUser($userId, $status);
    }

    public function createTask(array $data)
    {
        DB::beginTransaction();

        try {
            $data['user_id'] = Auth::id() ?? 9;
            $task = $this->repository->create($data);
            DB::commit();

            return $task;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao criar tarefa: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateStatus($id, $status)
    {
        DB::beginTransaction();

        try {
            $task = $this->repository->updateStatus($id, Auth::id() ?? 9, $status);
            DB::commit();

            return $task;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro ao atualizar status da tarefa ID $id: " . $e->getMessage());
            throw $e;
        }
    }

    public function deleteTask($id)
    {
        DB::beginTransaction();

        try {
            $this->repository->delete($id, Auth::id() ?? 9);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro ao deletar tarefa ID $id: " . $e->getMessage());
            throw $e;
        }
    }
}
