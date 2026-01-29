<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User; // Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User|null $user */
        $user = Auth::user();

        // Sekarang IDE tahu $user punya method isStaff()
        if (Auth::check() && $user?->isStaff()) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak! Anda tidak memiliki izin untuk area ini.');
    }
}