<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckAdminPrivilege
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
        if (auth()->user()->is_admin == false) {

            Log::warning('Korisnik '.auth()->user()->name.' pokušava obrisati objekt iz tablice bez administratorskih ovlasti.');
            return back()->with(
                ['message' => 'Nemate pravo brisanja!']
            );
        }

        return $next($request);
    }
}
