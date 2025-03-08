<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    // ApplicationController.php
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications')); // تأكد من صحة اسم العرض
    }

   


public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'job_type' => 'required|string',
        'document' => 'required|file|mimes:pdf|max:2048',
    ]);

    // Handle the file upload
    if ($request->hasFile('document')) {
        $filename = time() . '.' . $request->document->getClientOriginalExtension();
        $request->document->move(public_path('uploads/documents'), $filename);
    } else {
        $filename = null;  // Ensure filename is initialized
    }

    // Save the data to the database
    Application::create([
        'name' => $request->name,
        'job_type' => $request->job_type,  // Make sure job_type is included
        'document' => $filename,
    ]);

    return redirect()->back()->with('success', 'تم تقديم الطلب بنجاح ويسعدنا أن تكون جزء من فريق شركة البراق.');
}



    // ApplicationController.php

public function destroy($id)
{
    $application = Application::findOrFail($id);

    // Optionally, delete the file from storage
    if ($application->document) {
        $filePath = public_path('uploads/documents/' . $application->document);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    $application->delete();

    return redirect()->route('applications.index')->with('success', 'تم حذف الطلب بنجاح.');
}

    
}