<?php
// app\Http\Controllers\HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check if the authenticated user has the "rt" or "umum" role


        // Check if the authenticated user has the "admin" role
        if (auth()->user()->hasRole('admin')) {
            // Redirect to the admin page
            return view('admin');
        }
        if (auth()->user()->hasRole('umum')) {
            // Redirect to the admin page
            return view('umum');
        }
        if (auth()->user()->hasRole('rt')) {
            // Redirect to the admin page
            return view('umum');
        }

        // Default redirect if the user doesn't have any specified role
        return redirect('/home');
    }
}
