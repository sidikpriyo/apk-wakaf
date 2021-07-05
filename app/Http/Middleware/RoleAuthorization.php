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
            if (!$user || !in_array($user->role, $roles)) {
                throw new Exception("You are not authorised to view this page...");
            }
        } catch (\Throwable $th) {
            $this->unauthorized($th);
        }

        return $next($request);
    }

    private function unauthorized(Exception $e)
    {
        return redirect()->route('dashboard')->with(['status' => $e->getMessage()]);
    }
}
