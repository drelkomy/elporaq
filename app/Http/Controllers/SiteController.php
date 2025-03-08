<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Employee;
use App\Models\InvestmentCategory;
use App\Models\InvestmentOpportunity;
use App\Models\Link;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Statistic;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SiteController extends Controller
{
    public function index()
    {
        // جلب البيانات من قاعدة البيانات
        $links = Link::all();
        $sliders = Slider::all();
        $services = Service::all();
        $statistics = Statistic::all();
        $employees = Employee::all();
        $reviews = Review::all();
        $blogs = Blog::paginate(10); // جلب المدونات مع الترقيم
        $categories = Category::all(); // جلب الفئات
        $tags = Tag::all(); // جلب العلامات
        $recentPosts = Blog::latest()->take(5)->get(); // جلب أحدث 5 تدوينات
        $investmentCategories= InvestmentCategory::all();
        // افترض أنك ترغب في جلب التعليقات لعرضها أيضًا
        $comments = Comment::all(); // جلب التعليقات
        $recentBlogs = Blog::with('category')->latest()->take(6)->get();
        $opportunities = InvestmentOpportunity::latest()->take(6)->get();
        // تمرير البيانات إلى العرض
        return view('site.index', compact('links', 'sliders', 'services', 'statistics', 'employees', 'reviews', 'blogs', 'categories', 'recentPosts', 'tags', 'comments','investmentCategories','recentBlogs','opportunities'));
    }
    
    public function jobs()
    {$services=Service::all();
        $links = Link::all();
        $employees = Employee::all();
        $reviews = Review::all();
        $investmentCategories = InvestmentCategory::all();
        $statistics = Statistic::all();
        return view('site.jobs', compact('links', 'employees', 'reviews', 'investmentCategories', 'statistics','services'));
    }

    public function whous()
    {   $services=Service::all();
        $links = Link::all();
        $employees = Employee::all();
        $reviews = Review::all();
        $investmentCategories= InvestmentCategory::all();
        $statistics=statistic::all();
        return view('site.whous',compact('links','employees', 'reviews','investmentCategories','statistics','services')); // تأكد من أن view موجود في resources/views
    }

    public function app()
    {
        $services=Service::all();
        $links = Link::all();
        $employees = Employee::all();
        $reviews = Review::all();
        $investmentCategories = InvestmentCategory::all();
        $statistics = Statistic::all();
               return view('site.app', compact('links','employees','reviews','investmentCategories','statistics','services'));
    }
    public function train()
    {       
        $services=Service::all();
        $links = Link::all();
        $employees = Employee::all();
        $reviews = Review::all();
        $investmentCategories = InvestmentCategory::all();
        $statistics = Statistic::all();
        return view('site.train', compact('links', 'employees', 'reviews', 'investmentCategories', 'statistics','services'));
    }
    public function allservice($id = null)
    {
        if ($id) {
            $service = Service::find($id);
        } else {
            $service = null;
        }

        $links = Link::all();
        $employees = Employee::all();
        $reviews = Review::all();
        $investmentCategories = InvestmentCategory::all();
        $statistics = Statistic::all();
        $services = Service::all();
        return view('site.allservice', compact('links', 'employees', 'reviews', 'investmentCategories', 'statistics', 'service','services'));
    }
}