<?php

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * APP
 */
Route::get('/', [\App\Http\Controllers\AppController::class, 'welcome'])
    ->name('welcome');

Route::get('/dashboard', [\App\Http\Controllers\AppController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/user/sync-repository', [\App\Http\Controllers\UserController::class, 'syncRepository'])
    ->middleware('auth')
    ->name('user.sync-repository');

Route::post('/user/push-star-job', [\App\Http\Controllers\AppController::class, 'pushStarJob'])
    ->middleware('auth')
    ->name('push-star-job');
/**
 * AUTH
 */
Route::get('/auth/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('auth.logout');
Route::get('/auth/github/redirect', [\App\Http\Controllers\UserController::class, 'redirectGithub'])->name('auth.login.github.redirect');
Route::get('/auth/github/callback', [\App\Http\Controllers\UserController::class, 'callbackGithub'])->name('auth.login.github.callback');

Route::get('/deneme', function () {

    config()->set('github.connections.app.clientSecret', 'a7b2b917c08544405072883967fd0fb610bfe108');

    $dd = Github::connection('app')->me()->starring()->star('kodhub', 'magento2-discord');
});
