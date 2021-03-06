<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

/**
 * @property mixed github_auth
 * @property mixed github_profile
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'avatar',
        'github_profile',
        'github_auth',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'username' => 'string',
        'avatar' => 'string',
        'github_profile' => 'json',
        'github_auth' => 'json',
    ];

    /**
     * @return HasMany|Repo
     */
    public function repos()
    {
        return $this->hasMany(Repo::class, 'user_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getUserProfileAttribute()
    {
        return (object)$this->github_profile['user'];
    }

    /**
     * @return mixed
     */
    public function getUserAuthAttribute()
    {
        return (object)$this->github_auth;
    }
}
