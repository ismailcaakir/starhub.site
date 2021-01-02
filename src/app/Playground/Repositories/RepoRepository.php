<?php

declare(strict_types=1);

namespace App\Playground\Repositories;

use App\Models\Repo;
use App\Playground\Interfaces\Repositories\IRepoRepository;
use Recca0120\Repository\EloquentRepository;

class RepoRepository extends EloquentRepository implements IRepoRepository
{
    public function __construct(Repo $model)
    {
        parent::__construct($model);
    }
}
