<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->routeIs(['tenant.*'])) {
            Log::info('Connection to a tenant DB');
            $this->connectToTenant();
        }

        return $next($request);
    }

    private function connectToTenant()
    {
        if (Auth::check()) {
            Schema::connection('mysql')->getConnection()->disconnect();
            /** @var User $user */
            $user = Auth::user();
            Config::set('database.connections.tenant', $user->tenant->config + ['driver' => 'mysql']);
            Model::resolveConnection('tenant');
            Schema::connection('tenant')->getConnection()->reconnect();
        }
    }
}
