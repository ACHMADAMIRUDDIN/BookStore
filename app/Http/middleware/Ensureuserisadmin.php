<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class EnsureUserIsAdmin
{
    /**
     * Pastikan hanya user dengan role 'admin' yang bisa mengakses route.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Halaman ini khusus untuk Admin.');
        }
 
        return $next($request);
    }
}