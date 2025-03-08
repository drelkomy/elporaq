<?php
namespace App\Http\Controllers;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $trainings = Training::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                                ->orWhere('email', 'like', "%{$query}%")
                                ->orWhere('phone', 'like', "%{$query}%")
                                ->orWhere('address', 'like', "%{$query}%")
                                ->orWhere('study', 'like', "%{$query}%")
                                ->orWhere('training_type', 'like', "%{$query}%");
        })->paginate(10);  // استخدم paginate بدلاً من get
    
        return view('trainings.index', compact('trainings', 'query'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'study' => 'required|string',
            'training_type' => 'required|string',
        ]);

        Training::create($request->all());

        return redirect()->route('site.train')->with('success', 'تم التسجيل بنجاح');
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('trainings.index')->with('success', 'تم حذف التسجيل بنجاح');
    }
}
