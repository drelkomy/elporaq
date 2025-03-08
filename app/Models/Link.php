<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    // تحديد الأعمدة التي يمكن تعيينها بشكل جماعي
    protected $fillable = [
        'link_name',
        'icon_name',
    ];
}
