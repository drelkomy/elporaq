<?php
namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_image' => 'required|image|max:2048',
            'service_description' => 'required|string',
        ]);

        // تجنب التسمية المتكررة للصور
        $imageName = time() . '_' . $request->file('service_image')->getClientOriginalName();
        $imagePath = $request->file('service_image')->move(public_path('images/services'), $imageName);

        Service::create([
            'service_name' => $request->input('service_name'),
            'service_image' => $imageName,
            'service_description' => $request->input('service_description'),
        ]);

        return redirect()->route('services.index')->with('success', 'تم إضافة الخدمة بنجاح');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_image' => 'nullable|image|max:2048',
            'service_description' => 'required|string',
        ]);

        if ($request->hasFile('service_image')) {
            // حذف الصورة القديمة
            $oldImagePath = public_path('images/services/' . $service->service_image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // تجنب التسمية المتكررة للصور
            $imageName = time() . '_' . $request->file('service_image')->getClientOriginalName();
            $request->file('service_image')->move(public_path('images/services'), $imageName);

            $service->update([
                'service_image' => $imageName,
            ]);
        }

        $service->update([
            'service_name' => $request->input('service_name'),
            'service_description' => $request->input('service_description'),
        ]);

        return redirect()->route('services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy(Service $service)
    {
        // حذف الصورة من التخزين
        $imagePath = public_path('images/services/' . $service->service_image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // حذف السجل من قاعدة البيانات
        $service->delete();

        return redirect()->route('services.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}
