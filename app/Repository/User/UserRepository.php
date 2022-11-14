<?php

namespace App\Repository\User;


use App\Models\User;
use App\Repository\BaseRepository;
use App\Dtos\User\NewUserDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    protected function getModel(): User | Builder
    {
        return User::query();
    }

    public function findByEmail(string $username, array $columns = ['*']): ?User
    {
        return $this->getModel()
            ->where('email', $username)
            ->select($columns)
            ->first();
    }

    public function create(NewUserDto $user): User
    {
        $user = $this->getModel()->create([
            'email' => $user->getEmail(),
            'password' => bcrypt($user->getPassword()),
            'account_created' => time(),
        ]);

        return $user;
    }
}