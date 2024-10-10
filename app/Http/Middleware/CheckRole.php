<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $role): Response
    {
        if (!Auth::check()) {
            // User is not logged in
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            // User does not have the right role
            return redirect('/');
        }

        return $next($request);
    }
}
