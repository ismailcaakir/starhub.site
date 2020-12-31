<?php

declare(strict_types=1);

namespace App\Playground\Services;

use App\Playground\Interfaces\Repositories\IUserRepository;
use App\Playground\Interfaces\Services\IUserService;
use Laravel\Socialite\Facades\Socialite;
use Recca0120\Repository\Criteria;
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
     * @return mixed|void
     * @throws Throwable
     */
    public function loginGithub()
    {
        $user = Socialite::driver('github')->user();

        $criteria = Criteria::create()->where('email', $user->getEmail());

        if ($userEntity = $this->userRepository->first($criteria)) {
            $this->userRepository->update($userEntity->id, [
                'name' => $user->getName(),
                'username' => $user->getNickname(),
                'avatar' => $user->getAvatar(),
                'github_profile' => json_decode(json_encode($user), true),
                'github_auth' => ['client_secret' => $user->token, 'refresh_token' => $user->token]
            ]);
        } else {
            $userEntity = $this->userRepository->create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'username' => $user->getNickname(),
                'avatar' => $user->getAvatar(),
                'github_profile' => json_decode(json_encode($user), true),
                'github_auth' => ['client_secret' => $user->token, 'refresh_token' => $user->token]
            ]);
        }

        return auth()->loginUsingId($userEntity->id);
    }
}
