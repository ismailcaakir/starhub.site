<?php

declare(strict_types=1);

namespace App\Playground\Interfaces\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface IUserService
{
    /**
     * Login github
     * @return bool|Authenticatable
     */
    public function loginGithub();

    /**
     * @return RedirectResponse
     */
    public function redirectGithub();

    /**
     * @return mixed
     */
    public function syncRepository();
}
