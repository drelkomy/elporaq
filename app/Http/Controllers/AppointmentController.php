<?php
namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\BlockedIp;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    // Maximum number of appointments allowed per user/IP in 30 days
    const MAX_APPOINTMENTS = 6;
    
    // Email blacklist patterns (example patterns, add more as needed)
    protected $emailBlacklist = [
        '/^fuck/i',
        '/fuck/i',
        '/sex/i',
        '/porn/i',
        '/admin@/i',
        // '/test@/i', // Disabled: Too broad, blocks valid test emails.
        // '/[^a-z0-9.@_\-+]/i', // Disabled: Too strict, Laravel's 'email' rule is sufficient.
    ];
    
    public function __construct()
    {
        // Apply blocked IP middleware only to store method
        $this->middleware(\App\Http\Middleware\CheckBlockedIp::class)->only('store');
    }
    
    public function index(Request $request)
    {
        $query = Appointment::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('service', 'LIKE', "%$search%")
                  ->orWhere('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%")
                  ->orWhere('ip_address', 'LIKE', "%$search%");
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
    
    public function blockIp($id)
    {
        $appointment = Appointment::findOrFail($id);
        
        if (empty($appointment->ip_address)) {
            return redirect()->route('appointments.index')->with('error', 'لا يوجد عنوان IP مسجل لهذا الطلب');
        }
        
        // Check if IP is already blocked
        if (BlockedIp::isBlocked($appointment->ip_address)) {
            return redirect()->route('appointments.index')->with('info', 'عنوان IP محظور بالفعل');
        }
        
        // Block the IP
        BlockedIp::create([
            'ip_address' => $appointment->ip_address,
            'reason' => 'تم الحظر من صفحة الطلبات',
        ]);
        
        return redirect()->route('appointments.index')->with('success', 'تم حظر عنوان IP بنجاح');
    }

    public function store(Request $request)
    {
        // Get IP address
        $ipAddress = $request->ip();
        
        // Validate the request
        $validator = Validator::make($request->all(), [
            'service' => ['required', 'string', 'max:100', 'not_regex:/[<>()]/'], 
            'date' => ['required', 'date', 'after_or_equal:today'],
            'name' => ['required', 'string', 'max:100', 'not_regex:/[<>()]/', 'regex:/^[\p{L}\s\-\.]+$/u'], // Alphanumeric, space, dash, period
            'tel' => ['required', 'string', 'max:20', 'regex:/^[0-9\+\-\(\)\s]+$/'], // Valid phone format
            'email' => [
                'required', 
                'email:rfc,dns', 
                'max:100',
                function ($attribute, $value, $fail) {
                    // Check against blacklist patterns
                    foreach ($this->emailBlacklist as $pattern) {
                        if (preg_match($pattern, $value)) {
                            $fail('عنوان البريد الإلكتروني غير صالح.');
                        }
                    }
                }
            ],
            'country' => ['required', 'string', 'max:50', 'not_regex:/[<>()]/'],
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        // Check if user has reached appointment limit
        if (Appointment::hasReachedLimit($request->email, $ipAddress, self::MAX_APPOINTMENTS)) {
            return redirect()->back()
                ->with('error', 'لقد وصلت للحد الأقصى المسموح به من الطلبات. يرجى المحاولة لاحقًا أو التواصل مع الدعم.')
                ->withInput();
        }

        // Create appointment
        $appointment = Appointment::create([
            'service' => strip_tags($request->service),
            'date' => $request->date,
            'name' => strip_tags($request->name),
            'tel' => strip_tags($request->tel),
            'email' => $request->email, // Email already validated
            'country' => strip_tags($request->country),
            'ip_address' => $ipAddress,
        ]);

        // Send email to admin
        $this->sendAdminNotification($appointment);

        session()->flash('success', 'تم حجز موعدك بنجاح!');
        return redirect()->back()->with('success', 'تم استلام طلبك بنجاح! سنتواصل معك قريبًا لتأكيد الموعد.');
    }
    
    public function approve($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'approved';
        $appointment->save();
        
        // Send confirmation email to client
        $this->sendClientApprovalNotification($appointment);
        
        return redirect()->route('appointments.index')->with('success', 'تم الموافقة على الطلب بنجاح');
    }
    
    private function sendAdminNotification($appointment)
    {
        $data = [
            'name' => $appointment->name,
            'email' => $appointment->email,
            'tel' => $appointment->tel,
            'service' => $appointment->service,
            'country' => $appointment->country,
            'date' => $appointment->date,
            'ip_address' => $appointment->ip_address,
        ];
        
        Mail::send('emails.new-appointment', $data, function($message) use ($data) {
            $message->to('saadgamal111@gmail.com')
                    ->subject('طلب اتصال جديد: ' . $data['name']);
        });
    }
    
    private function sendClientApprovalNotification($appointment)
    {
        $data = [
            'name' => $appointment->name,
            'service' => $appointment->service,
            'date' => $appointment->date,
        ];
        
        Mail::send('emails.appointment-approved', $data, function($message) use ($appointment) {
            $message->to($appointment->email)
                    ->subject('تمت الموافقة على طلبك');
        });
    }
}
