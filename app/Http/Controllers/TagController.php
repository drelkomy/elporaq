<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }


    public function create($blog_id)
    {
        return view('tags.create', ['blog_id' => $blog_id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'blog_id' => 'required|exists:blogs,id'
        ]);

        Tag::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('blogs.index')->with('success', 'Tag added successfully.');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        $blogs = $tag->blogs()->paginate(10);
        $categories = Category::all();
        $recentPosts = Blog::latest()->take(5)->get();
        $tags = Tag::all();

        return view('blogs.index', compact('blogs', 'categories', 'recentPosts', 'tags'));
    }
}
