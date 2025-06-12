<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('admin.users.create');
    }

    // حفظ المستخدم الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // معالجة الصورة إذا تم تحميلها
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/profile-images'), $filename);
            $userData['profile_image'] = 'profile-images/' . $filename;
        }

        User::create($userData);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم إنشاء المستخدم بنجاح!');
    }

    // عرض صفحة مستخدم محدد
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // عرض نموذج تعديل المستخدم
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // تحديث معلومات المستخدم
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // تحديث كلمة المرور فقط إذا تم توفيرها
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        // معالجة الصورة إذا تم تحميلها
        if ($request->hasFile('profile_image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($user->profile_image && file_exists(public_path('images/' . $user->profile_image))) {
                unlink(public_path('images/' . $user->profile_image));
            }
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/profile-images'), $filename);
            $userData['profile_image'] = 'profile-images/' . $filename;
        }

        $user->update($userData);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح!');
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        // لا تسمح بحذف المستخدم الحالي
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'لا يمكنك حذف حسابك الحالي!');
        }

        // حذف صورة الملف الشخصي إذا وجدت
        if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'تم حذف المستخدم بنجاح!');
    }
}
