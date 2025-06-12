<?php

namespace App\Http\Middleware;

use App\Models\BlockedIp;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBlockedIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        
        if (BlockedIp::isBlocked($ipAddress)) {
            if ($request->ajax()) {
                return response()->json(['error' => 'عذراً، تم حظر عنوان IP الخاص بك.'], 403);
            }
            
            abort(403, 'عذراً، تم حظر عنوان IP الخاص بك. يرجى التواصل مع إدارة الموقع إذا كنت تعتقد أن هذا خطأ.');
        }
        
        return $next($request);
    }
} 