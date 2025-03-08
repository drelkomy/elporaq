<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',          // اسم المستخدم
        'job_type',     // نوع الوظيفة
        'document',            // السيرة الذاتية
        // أضف أي خصائص أخرى ترغب في السماح بتعبئتها بشكل جماعي
    ];
}
