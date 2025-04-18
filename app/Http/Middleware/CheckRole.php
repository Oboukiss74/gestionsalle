<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirige si l'utilisateur n'est pas connecté
        }

        if (!Auth::user()->hasRole($roles)) {
            abort(403, "Vous n'avez pas l'autorisation d'accéder à cette page.");
        }

        return $next($request);
    }
}
