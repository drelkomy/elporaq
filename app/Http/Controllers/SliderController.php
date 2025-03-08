<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        // التحقق من صحة الصورة
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // الحصول على الصورة من الطلب
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $destinationPath = public_path('images/sliders');

        // نقل الصورة إلى المجلد المحدد
        $image->move($destinationPath, $imageName);

        // إنشاء سجل جديد في قاعدة البيانات
        Slider::create([
            'image_path' => $imageName,  // حفظ فقط اسم الصورة في قاعدة البيانات
        ]);

        return redirect()->route('sliders.index')->with('success', 'تم إضافة الصورة بنجاح');
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        // التحقق من صحة الصورة
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // مسار الصورة القديمة
            $oldImagePath = public_path('images/sliders/' . $slider->image_path);

            // حذف الصورة القديمة إذا كانت موجودة
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // الحصول على الصورة الجديدة من الطلب
            $image = $request->file('image');
            $newImageName = $image->getClientOriginalName();
            $destinationPath = public_path('images/sliders');

            // نقل الصورة الجديدة إلى المجلد المحدد
            $image->move($destinationPath, $newImageName);

            // تحديث سجل قاعدة البيانات
            $slider->update([
                'image_path' => $newImageName,  // حفظ فقط اسم الصورة في قاعدة البيانات
            ]);
        }

        return redirect()->route('sliders.index')->with('success', 'تم تحديث الصورة بنجاح');
    }

    public function destroy(Slider $slider)
    {
        // مسار الصورة التي سيتم حذفها
        $imagePath = public_path('images/sliders/' . $slider->image_path);

        // التحقق من وجود الصورة ثم حذفها
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // حذف السجل من قاعدة البيانات
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'تم حذف الصورة بنجاح');
    }
}
 