<?php

declare(strict_types=1);

namespace App\Playground\Services;

use App\Playground\Interfaces\Repositories\IUserRepository;
use App\Playground\Interfaces\Services\IRepoService;
use App\Playground\Interfaces\Services\IUserService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Recca0120\Repository\Criteria;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

class UserService implements IUserService
{
    /**
     * @var IUserRepository
     */
    private $userRepository;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return IUserRepository
     */
    public function getUserRepository(): IUserRepository
    {
        return $this->userRepository;
    }

    /**
     * @return mixed
     * @throws BindingResolutionException
     */
    private function getRepoService()
    {
        return app()->make(IRepoService::class);
    }

    /**
     * @return bool|Authenticatable
     * @throws Throwable
     */
    public function loginGithub()
    {
        $user = Socialite::driver('github')->user();

        $criteria = Criteria::create()->where('email', $user->getEmail());

        if ($userEntity = $this->userRepository->first($criteria)) {
            $this->userRepository->update($userEntity->id, [
                'name' => $user->getName() ?: $user->getNickname(),
                'username' => $user->getNickname(),
                'password' => Str::random(10),
                'avatar' => $user->getAvatar(),
                'github_profile' => json_decode(json_encode($user), true),
                'github_auth' => ['client_secret' => $user->token, 'refresh_token' => $user->token]
            ]);
        } else {
            $userEntity = $this->userRepository->create([
                'email' => $user->getEmail(),
                'name' => $user->getName() ?: $user->getNickname(),
                'username' => $user->getNickname(),
                'password' => Str::random(10),
                'avatar' => $user->getAvatar(),
                'github_profile' => json_decode(json_encode($user), true),
                'github_auth' => ['client_secret' => $user->token, 'refresh_token' => $user->token]
            ]);
        }

        return auth()->loginUsingId($userEntity->id);
    }

    /**
     * @return RedirectResponse
     */
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * @return mixed|void
     * @throws BindingResolutionException
     */
    public function syncRepository()
    {
        $this->getRepoService()->getGithubRepoAndSave();
    }
}
