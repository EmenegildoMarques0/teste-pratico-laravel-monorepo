<?php

namespace Modules\User\Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;
use Modules\User\Services\UserService;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected UserService $userService;
    protected $mockRepository;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria um mock do repositório
        $this->mockRepository = $this->createMock(UserRepositoryInterface::class);

        // Injeta o mock no serviço
        $this->userService = new UserService($this->mockRepository);
    }

    #[Test]
    public function it_creates_a_user(): void
    {
        $data = [
            'name' => 'Gildo',
            'email' => 'gildo@example.com',
            'password' => 'password123'
        ];

        $this->mockRepository
            ->expects($this->once())
            ->method('create')
            ->with($this->callback(fn($input) => $input['email'] === 'gildo@example.com'))
            ->willReturn(new User($data));

        $user = $this->userService->create($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('gildo@example.com', $user->email);
    }

    #[Test]
    public function it_returns_all_users(): void
    {
        $users = [
            new User(['name' => 'User 1']),
            new User(['name' => 'User 2'])
        ];

        $this->mockRepository
            ->expects($this->once())
            ->method('all')
            ->willReturn($users);

        $result = $this->userService->getAll();

        $this->assertCount(2, $result);
        $this->assertEquals('User 1', $result[0]->name);
    }

    #[Test]
    public function it_finds_user_by_id(): void
    {
        $user = new User(['name' => 'Gildo']);

        $this->mockRepository
            ->expects($this->once())
            ->method('findById')
            ->with(1)
            ->willReturn($user);

        $result = $this->userService->findById(1);

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('Gildo', $result->name);
    }

    #[Test]
    public function it_updates_a_user(): void
    {
        $data = ['name' => 'Gildo Updated'];

        $updatedUser = new User(['name' => 'Gildo Updated']);

        $this->mockRepository
            ->expects($this->once())
            ->method('update')
            ->with(1, $data)
            ->willReturn($updatedUser);

        $result = $this->userService->update(1, $data);

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('Gildo Updated', $result->name);
    }

    #[Test]
    public function it_deletes_a_user(): void
    {
        $this->mockRepository
            ->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(true);

        $result = $this->userService->delete(1);

        $this->assertTrue($result);
    }
}

