<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $userRole = \Auth::user()->role;
        
        if (in_array($userRole, $roles)) {
            return $next($request);
        }
        
        return redirect('/home'); // Redirect to the appropriate page
    }
}
