<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class RoleAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        try {

            $user = auth()->user();

            // check user role
            if (!in_array($user->role, $roles)) {
                throw new Exception("You are not authorised to view this page...");
            }
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with(['status' => $th->getMessage()]);
        }

        return $next($request);
    }
}
