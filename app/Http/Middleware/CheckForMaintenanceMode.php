<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as MaintenanceMode;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Closure;

class CheckForMaintenanceMode
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && (trim($_SERVER['HTTP_X_FORWARDED_FOR']) !== ''))
            $ipAddress = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
        else
            $ipAddress = $request->getClientIp();

        if ($this->app->isDownForMaintenance() && !in_array($ipAddress, config('maintenance.dev_ip') ))
        {
            $maintenanceMode = new MaintenanceMode($this->app);
            return $maintenanceMode->handle($request, $next);
        }

        return $next($request);
    }
}
