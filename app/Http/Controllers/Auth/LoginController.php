<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\HistoryLog;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->role === 'pembeli') {
    //         return redirect('/pembeli');
    //     } elseif ($user->role === 'admin') {
    //         return redirect('/home');
    //     }  elseif ($user->role === 'penjual') {
    //         return redirect('/penjual');
    //     }
    
    //     return redirect('/');
    // }

    protected function authenticated(Request $request, $user)
    {
    HistoryLog::create([
        'user_id' => $user->id,
        'action' => 'User logged in',
        'timestamp' => now(),
        // You can add more details to the log entry if needed
    ]);


    if ($user->role === 'pembeli') {
        // Redirect the user to the appropriate page
        return redirect('/pembeli')->with('status', 'Welcome, Pembeli!');
    } elseif ($user->role === 'admin') {
        // Redirect the user to the appropriate page
        return redirect('/home')->with('status', 'Welcome, Admin!');
    } elseif ($user->role === 'penjual') {
        // Redirect the user to the appropriate page
        return redirect('/penjual')->with('status', 'Welcome, Penjual!');
    }


    return redirect('/')->with('status', 'Welcome!');
}


protected function sendLoginResponse(Request $request)
{
    $user = $this->guard()->user();
    
    if ($user->role === 'pembeli') {
        return redirect('/pembeli');
    } elseif ($user->role === 'admin') {
        return redirect('/home');
    }
    elseif ($user->role === 'penjual') {
        return redirect('/penjual');
    }

    return redirect('/');
}


    
}