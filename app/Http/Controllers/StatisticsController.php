<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StatisticsController extends Controller
{
    /**
     * عرض قائمة الإحصائيات.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Statistic::query();

        if ($search = $request->get('search')) {
            $query->where('statistic_name', 'like', "%{$search}%");
        }

        $statistics = $query->paginate(10);

        return view('statistics.index', compact('statistics'));
    }

    /**
     * عرض نموذج إنشاء إحصائية جديدة.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistics.create');
    }

    /**
     * تخزين إحصائية جديدة.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'statistic_name' => 'required|string|max:255',
            'count' => 'required|integer',
        ]);

        Statistic::create($request->all());

        return redirect()->route('statistics.index')->with('success', 'إحصائية تم إضافتها بنجاح');
    }

    /**
     * عرض نموذج تعديل إحصائية محددة.
     *
     * @param \App\Models\Statistic $statistic
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        return view('statistics.edit', compact('statistic'));
    }

    /**
     * تحديث إحصائية محددة.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Statistic $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'statistic_name' => 'required|string|max:255',
            'count' => 'required|integer',
        ]);

        $statistic->update($request->all());

        return redirect()->route('statistics.index')->with('success', 'إحصائية تم تعديلها بنجاح');
    }

    /**
     * حذف إحصائية محددة.
     *
     * @param \App\Models\Statistic $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('statistics.index')->with('success', 'إحصائية تم حذفها بنجاح');
    }
}
