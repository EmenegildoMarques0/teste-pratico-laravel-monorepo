<?php

namespace Modules\Task\Repositories\Contracts;

interface TaskRepositoryInterface
{
    public function allByUser($userId, $status = null);
    public function create(array $data);
    public function findByIdAndUser($id, $userId);
    public function updateStatus($id, $userId, $status);
    public function delete($id, $userId);
}