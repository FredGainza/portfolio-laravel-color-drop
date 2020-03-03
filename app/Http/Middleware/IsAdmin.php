<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->type === 'admin') {
            return $next($request);
        }
        return redirect()->route('home')->with('info', 'Vous n\'êtes pas autorisé à accéder à cette ressource');
    }
}
