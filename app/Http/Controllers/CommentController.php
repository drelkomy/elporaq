<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller

{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'content' => 'required|string',
            'blog_id' => 'required|exists:blogs,id',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
    
        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'blog_id' => $request->blog_id,
            'parent_id' => $request->parent_id,
        ]);
    
        return redirect()->back()->with('success', 'تم إضافة التعليق بنجاح!');
    }
    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }
}
