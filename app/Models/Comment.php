<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['content', 'name', 'email', 'parent_id', 'blog_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
   
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}
