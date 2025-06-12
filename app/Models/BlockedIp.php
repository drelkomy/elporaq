<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedIp extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'reason', 'blocked_until'];

    /**
     * Check if an IP address is blocked
     *
     * @param string $ipAddress
     * @return bool
     */
    public static function isBlocked($ipAddress)
    {
        $blockedIp = static::where('ip_address', $ipAddress)
            ->where(function ($query) {
                $query->whereNull('blocked_until')
                    ->orWhere('blocked_until', '>', now());
            })
            ->first();

        return $blockedIp !== null;
    }
} 