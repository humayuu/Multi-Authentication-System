<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache;
use function Symfony\Component\Clock\now;
use Symfony\Component\HttpFoundation\Response;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // 1. Update database for persistent "Last Seen"
            $user->update(['last_seen' => now()]);

            // 2. Update Cache for fast "Online" status check (valid for 5 mins)
            cache()->put('user-online-' . $user->id, true, now());
        }
        return $next($request);
    }
}