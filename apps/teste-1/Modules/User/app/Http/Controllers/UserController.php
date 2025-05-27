<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\User\Services\UserService;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        try {
            $users = $this->userService->getAll();
            return response()->json(['data' => $users], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Erro ao buscar usuários.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = $this->userService->create($data);

            return response()->json([
                'message' => 'Usuário criado com sucesso!',
                'data'    => $user,
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Erro ao criar usuário.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $user = $this->userService->findById($id);
            return response()->json(['data' => $user], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuário não encontrado.'], Response::HTTP_NOT_FOUND);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Erro ao buscar usuário.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $data = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => "required|email|unique:users,email,{$id}",
                'password' => 'nullable|string|min:6|confirmed',
            ]);

            $user = $this->userService->update($id, $data);

            return response()->json([
                'message' => 'Usuário atualizado com sucesso!',
                'data'    => $user,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuário não encontrado.'], Response::HTTP_NOT_FOUND);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Erro ao atualizar usuário.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->userService->delete($id);
            return response()->json(['message' => 'Usuário deletado com sucesso!'], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuário não encontrado.'], Response::HTTP_NOT_FOUND);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Erro ao deletar usuário.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
