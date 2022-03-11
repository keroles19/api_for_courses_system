<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard = null)
    {
            if($guard != null) {
                auth()->shouldUse($guard);
                $token = $request->header('api_token');
                $request->headers->set('api_token', (string) $token, true);
                $request->headers->set('Authorization', 'Bearer' . $token, true);
                try {
                   $user = JWTAuth::parseToken()->authenticate();
                } catch (TokenExpiredException $e) {
                    return response(['error' => 'invalid token '], 404 ?: 400);
                }
                catch (JWTException $e){
                    return response(['error' => 'invalid token '], 404?: 400);

                }
            }

        return $next($request);



    }
}
