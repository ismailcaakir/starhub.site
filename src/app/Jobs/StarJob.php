<?php

namespace App\Jobs;

use App\Models\Repo;
use App\Playground\Services\UserService;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Recca0120\Repository\Criteria;
use function Psy\debug;

class StarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Repo
     */
    private $repo;

    /**
     * Create a new job instance.
     *
     * @param Repo $repo
     */
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Execute the job.
     *
     * @param UserService $userService
     * @return void
     */
    public function handle(UserService $userService)
    {
        $criteria = Criteria::create()->whereNotNull('github_auth')->inRandomOrder()->limit(10);

        $bots = $userService->getUserRepository()->get($criteria);

        foreach ($bots as $bot) {
            config()->set('github.connections.app.clientSecret', $bot->user_auth->client_secret);

            logger()->info($bot->user_auth->client_secret . ' user key');

            $repoName = explode('/', $this->repo->name);

            Github::connection('app')->me()->starring()->star($repoName[0], $repoName[1]);
        }
    }
}
