<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track successful GET requests for frontend web pages
        if ($request->isMethod('GET') && $response->isSuccessful()) {
            $path = $request->path();

            // Skip internal and admin endpoints
            if (
                ! $request->is('admin*', 'filament*', 'livewire*', '_debugbar*', 'sanctum*', 'up', 'build/*', 'storage/*') &&
                ! $request->ajax() &&
                ! $request->wantsJson()
            ) {
                try {
                    PageView::record($request);
                } catch (Throwable $e) {
                    // Suppress tracking errors so the user experience is never impacted
                    report($e);
                }
            }
        }

        return $response;
    }
}
