<?php
namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('service', 'LIKE', "%$search%")
                  ->orWhere('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        $appointments = $query->paginate(10);
        

        return view('appointments.index', compact('appointments'));
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'تم حذف الطلب بنجاح');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|string',
            'date' => 'required|date',
            'name' => 'required|string',
            'tel' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
        ]);

        Appointment::create([
            'service' => $request->service,
            'date' => $request->date,
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'country' => $request->country,
        ]);

        session()->flash('success', 'تم حجز موعدك بنجاح!');
        return redirect()->back();    }
}
