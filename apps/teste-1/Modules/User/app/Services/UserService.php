<?php

namespace Modules\User\Services;

use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function getAll()
    {
        return $this->userRepository->all();
    }

    public function findById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function create(array $data)
    {
        try {
            return $this->userRepository->create($data);
        } catch (\Exception $e) {
            Log::error('Erro ao criar usuário', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function update(int $id, array $data)
    {
        try {
            return $this->userRepository->update($id, $data);
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar usuário', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function delete(int $id)
    {
        try {
            return $this->userRepository->delete($id);
        } catch (\Exception $e) {
            Log::error('Erro ao deletar usuário', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
