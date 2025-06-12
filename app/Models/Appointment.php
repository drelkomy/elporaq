<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'service',
        'date',
        'name',
        'tel',
        'email',
        'country',
        'status',
        'ip_address',
    ];

    protected $casts = [
        'date' => 'date',
    ];
    
    /**
     * Check if a user has reached the maximum number of allowed appointments
     *
     * @param string $email
     * @param string $ipAddress
     * @param int $maxAllowed
     * @return bool
     */
    public static function hasReachedLimit($email, $ipAddress, $maxAllowed = 6)
    {
        // Count appointments by email or IP in the last 30 days
        $count = static::where(function ($query) use ($email, $ipAddress) {
                $query->where('email', $email)
                    ->orWhere('ip_address', $ipAddress);
            })
            ->where('created_at', '>=', now()->subDays(30))
            ->count();
            
        return $count >= $maxAllowed;
    }
}