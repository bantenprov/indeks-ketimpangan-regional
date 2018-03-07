<?php

namespace Bantenprov\KetimpanganRegional\Http\Middleware;

use Closure;

/**
 * The KetimpanganRegionalMiddleware class.
 *
 * @package Bantenprov\KetimpanganRegional
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KetimpanganRegionalMiddleware
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
        return $next($request);
    }
}
