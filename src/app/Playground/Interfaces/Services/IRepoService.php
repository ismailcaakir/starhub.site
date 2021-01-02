<?php

declare(strict_types=1);

namespace App\Playground\Interfaces\Services;

interface IRepoService
{
    /**
     * Get github repository
     * @return mixed
     */
    public function getGithubRepoAndSave();

    /**
     * @param int $repoId
     * @return mixed
     */
    public function makeJob(int $repoId);
}
