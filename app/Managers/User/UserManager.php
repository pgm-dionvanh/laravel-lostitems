<?php

namespace App\Managers\User;
use App\Models\User;
use App\Dtos\User\NewUserDto;
Use App\Repository\User\UserRepository;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserManager {
    public const MAX_ATTEMPTS = 10;

    public function __construct(
        private UserRepository $userRepository,     
    ) {
    }
    public function attemptLogin(string $username, string $password): ?User
    {
        if (
            auth()->once(['email' => $username, 'password' => $password])
        ) {
            $user = auth()->user();

            return $user;

        }

        return null;
    }

    public function createUser(NewUserDto $user): ?User
    {
        $user = $this->userRepository->create($user);

       return $user;
    }

}