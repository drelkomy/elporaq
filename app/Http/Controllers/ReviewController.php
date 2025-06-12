<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File; // لاستخدام النظام الملفات بدلاً من التخزين

class ReviewController extends Controller
{
    // عرض قائمة المراجعات
    public function index()
    {
        $reviews = Review::paginate(6); // عرض 6 مراجعات في كل صفحة
        return view('reviews.index', compact('reviews'));
    }
// تخزين مراجعة جديدة
public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'rating' => 'required|integer|between:1,5',
        'comment' => 'required|string|max:1000',
    ]);

    $data = $request->only(['customer_name', 'rating', 'comment']);

    if ($request->hasFile('customer_image')) {
        $image = $request->file('customer_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/review/' . $imageName;
        $image->move(public_path('images/review'), $imageName);
        $data['customer_image'] = $imagePath; // تأكد من أن المسار صحيح هنا
    }

    Review::create($data);

    return redirect()->route('reviews.index')->with('success', 'تمت إضافة المراجعة بنجاح!');
}

// تحديث مراجعة
public function update(Request $request, Review $review)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'rating' => 'required|integer|between:1,5',
        'comment' => 'required|string|max:1000',
    ]);

    $data = $request->only(['customer_name', 'rating', 'comment']);

    if ($request->hasFile('customer_image')) {
        // حذف الصورة القديمة إذا كانت موجودة
        if ($review->customer_image && File::exists(public_path($review->customer_image))) {
            File::delete(public_path($review->customer_image));
        }

        $image = $request->file('customer_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/review/' . $imageName;
        $image->move(public_path('images/review'), $imageName);
        $data['customer_image'] = $imagePath; // تأكد من أن المسار صحيح هنا
    }

    $review->update($data);

    return redirect()->route('reviews.index')->with('success', 'تمت تحديث المراجعة بنجاح!');
}

    // حذف مراجعة
    public function destroy(Review $review)
    {
        // حذف الصورة إذا كانت موجودة
        if ($review->customer_image && File::exists(public_path($review->customer_image))) {
            File::delete(public_path($review->customer_image));
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'تمت حذف المراجعة بنجاح!');
    }
}
