<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvestmentCategoryController;
use App\Http\Controllers\InvestmentOpportunityController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TrainingController;




// / المسارات المفتوحة

// الصفحة الرئيسية
Route::get('/', [SiteController::class, 'index'])->name('site.index');

// لوحة التحكم
Route::get('/dashboard', function () { return view('dashboard'); })
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// مسار صفحة المدونة - عرض جميع التدوينات
Route::get('/allblog', [BlogController::class, 'allBlogs'])->name('blogs.all');
// مسارات الخدمات
Route::get('/allservice/{id}', [SiteController::class, 'allservice'])->name('site.allservice');
// مسار صفحة من نحن
Route::get('/whous', [SiteController::class, 'whous'])->name('site.whous');

// مسارات الوظائف
Route::get('/jobs', [SiteController::class, 'jobs'])->name('site.jobs');

// مسار لعرض المواعيد
Route::get('/app', [SiteController::class, 'app'])->name('site.app');

// مسار التدريبات
Route::get('/train', [SiteController::class, 'train'])->name('site.train');
Route::post('trainings', [TrainingController::class, 'store'])->name('trainings.store');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');

// البحث في المدونة
Route::get('/search', [BlogController::class, 'search'])->name('blogs.search');
Route::get('/searchall', [BlogController::class, 'searchall'])->name('blogs.searchall');
Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// عرض الفرص الاستثمارية حسب التصنيف
Route::get('investment-opportunities/category/{id}', [InvestmentOpportunityController::class, 'byCategory'])->name('investment-opportunities.byCategory');

// تعريف المسارات يدويًا
// مسار عرض جميع الفرص الاستثمارية
Route::get('investment-opportunities/allinvest', [InvestmentOpportunityController::class, 'allinvest'])->name('investment-opportunities.allinvest');
// هذا المسار خارج مجموعة auth
Route::get('investment-opportunities/create', [InvestmentOpportunityController::class, 'create'])->name('investment-opportunities.create');

// مسار عرض فرصة استثمارية معينة
Route::get('investment-opportunities/{id}', [InvestmentOpportunityController::class, 'show'])->name('investment-opportunities.show');

// المسارات المغلقة (تتطلب المصادقة)
Route::middleware('auth')->group(function () {
    // لوحة التحكم
    Route::get('/board', function () { return view('admin.board'); })->name('board');

    // إدارة الروابط
    Route::resource('links', LinksController::class);

    // إدارة السلايدر
    Route::resource('sliders', SliderController::class);

    // إدارة الإحصائيات
    Route::resource('statistics', StatisticsController::class);

    // إدارة الخدمات
    Route::resource('services', ServiceController::class);

    // إدارة الموظفين
    Route::resource('employees', EmployeeController::class);

    // إدارة التقييمات
    Route::resource('reviews', ReviewController::class);

    // إدارة التصنيفات التدوينات
    Route::resource('categories', CategoryController::class);

    // إدارة التدوينات
    Route::resource('blogs', BlogController::class)->except(['show', 'all']);

    // حذف تدوينة
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // التاجات
    Route::resource('tags', TagController::class);

    // إدارة الفرص الاستثمارية
    Route::resource('investment-opportunities', InvestmentOpportunityController::class)->except(['show', 'allinvest']);
        // مسارات resource لطلبات المواعيد
    Route::resource('appointments', AppointmentController::class)->except(['store']);

    // مسارات resource لطلبات التدريبات
    route::resource('trainings', TrainingController::class)->except(['store']);
    // مسارات التصنيفات الاستثمارية
    Route::resource('investment-categories', InvestmentCategoryController::class);

    // مسارات التطبيقات
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

    // إدارة المستخدمين
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
