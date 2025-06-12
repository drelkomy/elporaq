<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * عرض قائمة الموظفين.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::paginate(10); // عرض 10 موظفين في كل صفحة
        return view('employees.index', compact('employees'));
    }
public function update(Request $request, Employee $employee)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
    ]);

    // تخزين اسم الصورة القديمة
    $oldImageName = $employee->image;

    if ($request->hasFile('image')) {
        // حذف الصورة القديمة من المجلد إذا كانت موجودة
        if ($oldImageName) {
            $oldImagePath = public_path('images/Employee/' . $oldImageName);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // حفظ الصورة الجديدة
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/Employee'), $imageName);
    } else {
        // استخدام الصورة القديمة إذا لم تكن هناك صورة جديدة
        $imageName = $oldImageName;
    }

    // تحديث بيانات الموظف
    $employee->update([
        'name' => $request->input('name'),
        'position' => $request->input('position'),
        'facebook' => $request->input('facebook'),
        'twitter' => $request->input('twitter'),
        'instagram' => $request->input('instagram'),
        'linkedin' => $request->input('linkedin'),
        'image' => $imageName,
    ]);

    return redirect()->route('employees.index')->with('success', 'تم تعديل بيانات موظف بنجاح');
}

public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/Employee'), $imageName);
    } else {
        $imageName = null; // إذا كانت الصورة غير مطلوبة
    }

    Employee::create([
        'name' => $request->input('name'),
        'position' => $request->input('position'),
        'facebook' => $request->input('facebook'),
        'twitter' => $request->input('twitter'),
        'instagram' => $request->input('instagram'),
        'linkedin' => $request->input('linkedin'),
        'image' => $imageName,
    ]);

    return redirect()->route('employees.index')->with('success', 'تم اضافة موظف بنجاح');
}
public function destroy(Employee $employee)
{
    // حذف الصورة من المجلد إذا كانت موجودة
    if ($employee->image) {
        $imagePath = public_path('images/Employee/' . $employee->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // حذف الموظف من قاعدة البيانات
    $employee->delete();

    return redirect()->route('employees.index')->with('success', 'تم حذف موظف بنجاح');
}


}
