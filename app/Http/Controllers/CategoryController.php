<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    // عرض نموذج إنشاء فئة جديدة
    public function create()
    {
        return view('categories.create');
    }

    // تخزين الفئة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'تمت إضافة التصنيف بنجاح.');
    }

    // عرض نموذج تعديل الفئة
    public function edit($id)
    {
        $categories = Category::all();
        $editCategory = Category::findOrFail($id);
        return view('categories.index', compact('categories', 'editCategory'));
    }
    

    // تحديث الفئة
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($request->only(['name', 'description']));
        return redirect()->route('categories.index')->with('success', 'تم تحديث التصنيف بنجاح.');
    }

    // حذف الفئة
    public function destroy(Category $category)
    {
        // تحقق إذا كان التصنيف يحتوي على تدوينات
        if ($category->blogs()->exists()) { // Assuming the relationship method is 'blogs'
            return redirect()->route('categories.index')
                             ->with('error', 'لا يمكن حذف التصنيف لأنه يحتوي على تدوينات.');
        }
        
        $category->delete();
        
        return redirect()->route('categories.index')
                         ->with('success', 'القطاع تمت إزالته بنجاح');
    }
}
