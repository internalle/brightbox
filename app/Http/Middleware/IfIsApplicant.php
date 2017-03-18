<?php

namespace BB\Http\Middleware;

use Closure;

class IfIsApplicant
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user->isApplicant()) {
            return redirect('/panel/company/profile');
        }

        return $next($request);
    }



}
