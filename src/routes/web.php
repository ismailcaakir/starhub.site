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

Route::get('/', [\App\Http\Controllers\AppController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [\App\Http\Controllers\AppController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/auth/github/redirect', [\App\Http\Controllers\UserController::class, 'redirectGithub'])->name('auth.login.github.redirect');
Route::get('/auth/github/callback', [\App\Http\Controllers\UserController::class, 'callbackGithub'])->name('auth.login.github.callback');

Route::get('/deneme', function () {

    config()->set('github.connections.app.clientSecret', 'f3f1efc7067b0b4685dffd2d791a4972ec300e9b');

    //$dd = Github::connection('app')->me()->starring()->star('kodhub', 'magento2-discord');
});
