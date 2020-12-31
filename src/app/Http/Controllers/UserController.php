<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Playground\Interfaces\Services\IUserService;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    /**
     * @var IUserService
     */
    private $userService;

    /**
     * @param IUserService $userService
     */
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return RedirectResponse
     */
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callbackGithub()
    {
        $auth = $this->userService->loginGithub();

        if (!$auth) {
            return redirect()->route('welcome');
        }

        return redirect()->route('dashboard');
    }
}
