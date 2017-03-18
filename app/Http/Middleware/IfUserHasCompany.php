<?php

namespace BB\Http\Middleware;

use Closure;

class IfUserHasCompany
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($this->hasCompany($user)) {
            return redirect('/panel/company/profile');
        }

        return $next($request);
    }


    private function hasCompany($user)
    {
       return empty($user->company_id)? false : true;
    }
}
