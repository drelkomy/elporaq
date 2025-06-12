<?php

namespace App\Http\Controllers;

use App\Models\BlockedIp;
use Illuminate\Http\Request;

class BlockedIpController extends Controller
{
    public function index()
    {
        $blockedIps = BlockedIp::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blocked-ips.index', compact('blockedIps'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip',
            'reason' => 'nullable|string|max:255',
            'blocked_until' => 'nullable|date',
        ]);
        
        BlockedIp::create([
            'ip_address' => $request->ip_address,
            'reason' => $request->reason,
            'blocked_until' => $request->blocked_until,
        ]);
        
        return redirect()->route('admin.blocked-ips.index')->with('success', 'تم حظر عنوان IP بنجاح');
    }
    
    public function destroy($id)
    {
        BlockedIp::findOrFail($id)->delete();
        return redirect()->route('admin.blocked-ips.index')->with('success', 'تم فك الحظر بنجاح');
    }
} 