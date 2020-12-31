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
     *
     */
    public function syncRepository()
    {
        $this->userService->syncRepository();

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function redirectGithub()
    {
        return $this->userService->redirectGithub();
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

    /**
     *
     */
    public function logout()
    {
       auth()->logout();

       return redirect()->route('welcome');
    }
}
