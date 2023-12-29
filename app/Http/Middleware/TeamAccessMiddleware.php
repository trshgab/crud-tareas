<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Verificar el current_team_id y asignar roles o permisos adecuados

        if ($user->current_team_id == 1) {
            // Usuario con current_team_id = 1 tiene acceso total
            return $next($request);
        } 
        elseif ($user->current_team_id == 2) {
            // Usuario con current_team_id = 2 tiene acceso a tasks y user_activities
            
            if ($request->routeIs(['tasks.*', 'user_activities.*'])) {
                return $next($request);
            }
        } 
        elseif ($user->current_team_id == 3) {
            // Usuario con current_team_id = 3 tiene acceso solo a ver tasks
            
            if ($request->routeIs('tasks.index')) {
                return $next($request);
            }
        }

        // Si no cumple con ninguna condición, denegar el acceso
        return abort(403, 'Acceso no autorizado');
    }
}
