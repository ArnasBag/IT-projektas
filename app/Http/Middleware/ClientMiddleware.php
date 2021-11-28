<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->isClient($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
    protected function isClient($request)
    {
        return $request->user()->type === null;
    }
}
