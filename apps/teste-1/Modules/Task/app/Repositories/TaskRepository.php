<?php

namespace Modules\Task\Repositories;

use Modules\Task\Models\Task;
use Modules\Task\Repositories\Contracts\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function allByUser($userId, $status = null)
    {
        $query = Task::where('user_id', $userId);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function findByIdAndUser($id, $userId)
    {
        return Task::where('user_id', $userId)->findOrFail($id);
    }

    public function updateStatus($id, $userId, $status)
    {
        $task = $this->findByIdAndUser($id, $userId);
        $task->update(['status' => $status]);

        return $task;
    }

    public function delete($id, $userId)
    {
        $task = $this->findByIdAndUser($id, $userId);
        return $task->delete();
    }
}
