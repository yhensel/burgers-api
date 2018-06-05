<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Passport\Client;

class CheckOnlyClientCredentials
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $client = Client::find($request->input('client_id'));

        if (! $client->secret == $request->input('client_secret') && $request->input('grant_type') == 'password') {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
