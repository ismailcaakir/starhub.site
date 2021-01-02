<?php

declare(strict_types=1);

namespace App\Playground\Repositories;

use App\Models\User;
use App\Playground\Interfaces\Repositories\IUserRepository;
use Recca0120\Repository\EloquentRepository;

class UserRepository extends EloquentRepository implements IUserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
