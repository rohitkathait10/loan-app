<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user) {
            if (
                $user->membership_end &&
                now()->greaterThan($user->membership_end) &&
                $user->membership_status != 0
            ) {
                $user->update(['membership_status' => 0]);
            }

            if ($user->membership_status == 0) {

                auth()->logout();

                return redirect()->route('login')
                    ->with('swal', true)
                    ->with('swal.title', 'Membership Expired')
                    ->with('swal.text', 'Your membership has expired. Please contact the support to continue.')
                    ->with('swal.icon', 'warning');
            }
        }

        return $next($request);
    }
}
