<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    private $openRoutes = ['free/route', 'free/too'];

//modify this function
public function handle($request, Closure $next)
    {
        //add this condition 
    foreach($this->openRoutes as $route) {

      if ($request->is($route)) {
        return $next($request);
      }
    }
    
    return parent::handle($request, $next);
  }
}
