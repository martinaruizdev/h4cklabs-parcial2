<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \App\Models\Machine;

class RequireExtreme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $machine = $request->route('machine');
        if($machine->difficulty_fk == 4 && !$request->session()->has('level-verified')){
            return to_route('machines.level-verification.show', ['id' => $machine->machine_id]);
        }
        return $next($request);
    }
}
