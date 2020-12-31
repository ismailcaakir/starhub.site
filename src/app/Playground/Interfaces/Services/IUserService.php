<?php

declare(strict_types=1);

namespace App\Playground\Interfaces\Services;

interface IUserService
{
    /**
     * Login github
     * @return mixed
     */
    public function loginGithub();
}
