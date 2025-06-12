<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\InvestmentCategory;
use App\Models\Link;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // عرض التدوينات مع البحث والفلترة
    public function index(Request $request)
    {
        $query = Blog::query();

        // البحث بناءً على العنوان
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // الفلترة بناءً على التصنيف
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // الفلترة بناءً على التاجات
        if ($request->has('tag_id') && $request->tag_id != '') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('id', $request->tag_id);
            });
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();

        return view('Blogs.index', compact('blogs', 'categories', 'tags'));
    }

    public function allBlogs(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('tag_id')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('id', $request->tag_id);
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $blogs = $query->paginate(10);
        $services = Service::all();
        $categories = Category::all();
        $tags = Tag::latest()->take(20)->get(); // عرض آخر 20 تاج
        $recentPosts = Blog::latest()->take(6)->get();
        $links = Link::all();
        $investmentCategories = InvestmentCategory::all();

        return view('Blogs.all', compact('blogs', 'categories', 'tags', 'recentPosts', 'links', 'investmentCategories', 'services'));
    }


    // عرض تدوينة واحدة
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $investmentCategories = InvestmentCategory::all();
        $links = Link::all();
        $recentPosts = Blog::latest()->take(5)->get();
        $services=Service::all();
        return view('Blogs.show', compact('blog', 'investmentCategories', 'links', 'recentPosts','services'));
    }

    // عرض نموذج تعديل تدوينة
    public function edit(Blog $blog)
    {
        $blog->load('tags');
        $categories = Category::all();
        $tags = Tag::all();
        return view('Blogs.edit', [
            'blog' => $blog,
            'categories' => $categories,
            'tags' => $tags,
            'selectedTags' => $blog->tags->pluck('id')->toArray(),
        ]);
    }

    // البحث في جميع التدوينات
    public function searchall(Request $request)
    {
        $query = $request->input('search');
        $blogs = Blog::where('title', 'LIKE', "%$query%")->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();
        $recentPosts = Blog::latest()->take(5)->get();
        $links = Link::all();
        $investmentCategories = InvestmentCategory::all();
        $services=Service::all();
        return view('Blogs.all', compact('blogs', 'categories', 'tags', 'recentPosts', 'links', 'investmentCategories','services'));
    }

    // البحث في التدوينات وعرض النتيجة
    public function search(Request $request)
    {
        $query = $request->input('search');
        $blogs = Blog::where('title', 'LIKE', "%$query%")->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();
        $recentPosts = Blog::latest()->take(5)->get();
        $links = Link::all();
        $investmentCategories = InvestmentCategory::all();
        $services=Service::all();
        return view('Blogs.index', compact('blogs', 'categories', 'tags', 'recentPosts', 'links', 'investmentCategories','services'));
    }

    // عرض نموذج إنشاء تدوينة جديدة
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
       return view('Blogs.create', compact('categories', 'tags'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        // فحص الصور
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->getClientOriginalName();
            $image->move(public_path('images/blogs/'), $imagePath);
        }

        // إنشاء التدوينة
        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        // التعامل مع التاجات
        if ($request->tags) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);

                // التحقق من وجود التاج مسبقاً
                $existingTag = Tag::where('name', $tagName)->first();
                if ($existingTag) {
                    return redirect()->back()->with('error', 'التاج "' . $tagName . '" مدخل مسبقاً.');
                }

                // إنشاء التاج وإضافته للتدوينة
                $tag = Tag::create(['name' => $tagName]);
                $blog->tags()->attach($tag->id);
            }
        }

        return redirect()->route('blogs.index')->with('success', 'تم إضافة التدوينة بنجاح');
    }
    public function update(Request $request, Blog $blog)
{
    $request->validate([
        'title' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required',
        'tags' => 'nullable|string',
        'image' => 'nullable|image'
    ]);

    // فحص الصور
    $imagePath = $blog->image;
    if ($request->hasFile('image')) {
        if ($blog->image && file_exists(public_path('images/blogs/' . $blog->image))) {
            unlink(public_path('images/blogs/' . $blog->image));
        }

        $image = $request->file('image');
        $imagePath = $image->getClientOriginalName();
        $image->move(public_path('images/blogs/'), $imagePath);
    }

    // تحديث التدوينة
    $blog->update([
        'title' => $request->title,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'image' => $imagePath
    ]);

    // التعامل مع التاجات
    if ($request->tags) {
        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tagName = trim($tagName);

            // التحقق من وجود التاج مسبقاً
            $existingTag = Tag::where('name', $tagName)->first();
            if (!$existingTag) {
                // إنشاء التاج إذا لم يكن موجوداً
                $tag = Tag::create(['name' => $tagName]);
                $tagIds[] = $tag->id;
            } else {
                $tagIds[] = $existingTag->id;
            }
        }

        // تحديث التاجات الخاصة بالتدوينة
        $blog->tags()->sync($tagIds);
    } else {
        // إذا لم يكن هناك تاجات، قم بإزالة جميع التاجات
        $blog->tags()->detach();
    }

    return redirect()->route('blogs.index')->with('success', 'تم تحديث التدوينة بنجاح');
}


public function destroy(Blog $blog)
{
    // حذف الصورة
    if ($blog->image && file_exists(public_path('images/blogs/' . $blog->image))) {
        unlink(public_path('images/blogs/' . $blog->image));
    }

    // حذف التاجات المرتبطة (إذا لم تكن مرتبطة بتدوينات أخرى)
    foreach ($blog->tags as $tag) {
        if ($tag->blogs->count() == 1) {
            $tag->delete();
        }
    }

    // حذف التدوينة
    $blog->delete();

    return redirect()->route('blogs.index')->with('success', 'تم حذف التدوينة بنجاح.');
}

    // حذف تعليق
    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'تم حذف التعليق بنجاح.');
    }
}
