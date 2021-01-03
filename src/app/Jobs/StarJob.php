<?php

namespace App\Jobs;

use App\Models\Repo;
use App\Models\User;
use App\Playground\Services\UserService;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Repo
     */
    private $repo;

    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param $repo
     * @param User $user
     */
    public function __construct($repo, User $user)
    {
        $this->repo = $repo;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        config()->set('github.connections.app.clientSecret', $this->user->user_auth->client_secret);

        $repoName = explode('/', $this->repo->name);

        Github::reconnect('app')->me()->starring()->star($repoName[0], $repoName[1]);
    }
}
