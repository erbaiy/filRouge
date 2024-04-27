<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OrganizerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $user = DB::table('users')
            ->join('role', 'users.role_id', '=', 'role.id')
            ->where('users.id', '=', session('id'))
            ->first();

        // Check if the user exists and has an admin role
        if ($user && $user->name === 'organizer') {
            return $next($request);
        }

        // Redirect or return response if not an admin or user not found
        return redirect('/Unauthorized')->with('error', 'Unauthorized');
    }
}
