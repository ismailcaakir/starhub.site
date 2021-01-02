<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property mixed repo_data
 */
class Repo extends Model
{
    /**
     * @var string
     */
    protected $table = 'repo';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'repo_id', 'name', 'archived', 'disabled', 'fork', 'stargazers_count', 'repo_data'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'repo_id' => 'integer',
        'name' => 'string',
        'archived' => 'boolean',
        'disabled' => 'boolean',
        'fork' => 'boolean',
        'stargazers_count' => 'integer',
        'repo_data' => 'json'
    ];

    /**
     * @return HasOne|User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return mixed
     */
    public function getRepoDataAttribute()
    {
        return (object)$this->repo_data;
    }
}
