<?php

declare(strict_types=1);

namespace App\Playground\Services;

use App\Jobs\StarJob;
use App\Models\Repo;
use App\Playground\Interfaces\Services\IRepoService;
use App\Playground\Interfaces\Repositories\IRepoRepository;
use Exception;
use GrahamCampbell\GitHub\Facades\GitHub;
use Recca0120\Repository\Criteria;

class RepoService implements IRepoService
{
    /**
     * @var IRepoRepository
     */
    private $repoRepository;

    /**
     * @param IRepoRepository $repoRepository
     */
    public function __construct(IRepoRepository $repoRepository)
    {
        $this->repoRepository = $repoRepository;
    }

    /**
     * @return IRepoRepository
     */
    public function getRepoRepository(): IRepoRepository
    {
        return $this->repoRepository;
    }

    /**
     * @inheritDoc
     */
    public function getGithubRepoAndSave()
    {
        $repositories = Github::me()->repositories();

        $criteria = Criteria::create()->where('user_id', '=', auth()->user()->id);

        $this->getRepoRepository()->getQuery($criteria)->delete();

        foreach ($repositories as $repository) {
            $repository = (object)$repository;
            $this->getRepoRepository()->create([
                'user_id' => auth()->user()->id,
                'repo_id' => $repository->id,
                'name' => $repository->full_name,
                'archived' => $repository->archived,
                'disabled' => $repository->disabled,
                'fork' => $repository->fork,
                'stargazers_count' => $repository->stargazers_count,
                'repo_data' => json_decode(json_encode($repository))
            ]);
        }

        return true;
    }

    /**
     * @param int $repoId
     * @return bool
     * @throws Exception
     */
    public function makeJob(int $repoId)
    {
        $repoEntity = $this->getRepoRepository()->find($repoId);

        if ($repoEntity->user_id != auth()->user()->id) {
            throw new Exception(__('Permission error'));
        }

        /** @var Repo $repoEntity */
        dispatch(new StarJob($repoEntity));

        return true;
    }
}
