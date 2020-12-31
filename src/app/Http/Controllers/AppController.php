<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
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
}
