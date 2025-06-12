<?php

namespace App\Http\Controllers;

use App\Models\InvestmentCategory;
use Illuminate\Http\Request;

class InvestmentCategoryController extends Controller
{
    public function index()
    {
        $categories = InvestmentCategory::paginate(10); // عرض 10 تصنيفات في كل صفحة
        return view('investment-categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:investment_categories,name',
            'sector' => 'nullable|string',
        ]);

        InvestmentCategory::create($validatedData);

        return redirect()->route('investment-categories.index')
                         ->with('success', 'تصنيف استثماري جديد تمت إضافته بنجاح');
    }

    public function edit(InvestmentCategory $investmentCategory)
    {
        return view('investment-categories.edit', compact('investmentCategory'));
    }

    public function update(Request $request, InvestmentCategory $investmentCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:investment_categories,name,' . $investmentCategory->id,
            'sector' => 'nullable|string',
        ]);

        $investmentCategory->update($validatedData);

        return redirect()->route('investment-categories.index')
                         ->with('success', 'تصنيف استثماري تمت تحديثه بنجاح');
    }

    public function destroy(InvestmentCategory $investmentCategory)
    {
        // تحقق إذا كان التصنيف يحتوي على فرص استثمارية
        if ($investmentCategory->investmentOpportunities()->count() > 0) {
            return redirect()->route('investment-categories.index')
                             ->with('error', 'لا يمكن حذف التصنيف لأنه يحتوي على فرص استثمارية.');
        }

        $investmentCategory->delete();

        return redirect()->route('investment-categories.index')
                         ->with('success', 'تصنيف استثماري تمت إزالته بنجاح');
    }
}
