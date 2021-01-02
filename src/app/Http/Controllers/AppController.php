<?php

namespace App\Http\Controllers;

use App\Playground\Interfaces\Services\IRepoService;
use App\Playground\Services\RepoService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * @var IRepoService
     */
    private $repoService;

    /**
     * AppController constructor.
     * @param IRepoService $repoService
     */
    public function __construct(IRepoService $repoService)
    {
        $this->repoService = $repoService;
    }

    /**
     *
     */
    public function welcome()
    {
        auth()->logout();
        return view('page.welcome');
    }

    /**
     *
     */
    public function index()
    {
        return view('page.index');
    }

    /**
     * @param Request $request
     */
    public function pushStarJob(Request $request)
    {
        $request->validate([
            'repo_id' => 'required|integer|exists:repo,id'
        ]);

        try {
            $status = $this->repoService->makeJob($request->get('repo_id'));

            $message = __('Stars started to slide..');

            if (!$status) {
                $message = __('Error, process not working');
            }

        } catch (\Exception $exception) {
            $message = __($exception->getMessage());
        }

        return redirect()->route('dashboard')->with('message', $message);
    }
}
